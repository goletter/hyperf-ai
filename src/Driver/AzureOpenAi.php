<?php

declare(strict_types=1);

namespace Goletter\Ai\Driver;

use Goletter\Ai\Exception\AiException;

/**
 * Azure OpenAI。base_uri 形如 https://{resource}.openai.azure.com/openai/deployments/{deployment}。
 */
class AzureOpenAi extends OpenAi
{
    /**
     * @param array<string, mixed> $config
     */
    public function __construct(array $config)
    {
        $baseUri = trim((string) ($config['base_uri'] ?? ''));
        if ($baseUri === '') {
            throw new AiException('Azure OpenAI base_uri 未配置');
        }

        $config['headers']['api-key'] = (string) ($config['api_key'] ?? '');
        $config['query']['api-version'] = (string) ($config['api_version'] ?? '2024-10-21');

        parent::__construct($config + [
            'chat_model' => 'gpt-4o-mini',
            'speech_model' => 'tts-1',
            'transcribe_model' => 'whisper-1',
            'voice' => 'alloy',
        ]);
    }
}
