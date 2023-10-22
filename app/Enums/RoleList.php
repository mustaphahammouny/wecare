<?php

namespace App\Enums;

use App\Livewire\Views\Admin\Dashboard;
use App\Livewire\Views\Client\Services;

enum RoleList: int
{
    case Admin = 1;
    case Client = 2;

    public function title(): string
    {
        $title = match ($this) {
            self::Admin => 'Admin',
            self::Client => 'Client',
        };

        return __($title);
    }

    public function route(): string
    {
        return match ($this) {
            self::Admin => 'admin.dashboard',
            self::Client => 'client.services',
        };
    }

    public function component(): string
    {
        return match ($this) {
            self::Admin => Dashboard::class,
            self::Client => Services::class,
        };
    }

    static public function fromString($role): self
    {
        return match ($role) {
            'admin' => self::Admin,
            'client' => self::Client,
        };
    }
}
