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

namespace Goletter\Ai\Driver;

use Goletter\Ai\Contract\AiInterface;
use GuzzleHttp\Client;

class DashScope implements AiInterface
{
    protected Client $client;

    public function __construct(protected array $config) {
        $authorization = 'Bearer ' . $config['api_key'];
        $this->client = new Client([
            'headers' => ['requestSource' => 4, 'Content-Type' => 'application/json', 'Authorization' => $authorization],
            'timeout' => 60,
        ]);
    }

    public function chat(string $template): array
    {
        $url = 'https://dashscope.aliyuncs.com/compatible-mode/v1/chat/completions';
        $response = $this->client->post($url, ['json' => [
            'model' => 'qwen-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $template],
            ]
        ]]);
        $content = $response->getBody()->getContents();
        $result = json_decode($content, true);

        return $result;
    }

    public function speech(string $prompt): array
    {
        return [];
    }

    public function transcribe(string $filePathOrUrl): array
    {
        return [];
    }
}
