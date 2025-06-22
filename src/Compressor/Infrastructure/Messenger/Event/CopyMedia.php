<?php

namespace App\Compressor\Infrastructure\Messenger\Event;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Messenger\Attribute\AsMessage;

#[AsMessage('async')]
class CopyMedia
{
    public function __construct(
        ?string $command,
        UploadedFile ...$files,
    ) {
    }
}
