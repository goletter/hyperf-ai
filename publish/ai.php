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
use function Hyperf\Support\env;

return [
    'default' => env('AI_DRIVER', 'openai'),

    'driver' => [
        'openai' => [
            'driver' => \Goletter\Ai\Driver\OpenAi::class,
            'config' => [
                'api_key' => env('OPENAI_API_KEY')
            ]
        ],

        'dashscope' => [
            'driver' => \Goletter\Ai\Driver\DashScope::class,
            'config' => [
                'api_key' => env('DASHSCOPE_API_KEY')
            ]
        ],
    ],
];
