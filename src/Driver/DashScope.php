<?php

declare(strict_types=1);

namespace Goletter\Ai\Driver;

/**
 * 通义千问 DashScope。
 */
class DashScope extends OpenAiCompatible
{
    protected function defaults(): array
    {
        return [
            'base_uri' => 'https://dashscope.aliyuncs.com/compatible-mode/v1',
            'chat_model' => 'qwen-turbo',
            'speech_model' => 'qwen-tts',
            'transcribe_model' => 'qwen3-asr-flash',
            'voice' => 'Cherry',
        ];
    }
}
