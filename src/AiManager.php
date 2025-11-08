<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Goletter\Ai;

use Goletter\Ai\Contracts\AiDriverInterface;
use Hyperf\Contract\ContainerInterface;
use RuntimeException;

class AiManager
{
    protected array $drivers = [];

    public function __construct(
        protected ContainerInterface $container,
        protected array $config
    ) {
    }

    public function __call($method, $arguments)
    {
        return $this->driver()->{$method}(...$arguments);
    }

    /**
     * 获取指定驱动实例.
     */
    public function driver(?string $name = null): AiDriverInterface
    {
        $name ??= $this->config['default'];

        if (! isset($this->drivers[$name])) {
            $driverConfig = $this->config['drivers'][$name] ?? null;
            if (! $driverConfig) {
                throw new RuntimeException("AI driver [{$name}] not configured.");
            }

            $class = $driverConfig['class'];
            $this->drivers[$name] = new $class($driverConfig);
        }

        return $this->drivers[$name];
    }
}
