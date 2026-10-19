<?php

declare(strict_types=1);

use function Hyperf\Support\env;

return [
    'default' => env('AI_DRIVER', 'openai'),

    'driver' => [
        // OpenAI
        'openai' => [
            'driver' => \Goletter\Ai\Driver\OpenAi::class,
            'config' => [
                'api_key' => env('OPENAI_API_KEY', ''),
                'base_uri' => env('OPENAI_BASE_URI', 'https://api.openai.com/v1'),
                'organization' => env('OPENAI_ORGANIZATION', ''),
                'chat_model' => env('OPENAI_CHAT_MODEL', 'gpt-4o-mini'),
                'speech_model' => env('OPENAI_SPEECH_MODEL', 'tts-1'),
                'transcribe_model' => env('OPENAI_TRANSCRIBE_MODEL', 'whisper-1'),
                'voice' => env('OPENAI_VOICE', 'alloy'),
            ],
        ],

        // 通义千问
        'dashscope' => [
            'driver' => \Goletter\Ai\Driver\DashScope::class,
            'config' => [
                'api_key' => env('DASHSCOPE_API_KEY', ''),
                'base_uri' => env('DASHSCOPE_BASE_URI', 'https://dashscope.aliyuncs.com/compatible-mode/v1'),
                'chat_model' => env('DASHSCOPE_CHAT_MODEL', 'qwen-turbo'),
                'speech_model' => env('DASHSCOPE_SPEECH_MODEL', 'qwen-tts'),
                'transcribe_model' => env('DASHSCOPE_TRANSCRIBE_MODEL', 'qwen3-asr-flash'),
                'voice' => env('DASHSCOPE_VOICE', 'Cherry'),
            ],
        ],

        // DeepSeek
        'deepseek' => [
            'driver' => \Goletter\Ai\Driver\DeepSeek::class,
            'config' => [
                'api_key' => env('DEEPSEEK_API_KEY', ''),
                'chat_model' => env('DEEPSEEK_CHAT_MODEL', 'deepseek-chat'),
            ],
        ],

        // Kimi（月之暗面）
        'moonshot' => [
            'driver' => \Goletter\Ai\Driver\Moonshot::class,
            'config' => [
                'api_key' => env('MOONSHOT_API_KEY', ''),
                'chat_model' => env('MOONSHOT_CHAT_MODEL', 'moonshot-v1-8k'),
            ],
        ],

        // 智谱 GLM
        'zhipu' => [
            'driver' => \Goletter\Ai\Driver\Zhipu::class,
            'config' => [
                'api_key' => env('ZHIPU_API_KEY', ''),
                'chat_model' => env('ZHIPU_CHAT_MODEL', 'glm-4-flash'),
            ],
        ],

        // 豆包（火山方舟）
        'doubao' => [
            'driver' => \Goletter\Ai\Driver\Doubao::class,
            'config' => [
                'api_key' => env('DOUBAO_API_KEY', ''),
                // 火山方舟推理接入点，形如 ep-xxxx
                'chat_model' => env('DOUBAO_CHAT_MODEL', ''),
            ],
        ],

        // 百度千帆
        'qianfan' => [
            'driver' => \Goletter\Ai\Driver\Qianfan::class,
            'config' => [
                'api_key' => env('QIANFAN_API_KEY', ''),
                'chat_model' => env('QIANFAN_CHAT_MODEL', 'ernie-4.0-turbo-8k'),
            ],
        ],

        // MiniMax
        'minimax' => [
            'driver' => \Goletter\Ai\Driver\MiniMax::class,
            'config' => [
                'api_key' => env('MINIMAX_API_KEY', ''),
                'chat_model' => env('MINIMAX_CHAT_MODEL', 'MiniMax-Text-01'),
            ],
        ],

        // 硅基流动
        'siliconflow' => [
            'driver' => \Goletter\Ai\Driver\SiliconFlow::class,
            'config' => [
                'api_key' => env('SILICONFLOW_API_KEY', ''),
                'chat_model' => env('SILICONFLOW_CHAT_MODEL', 'deepseek-ai/DeepSeek-V3'),
            ],
        ],

        // Google Gemini
        'gemini' => [
            'driver' => \Goletter\Ai\Driver\Gemini::class,
            'config' => [
                'api_key' => env('GEMINI_API_KEY', ''),
                'chat_model' => env('GEMINI_CHAT_MODEL', 'gemini-2.0-flash'),
            ],
        ],

        // Groq
        'groq' => [
            'driver' => \Goletter\Ai\Driver\Groq::class,
            'config' => [
                'api_key' => env('GROQ_API_KEY', ''),
                'chat_model' => env('GROQ_CHAT_MODEL', 'llama-3.3-70b-versatile'),
            ],
        ],

        // Mistral
        'mistral' => [
            'driver' => \Goletter\Ai\Driver\Mistral::class,
            'config' => [
                'api_key' => env('MISTRAL_API_KEY', ''),
                'chat_model' => env('MISTRAL_CHAT_MODEL', 'mistral-small-latest'),
            ],
        ],

        // xAI Grok
        'xai' => [
            'driver' => \Goletter\Ai\Driver\Xai::class,
            'config' => [
                'api_key' => env('XAI_API_KEY', ''),
                'chat_model' => env('XAI_CHAT_MODEL', 'grok-3'),
            ],
        ],

        // Azure OpenAI
        'azure' => [
            'driver' => \Goletter\Ai\Driver\AzureOpenAi::class,
            'config' => [
                'api_key' => env('AZURE_OPENAI_API_KEY', ''),
                'base_uri' => env('AZURE_OPENAI_BASE_URI', ''),
                'api_version' => env('AZURE_OPENAI_API_VERSION', '2024-10-21'),
                'chat_model' => env('AZURE_OPENAI_CHAT_MODEL', 'gpt-4o-mini'),
            ],
        ],

        // Claude（Anthropic）
        'anthropic' => [
            'driver' => \Goletter\Ai\Driver\Anthropic::class,
            'config' => [
                'api_key' => env('ANTHROPIC_API_KEY', ''),
                'chat_model' => env('ANTHROPIC_CHAT_MODEL', 'claude-sonnet-4-5'),
                'max_tokens' => 1024,
            ],
        ],
    ],
];
