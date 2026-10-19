<?php

declare(strict_types=1);

namespace Goletter\Ai;

use Goletter\Ai\Contract\AiInterface;
use Hyperf\Contract\ConfigInterface;
use InvalidArgumentException;
use function Hyperf\Support\make;

class AiFactory
{
    public function __construct(private ConfigInterface $config)
    {
    }

    public function make(string $driver): AiInterface
    {
        $option = $this->config->get('ai.driver.' . $driver, []);

        if (empty($option)) {
            throw new InvalidArgumentException("ai配置文件缺少[{$driver}]驱动!");
        }

        return make($option['driver'], [
            'config' => $option['config'],
            'driver' => $driver,
        ]);
    }
}