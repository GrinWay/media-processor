<?php

namespace App\Compressor\Domain\Contract;

interface MediaCompressorInterface
{
    public function compress(): static;
}
