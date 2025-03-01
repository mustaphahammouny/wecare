<?php

namespace App\Models;

use App\Support\Number;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingExtra extends Model
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
            get: fn(mixed $value, array $attributes) => Number::toPrice($attributes['price'])
        );
    }

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}
