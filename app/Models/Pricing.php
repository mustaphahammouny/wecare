<?php

namespace App\Models;

use App\Support\Number;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Number::toPrice($attributes['price'])
        );
    }

    protected function hourlyPrice(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Number::toHourlyPrice($attributes['price'])
        );
    }
}
