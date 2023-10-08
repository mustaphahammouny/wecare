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

    public function options(): array
    {
        return match ($this) {
            self::Once => [],
            self::Regular => [
                PlanOptionList::Weekly,
                PlanOptionList::Biweekly,
                PlanOptionList::Monthly,
            ],
        };
    }

    public function benefits(): array
    {
        return match ($this) {
            self::Once => [
                ['title' => 'Payment online after the session', 'icon' => 'fa-check bgc-success'],
                ['title' => 'Free cancellation', 'icon' => 'fa-check bgc-success'],
                ['title' => 'Favourite pro guaranteed', 'icon' => 'fa-xmark bgc-danger'],
                ['title' => 'Pause your booking anytime', 'icon' => 'fa-xmark bgc-danger'],
            ],
            self::Regular => [
                ['title' => 'Payment online after the session', 'icon' => 'fa-check bgc-success'],
                ['title' => 'Free cancellation', 'icon' => 'fa-check bgc-success'],
                ['title' => 'Favourite pro guaranteed', 'icon' => 'fa-check bgc-success'],
                ['title' => 'Pause your booking anytime', 'icon' => 'fa-check bgc-success'],
            ],
        };
    }
}
