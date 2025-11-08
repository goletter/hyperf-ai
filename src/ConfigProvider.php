<?php

declare(strict_types=1);

namespace Goletter\Ai;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                AiManager::class => AiManager::class,
            ],
            'commands' => [
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
                    'description' => 'The config of modelFilter client.',
                    'source' => __DIR__ . '/publish/ai.php',
                    'destination' => BASE_PATH . '/config/autoload/ai.php',
                ],
            ],
        ];
    }
}
