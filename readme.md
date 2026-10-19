# hyperf-ai

Hyperf AI 客户端。除 OpenAI、Azure OpenAI、通义千问外，还接入了 Claude、Gemini、Groq、Mistral、Grok，以及 DeepSeek、Kimi、智谱、豆包、千帆、MiniMax、硅基流动。

## 安装

```bash
composer require goletter/hyperf-ai
```

## 配置

```bash
php bin/hyperf.php vendor:publish goletter/hyperf-ai
```

`config/autoload/ai.php`：

```php
return [
    'default' => env('AI_DRIVER', 'openai'),
];
```

| 驱动名 | 厂商 | 环境变量 |
| --- | --- | --- |
| `openai` | OpenAI | `OPENAI_API_KEY` |
| `azure` | Azure OpenAI | `AZURE_OPENAI_API_KEY`、`AZURE_OPENAI_BASE_URI` |
| `anthropic` | Claude | `ANTHROPIC_API_KEY` |
| `gemini` | Google Gemini | `GEMINI_API_KEY` |
| `groq` | Groq | `GROQ_API_KEY` |
| `mistral` | Mistral | `MISTRAL_API_KEY` |
| `xai` | xAI Grok | `XAI_API_KEY` |
| `dashscope` | 通义千问 | `DASHSCOPE_API_KEY` |
| `deepseek` | DeepSeek | `DEEPSEEK_API_KEY` |
| `moonshot` | Kimi | `MOONSHOT_API_KEY` |
| `zhipu` | 智谱 GLM | `ZHIPU_API_KEY` |
| `doubao` | 豆包 / 火山方舟 | `DOUBAO_API_KEY`、`DOUBAO_CHAT_MODEL` |
| `qianfan` | 百度千帆 | `QIANFAN_API_KEY` |
| `minimax` | MiniMax | `MINIMAX_API_KEY` |
| `siliconflow` | 硅基流动 | `SILICONFLOW_API_KEY` |

语音合成和识别默认只打开 OpenAI 与通义。其它驱动调用 `speech` / `transcribe` 会提示未配置模型。豆包的 `chat_model` 要填火山方舟推理接入点（`ep-` 开头）。Azure 的 `base_uri` 形如 `https://{resource}.openai.azure.com/openai/deployments/{deployment}`。

## 使用

默认驱动：

```php
use Goletter\Ai\Facade\Ai;

$chat = Ai::chat('用一句话介绍 Hyperf');
$text = $chat['choices'][0]['message']['content'] ?? '';

$speech = Ai::speech('你好', ['path' => BASE_PATH . '/runtime/hello.mp3']);
// $speech['content'] 是 mp3 的 base64，$speech['path'] 是写入的文件

$transcript = Ai::transcribe('/path/to/audio.mp3');
$words = $transcript['text'] ?? '';
```

指定驱动，或注入 `Goletter\Ai\Contract\AiInterface`（绑定的是 `ai.default`）：

```php
$ai = Ai::driver('deepseek');
$chat = $ai->chat('你好', [
    'messages' => [
        ['role' => 'system', 'content' => '你是客服'],
        ['role' => 'user', 'content' => '订单什么时候发货'],
    ],
]);
```

`chat` 的 `$options` 还可传 `model`、`temperature`、`max_tokens`、`top_p`。未配置 `api_key` 时抛出 `Goletter\Ai\Exception\AiException`。
