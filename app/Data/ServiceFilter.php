<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class ServiceFilter extends Data
{
    public function __construct(
        public ?int $id,
        public ?string $slug,
        public ?bool $active,
    ) {
    }
}
