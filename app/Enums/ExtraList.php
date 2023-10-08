<?php

namespace App\Enums;

enum ExtraList: string
{
    case Product = 'product';

    public function title(): string
    {
        $title = match ($this) {
            self::Product => 'db.extras.' . (self::Product)->value,
        };

        return __($title);
    }
}
