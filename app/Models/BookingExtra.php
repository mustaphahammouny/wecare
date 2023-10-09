<?php

namespace App\Models;

use App\Support\Number;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BookingExtra extends Pivot
{
    public $incrementing = true;

    protected $guarded = [];

    protected function formattedExtraPrice(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Number::toPrice($attributes['extra_price'])
        );
    }
}
