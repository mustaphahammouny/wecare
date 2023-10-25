<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
#[MapName(SnakeCaseMapper::class)]
class ServiceData extends Data
{
    public function __construct(
        public string $title,
        public int $minDuration,
        public int $maxDuration,
        public int $stepDuration,
        public bool $active,
    ) {
    }
}
