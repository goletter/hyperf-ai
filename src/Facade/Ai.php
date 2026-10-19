<?php

declare(strict_types=1);

namespace Goletter\Ai\Facade;

use Goletter\Ai\AiFactory;
use Goletter\Ai\Contract\AiInterface;
use Hyperf\Context\ApplicationContext;
use Hyperf\Contract\ConfigInterface;

/**
 * @method static array chat(string $template, array $options = [])
 * @method static array speech(string $prompt, array $options = [])
 * @method static array transcribe(string $filePathOrUrl, array $options = [])
 */
class Ai
{
    public static function driver(?string $driver = null): AiInterface
    {
        if ($driver === null || $driver === '') {
            $driver = (string) ApplicationContext::getContainer()->get(ConfigInterface::class)->get('ai.default', 'openai');
        }

        return ApplicationContext::getContainer()->get(AiFactory::class)->make($driver);
    }

    /**
     * @param array<int, mixed> $arguments
     */
    public static function __callStatic(string $name, array $arguments): mixed
    {
        return self::driver()->{$name}(...$arguments);
    }
}
