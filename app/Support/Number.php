<?php

namespace App\Support;

use Illuminate\Support\Facades\App;
use Rmunate\Utilities\SpellNumber;

class Number
{
    public static function format($number)
    {
        return number_format($number, 2, '.', ' ');
    }

    public static function toPrice($number)
    {
        return self::format($number) . __('MAD');
    }

    public static function toPercentage($number)
    {
        return self::format($number * 100) . '%';
    }

    public static function toHourlyPrice($number)
    {
        return self::toPrice($number) . '/' . __('h');
    }

    public static function toLetters($number)
    {
        $locale = App::getLocale();
        $number = str_replace('.00', '', $number) + 0;
        
        return SpellNumber::value($number)
            ->locale($locale)
            ->currency(__('dirhams'))
            ->fraction(__('cents'))
            ->toMoney();
    }
}
