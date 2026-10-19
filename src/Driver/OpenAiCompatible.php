<?php

declare(strict_types=1);

namespace Goletter\Ai\Driver;

/**
 * OpenAI 兼容接口。子类只提供默认 base_uri 和模型。
 */
abstract class OpenAiCompatible extends OpenAi
{
    /**
     * @return array<string, mixed>
     */
    abstract protected function defaults(): array;

    /**
     * @param array<string, mixed> $config
     */
    public function __construct(array $config)
    {
        parent::__construct($config + $this->defaults() + [
            'speech_model' => '',
            'transcribe_model' => '',
        ]);
    }
}
