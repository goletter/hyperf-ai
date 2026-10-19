<?php

declare(strict_types=1);

namespace Goletter\Ai\Driver;

class Mistral extends OpenAiCompatible
{
    protected function defaults(): array
    {
        return [
            'base_uri' => 'https://api.mistral.ai/v1',
            'chat_model' => 'mistral-small-latest',
        ];
    }
}
