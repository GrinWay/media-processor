<?php

namespace App\Compressor\Infrastructure\Messenger\Event;

use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CopyMediaHandler
{
    public function __invoke(CopyMedia $copyMedia): void
    {
    }
}
