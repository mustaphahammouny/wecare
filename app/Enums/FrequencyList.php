<?php

namespace App\Enums;

enum FrequencyList: int
{
    case Weekly = 1;
    case Biweekly = 2;
    case Monthly = 3;

    public function title(): string
    {
        $title = match ($this) {
            self::Weekly => 'Once per week',
            self::Biweekly => 'Twice per month',
            self::Monthly => 'Once per month',
        };

        return __($title);
    }
}
