<?php

namespace App\Enums;

use Illuminate\Support\Facades\Vite;

enum ServiceList: string
{
    case Cleaning = 'cleaning';
    case Ironing = 'ironing';
    case Cooking = 'cooking';
    case Teaching = 'teaching';
    case Coaching = 'coaching';
    case Haircut = 'haircut';
    case Beautifying = 'beautifying';

    public function title(): string
    {
        $title = match ($this) {
            self::Cleaning => 'Cleaning',
            self::Ironing => 'Ironing',
            self::Cooking => 'Cooking',
            self::Teaching => 'Teaching',
            self::Coaching => 'Coaching',
            self::Haircut => 'Hair cut',
            self::Beautifying => 'Beautifying',
        };

        return __($title);
    }

    public function media(): string
    {
        $media = match ($this) {
            self::Cleaning => 'cleaning.ltr.png',
            self::Ironing => 'ironing.ltr.png',
            self::Cooking => 'cooking.ltr.png',
            self::Teaching => 'teaching.ltr.png',
            self::Coaching => 'coaching.ltr.png',
            self::Haircut => 'haircut.ltr.png',
            self::Beautifying => 'beautifying.ltr.png',
        };

        return Vite::image("services/{$media}");
    }
}
