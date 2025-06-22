<?php

namespace App\Compressor\Infrastructure\Service;

use App\Compressor\Domain\Contract\MediaCompressorInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class MediaCompressor implements MediaCompressorInterface
{
    private ?string $command = null;

    public function __construct(
        #[Autowire(param: 'app.compressor.input_abs_path')]
        private readonly string $compressorInputAbsPath,
        #[Autowire(param: 'app.compressor.output_abs_path')]
        private readonly string $compressorOutputAbsPath,
    ) {
    }

    public function compress(): static
    {
        $command = $this->getResolvedCommand();
        // TODO: current FindExecutable, Mercure for updates, RunProcessMessage

        return $this;
    }

    public function getCommand(): ?string
    {
        return $this->command;
    }

    public function setCommand(?string $command): void
    {
        $this->command = $command;
    }

    public function getCompressorInputAbsPath(): string
    {
        return $this->compressorInputAbsPath;
    }

    public function getCompressorOutputAbsPath(): string
    {
        return $this->compressorOutputAbsPath;
    }

    private function getResolvedCommand(): string
    {
        // TODO: HttpClient to download ffmpeg

        if (null !== $this->command) {
            return $this->command;
        }

        return $this->command = '...';
    }
}
