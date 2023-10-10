<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class CityFilter extends Data
{
    public function __construct(
        public string $name,
    ) {
    }
}
