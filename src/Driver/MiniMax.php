<?php

declare(strict_types=1);

namespace Goletter\Ai\Driver;

class MiniMax extends OpenAiCompatible
{
    protected function defaults(): array
    {
        return [
            'base_uri' => 'https://api.minimaxi.com/v1',
            'chat_model' => 'MiniMax-Text-01',
        ];
    }
}
