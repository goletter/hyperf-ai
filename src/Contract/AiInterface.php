<?php
namespace Goletter\Ai\Contract;

use Exception;

interface AiInterface
{
    /**
     * 文字转语音
     * @param string $filePathOrUrl
     * @return array
     * @throws Exception
     */
    public function speech(string $prompt):  array;

    /**
     * 语音转文字
     * @param string $filePathOrUrl
     * @return array
     * @throws Exception
     */
    public function transcribe(string $filePathOrUrl):  array;

    /**
     * 对话接口
     * @param string $template
     * @return array
     * @throws Exception
     */
    public function chat(string $template):  array;
}