<?php

namespace Goletter\Ai;

use Hyperf\Di\Annotation\Inject;

class AiService
{
    #[Inject]
    protected AiManager $manager;

    public function transcribe(string $prompt, ?string $driver = null): string
    {
        return $this->manager->driver($driver)->transcribe($prompt);
    }
}
