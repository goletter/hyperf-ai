<?php

declare(strict_types=1);

namespace Goletter\Ai\Driver;

/**
 * 硅基流动。
 */
class SiliconFlow extends OpenAiCompatible
{
    protected function defaults(): array
    {
        return [
            'base_uri' => 'https://api.siliconflow.cn/v1',
            'chat_model' => 'deepseek-ai/DeepSeek-V3',
        ];
    }
}
