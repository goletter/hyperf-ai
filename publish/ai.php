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

    'drivers' => [
        'openai' => [
            'class' => \Goletter\Ai\Drivers\OpenAiDriver::class,
            'api_key' => env('OPENAI_API_KEY'),
            'base_uri' => 'https://api.openai.com/v1/',
            'model' => 'gpt-4o-mini',
        ],

        'dashscope' => [
            'class' => \Goletter\Ai\Drivers\DashScopeDriver::class,
            'api_key' => env('DASHSCOPE_API_KEY'),
            'base_uri' => 'https://dashscope.aliyuncs.com/api/v1/',
            'model' => 'qwen-turbo',
        ],
    ],
];
