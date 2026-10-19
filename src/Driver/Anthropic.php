<?php

declare(strict_types=1);

namespace Goletter\Ai\Driver;

use Goletter\Ai\Contract\AiInterface;
use Goletter\Ai\Exception\AiException;
use GuzzleHttp\Client;

/**
 * Anthropic Claude Messages API。
 */
class Anthropic implements AiInterface
{
    /**
     * @param array<string, mixed> $config
     */
    public function __construct(protected array $config)
    {
        if (trim((string) ($config['api_key'] ?? '')) === '') {
            throw new AiException('AI api_key 未配置');
        }
    }

    public function chat(string $template, array $options = []): array
    {
        $messages = $options['messages'] ?? [
            ['role' => 'user', 'content' => $template],
        ];
        $system = [];
        $dialog = [];
        foreach ($messages as $message) {
            if (($message['role'] ?? '') === 'system') {
                $system[] = (string) ($message['content'] ?? '');
                continue;
            }
            $dialog[] = [
                'role' => (string) ($message['role'] ?? 'user'),
                'content' => (string) ($message['content'] ?? ''),
            ];
        }
        if ($dialog === []) {
            $dialog[] = ['role' => 'user', 'content' => $template];
        }

        $body = [
            'model' => (string) ($options['model'] ?? $this->config['chat_model'] ?? 'claude-sonnet-4-5'),
            'max_tokens' => (int) ($options['max_tokens'] ?? $this->config['max_tokens'] ?? 1024),
            'messages' => $dialog,
        ];
        $systemText = trim(implode("\n", $system));
        if ($systemText !== '') {
            $body['system'] = $systemText;
        }
        if (array_key_exists('temperature', $options)) {
            $body['temperature'] = $options['temperature'];
        }

        $baseUri = rtrim((string) ($this->config['base_uri'] ?? 'https://api.anthropic.com/v1'), '/');
        $response = (new Client(['timeout' => 120]))->post($baseUri . '/messages', [
            'headers' => [
                'x-api-key' => (string) $this->config['api_key'],
                'anthropic-version' => (string) ($this->config['api_version'] ?? '2023-06-01'),
                'content-type' => 'application/json',
            ],
            'json' => $body,
        ]);
        $decoded = json_decode((string) $response->getBody(), true);

        return is_array($decoded) ? $decoded : [];
    }

    public function speech(string $prompt, array $options = []): array
    {
        throw new AiException('当前驱动不支持 speech');
    }

    public function transcribe(string $filePathOrUrl, array $options = []): array
    {
        throw new AiException('当前驱动不支持 transcribe');
    }
}
