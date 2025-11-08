<?php
namespace Goletter\Ai\Drivers;

use Goletter\Ai\Contracts\AiDriverInterface;

class OpenAiDriver implements AiDriverInterface
{
    public function transcribe(string $prompt, string $driver = null): string
    {
        return '';
    }
}