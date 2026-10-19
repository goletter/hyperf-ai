<?php

declare(strict_types=1);

namespace Goletter\Ai;

use Hyperf\Contract\ConfigInterface;
use Psr\Container\ContainerInterface;

class Ai
{
    public function __invoke(ContainerInterface $container): \Goletter\Ai\Contract\AiInterface
    {
        $config = $container->get(ConfigInterface::class);
        $driver = (string) $config->get('ai.default', 'openai');

        return $container->get(AiFactory::class)->make($driver);
    }
}