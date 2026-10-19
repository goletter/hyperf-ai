<?php

declare(strict_types=1);

namespace Goletter\Ai\Driver;

class DeepSeek extends OpenAiCompatible
{
    protected function defaults(): array
    {
        return [
            'base_uri' => 'https://api.deepseek.com',
            'chat_model' => 'deepseek-chat',
        ];
    }
}
