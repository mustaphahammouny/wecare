<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
#[MapName(SnakeCaseMapper::class)]
class RegisterData extends Data
{
    public function __construct(
        public string $firstName,
        public string $lastName,
        public string $email,
        public string $password,
    ) {
    }
}
