<?php

declare(strict_types=1);

namespace Goletter\Ai\Driver;

/**
 * 火山方舟豆包。chat_model 填推理接入点 ID（ep- 开头）。
 */
class Doubao extends OpenAiCompatible
{
    protected function defaults(): array
    {
        return [
            'base_uri' => 'https://ark.cn-beijing.volces.com/api/v3',
            'chat_model' => '',
        ];
    }
}
