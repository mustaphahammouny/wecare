<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class UserFilter extends Data
{
    public function __construct(
        public ?string $email,
    ) {
    }
}
