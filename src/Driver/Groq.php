<?php

declare(strict_types=1);

namespace Goletter\Ai\Driver;

class Groq extends OpenAiCompatible
{
    protected function defaults(): array
    {
        return [
            'base_uri' => 'https://api.groq.com/openai/v1',
            'chat_model' => 'llama-3.3-70b-versatile',
        ];
    }
}
