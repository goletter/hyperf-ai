<?php
namespace Goletter\Ai\Contracts;

interface AiDriverInterface
{
    public function transcribe(string $prompt, string $driver): string;
}