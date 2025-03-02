<?php

namespace App\Models;

use App\Enums\BookingStatus;
use App\Support\Number;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'status' => BookingStatus::class,
    ];

    protected function formattedHourlyPrice(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => Number::toPrice($attributes['hourly_price'])
        );
    }

    protected function formattedTotal(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => Number::toPrice($attributes['total'])
        );
    }

    protected function number(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => '#INV_' . str_pad($attributes['id'], 10, '0', STR_PAD_LEFT),
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function extras(): HasMany
    {
        return $this->hasMany(BookingExtra::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function invoice(): HasOne
    {
        return $this->hasOne(Invoice::class);
    }

    public function updateStatus(BookingStatus $bookingStatus): self
    {
        $this->update([
            'status' => $bookingStatus,
        ]);

        return $this;
    }
}
