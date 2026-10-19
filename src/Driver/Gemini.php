<?php

declare(strict_types=1);

namespace Goletter\Ai\Driver;

class Gemini extends OpenAiCompatible
{
    protected function defaults(): array
    {
        return [
            'base_uri' => 'https://generativelanguage.googleapis.com/v1beta/openai',
            'chat_model' => 'gemini-2.0-flash',
        ];
    }
}
