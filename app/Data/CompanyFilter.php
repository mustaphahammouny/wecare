<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapInputName(SnakeCaseMapper::class)]
#[MapName(SnakeCaseMapper::class)]
class CompanyFilter extends Data
{
    public function __construct(
        public ?int $id,
        public ?int $userId,
    ) {
    }
}
