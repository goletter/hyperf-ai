<?php

declare(strict_types=1);

namespace Goletter\Ai\Driver;

/**
 * 百度千帆。
 */
class Qianfan extends OpenAiCompatible
{
    protected function defaults(): array
    {
        return [
            'base_uri' => 'https://qianfan.baidubce.com/v2',
            'chat_model' => 'ernie-4.0-turbo-8k',
        ];
    }
}
