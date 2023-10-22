<?php

namespace App\Enums;

use Illuminate\Support\Facades\Vite;

enum PlanList: int
{
    case Once = 1;
    case Regular = 2;

    public function title(): string
    {
        $title = match ($this) {
            self::Once => 'Once',
            self::Regular => 'Regular',
        };

        return __($title);
    }

    public function media(): string
    {
        $media = match ($this) {
            self::Once => 'once.png',
            self::Regular => 'regular.png',
        };

        return Vite::image("plans/{$media}");
    }
}
