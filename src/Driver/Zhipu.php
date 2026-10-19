<?php

declare(strict_types=1);

namespace Goletter\Ai\Driver;

/**
 * 智谱 GLM。
 */
class Zhipu extends OpenAiCompatible
{
    protected function defaults(): array
    {
        return [
            'base_uri' => 'https://open.bigmodel.cn/api/paas/v4',
            'chat_model' => 'glm-4-flash',
        ];
    }
}
