<?php

declare(strict_types=1);

namespace Goletter\Ai\Driver;

use Goletter\Ai\Contract\AiInterface;
use Goletter\Ai\Exception\AiException;
use OpenAI as Oai;
use OpenAI\Client;

class OpenAi implements AiInterface
{
    protected Client $client;

    /**
     * @param array<string, mixed> $config
     */
    public function __construct(protected array $config)
    {
        $apiKey = trim((string) ($config['api_key'] ?? ''));
        if ($apiKey === '') {
            throw new AiException('AI api_key 未配置');
        }

        $factory = Oai::factory()->withApiKey($apiKey);
        $baseUri = trim((string) ($config['base_uri'] ?? ''));
        if ($baseUri !== '') {
            $factory = $factory->withBaseUri(rtrim($baseUri, '/'));
        }
        $organization = trim((string) ($config['organization'] ?? ''));
        if ($organization !== '') {
            $factory = $factory->withOrganization($organization);
        }
        foreach ($config['headers'] ?? [] as $name => $value) {
            if ((string) $value !== '') {
                $factory = $factory->withHttpHeader((string) $name, (string) $value);
            }
        }
        foreach ($config['query'] ?? [] as $name => $value) {
            if ((string) $value !== '') {
                $factory = $factory->withQueryParam((string) $name, (string) $value);
            }
        }

        $this->client = $factory->make();
    }

    public function chat(string $template, array $options = []): array
    {
        $messages = $options['messages'] ?? [
            ['role' => 'user', 'content' => $template],
        ];

        $payload = [
            'model' => $this->model($options, 'chat_model', 'gpt-4o-mini'),
            'messages' => $messages,
        ];
        foreach (['temperature', 'max_tokens', 'top_p'] as $key) {
            if (array_key_exists($key, $options)) {
                $payload[$key] = $options[$key];
            }
        }

        return $this->client->chat()->create($payload)->toArray();
    }

    public function speech(string $prompt, array $options = []): array
    {
        $format = (string) ($options['response_format'] ?? $this->config['response_format'] ?? 'mp3');
        $audio = $this->client->audio()->speech([
            'model' => $this->model($options, 'speech_model', 'tts-1'),
            'input' => $prompt,
            'voice' => (string) ($options['voice'] ?? $this->config['voice'] ?? 'alloy'),
            'response_format' => $format,
        ]);

        $result = [
            'format' => $format,
            'content' => base64_encode($audio),
        ];
        if (! empty($options['path'])) {
            $path = (string) $options['path'];
            if (file_put_contents($path, $audio) === false) {
                throw new AiException("无法写入语音文件: {$path}");
            }
            $result['path'] = $path;
        }

        return $result;
    }

    public function transcribe(string $filePathOrUrl, array $options = []): array
    {
        $file = fopen($filePathOrUrl, 'rb');
        if ($file === false) {
            throw new AiException("无法读取音频文件: {$filePathOrUrl}");
        }

        try {
            return $this->client->audio()->transcribe([
                'model' => $this->model($options, 'transcribe_model', 'whisper-1'),
                'file' => $file,
                'response_format' => (string) ($options['response_format'] ?? 'json'),
            ])->toArray();
        } finally {
            fclose($file);
        }
    }

    /**
     * @param array<string, mixed> $options
     */
    protected function model(array $options, string $configKey, string $fallback): string
    {
        $model = trim((string) ($options['model'] ?? $this->config[$configKey] ?? $fallback));
        if ($model === '') {
            throw new AiException("当前驱动未配置 {$configKey}");
        }

        return $model;
    }
}
