<?php

namespace App\Data;

use App\Enums\RoleList;
use Spatie\LaravelData\Data;

class UserFilter extends Data
{
    public function __construct(
        public ?RoleList $role,
        public ?string $email,
    ) {
    }
}
