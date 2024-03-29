<?php

namespace App\Models;

use App\Enums\StatusList;
use App\Support\Number;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected function formattedServicePrice(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Number::toPrice($attributes['service_price'])
        );
    }

    protected function formattedTotal(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Number::toPrice($attributes['total'])
        );
    }

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => StatusList::from($attributes['status']),
            set: fn (StatusList $status) => $status->value
        );
    }

    protected function number(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => '#INV_' . str_pad($attributes['id'], 10, '0', STR_PAD_LEFT),
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

    public function extras(): BelongsToMany
    {
        return $this->belongsToMany(Extra::class)
            ->using(BookingExtra::class)
            ->withPivot('extra_price');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
