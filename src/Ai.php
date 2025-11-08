<?php

declare(strict_types=1);

namespace Goletter\Ai;

use Hyperf\Contract\ConfigInterface;
use Psr\Container\ContainerInterface;

class Ai
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get(ConfigInterface::class);
        $driver = $config->get('ai.default', 'openai');

        /**
         * @var AiFactory $factory
         */
        $factory = $container->get(AiFactory::class);
        return $factory->make($driver);
    }
}