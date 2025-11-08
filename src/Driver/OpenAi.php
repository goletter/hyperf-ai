<?php
namespace Goletter\Ai\Driver;

use Goletter\Ai\Contract\AiInterface;
use OpenAI as Oai;
use OpenAI\Client;

class OpenAi implements AiInterface
{
    protected Client $client;

    public function __construct(protected array $config) {
        $this->client = Oai::client($config['api_key']);
    }

    public function chat(string $template): array
    {
        $response = $this->client->audio()->transcribe([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ["role" => "system", "content" => $template],
            ],
            'temperature' => 1.0,
            'max_tokens' => 4000,
            'frequency_penalty' => 0,
            'presence_penalty' => 0,
        ]);

        return $response->toArray();
    }

    public function speech(string $prompt): array
    {
        $response = $this->client->audio()->transcribe([
            'model' => 'tts-1',
            'input' => $prompt,
            'voice' => 'sage',
            'instructions' => '月亮上的小兔子',
            'response_format' => 'mp3',
        ]);

        return $response->toArray();
    }

    public function transcribe(string $filePathOrUrl): array
    {
        $response = $this->client->audio()->transcribe([
            'model' => 'whisper-1',
            'file' => fopen($filePathOrUrl, 'r'),
        ]);

        return $response->toArray();
    }
}