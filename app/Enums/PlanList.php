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
            self::Once => 'db.plans.once',
            self::Regular => 'db.plans.regular',
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
                ['title' => 'store.pricing.pay-after', 'icon' => 'fa-check bgc-success'],
                ['title' => 'store.pricing.free-cancellation', 'icon' => 'fa-check bgc-success'],
                ['title' => 'store.pricing.free-products', 'icon' => 'fa-xmark bgc-danger'],
                ['title' => 'store.pricing.favourite-cleaner', 'icon' => 'fa-xmark bgc-danger'],
            ],
            self::Regular => [
                ['title' => 'store.pricing.pay-after', 'icon' => 'fa-check bgc-success'],
                ['title' => 'store.pricing.free-cancellation', 'icon' => 'fa-check bgc-success'],
                ['title' => 'store.pricing.free-products', 'icon' => 'fa-check bgc-success'],
                ['title' => 'store.pricing.favourite-cleaner', 'icon' => 'fa-check bgc-success'],
                ['title' => 'store.pricing.pause-booking', 'icon' => 'fa-check bgc-success'],
            ],
        };
    }
}
