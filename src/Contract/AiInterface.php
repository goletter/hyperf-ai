<?php

declare(strict_types=1);

namespace Goletter\Ai\Contract;

interface AiInterface
{
    /**
     * 对话。$options['messages'] 可覆盖默认的单轮 user 消息。
     *
     * @param array<string, mixed> $options
     * @return array<string, mixed>
     */
    public function chat(string $template, array $options = []): array;

    /**
     * 文字转语音。返回 format 与 base64 的 content；传入 $options['path'] 时同时写入文件。
     *
     * @param array<string, mixed> $options
     * @return array<string, mixed>
     */
    public function speech(string $prompt, array $options = []): array;

    /**
     * 语音转文字。$filePathOrUrl 为本地路径或可读 URL。
     *
     * @param array<string, mixed> $options
     * @return array<string, mixed>
     */
    public function transcribe(string $filePathOrUrl, array $options = []): array;
}
