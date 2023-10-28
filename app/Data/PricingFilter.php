<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class PricingFilter extends Data
{
    public function __construct(
        public ?int $duration,
    ) {
    }
}
