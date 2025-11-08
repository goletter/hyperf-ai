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

namespace Goletter\Ai\Drivers;

use Goletter\Ai\Contracts\AiDriverInterface;

class DashScopeDriver implements AiDriverInterface
{
    public function transcribe(string $prompt, ?string $driver = null): string
    {
        return '';
    }
}
