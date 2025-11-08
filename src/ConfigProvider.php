<?php

declare(strict_types=1);

namespace Goletter\Ai;

use Goletter\Ai\Contract\AiInterface;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                AiInterface::class => Ai::class,
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config of Ai client.',
                    'source'      => __DIR__ . '/../publish/ai.php',
                    'destination' => BASE_PATH . '/config/autoload/ai.php',
                ],
            ],
        ];
    }
}
