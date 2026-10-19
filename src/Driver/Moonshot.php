<?php

declare(strict_types=1);

namespace Goletter\Ai\Driver;

/**
 * 月之暗面 Kimi。
 */
class Moonshot extends OpenAiCompatible
{
    protected function defaults(): array
    {
        return [
            'base_uri' => 'https://api.moonshot.cn/v1',
            'chat_model' => 'moonshot-v1-8k',
        ];
    }
}
