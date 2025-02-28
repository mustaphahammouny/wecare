<?php

namespace App\Support;

class Number
{
    public static function format($number)
    {
        return number_format($number, 2, '.', ' ');
    }

    public static function toPrice($number)
    {
        return self::format($number) . __('€');
    }

    public static function toPercentage($number)
    {
        return self::format($number * 100) . '%';
    }

    public static function toHourlyPrice($number)
    {
        return self::toPrice($number) . '/' . __('h');
    }

    public static function toDuration($number)
    {
        return $number . __('h');
    }
}
