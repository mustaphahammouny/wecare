<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapInputName(SnakeCaseMapper::class)]
#[MapName(SnakeCaseMapper::class)]
class ContactFilter extends Data
{
    public function __construct(
        public ?string $fullName,
        public ?string $email,
        public ?string $subject,
        public ?string $message,
    ) {
    }
}
