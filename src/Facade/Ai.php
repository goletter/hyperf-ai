<?php

declare(strict_types=1);

namespace Goletter\Ai\Facade;

use Hyperf\Context\ApplicationContext;
use Goletter\Ai\Contract\AiInterface;
use Goletter\Ai\AiFactory;

/**
 * @method static AiInterface make(string $driver)
 */
class Ai
{
    public static function __callStatic($name, $arguments)
    {
        return self::driver(...$arguments);
    }

    public static function driver(string $driver): AiInterface
    {
        /**
         * @var AiFactory $factory
         */
        $factory = ApplicationContext::getContainer()->get(AiFactory::class);

        return $factory->make($driver);
    }
}