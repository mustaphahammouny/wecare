<?php

namespace App\Data;

use App\Enums\Role;
use Spatie\LaravelData\Data;

class UserFilter extends Data
{
    public function __construct(
        public ?Role $role,
        public ?string $email,
    ) {
    }
}
