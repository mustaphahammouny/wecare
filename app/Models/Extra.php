<?php

namespace App\Models;

use App\Enums\ExtraList;
use App\Enums\PlanList;
use App\Support\Number;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Extra extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $appends = [
        'title',
        'formatted_price',
    ];

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => ExtraList::from($attributes['slug'])->title()
        );
    }

    protected function plan(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => PlanList::from($attributes['plan']),
            // set: fn (PlanList $plan) => $plan->value
        );
    }

    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Number::toPrice($attributes['price'])
        );
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
