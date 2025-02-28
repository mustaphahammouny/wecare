<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class DurationFilter extends Data
{
    public function __construct(
        public ?int $duration,
    ) {
    }
}
