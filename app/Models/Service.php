<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Service extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function extras(): HasMany
    {
        return $this->hasMany(Extra::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function durations(): HasMany
    {
        return $this->hasMany(Duration::class);
    }

    public function minDuration(): HasOne
    {
        return $this->durations()->one()->ofMany('min', 'min');
    }

    public function maxDuration(): HasOne
    {
        return $this->durations()->one()->ofMany('max', 'max');
    }

    public function firstMedia(): MorphOne
    {
        return $this->morphOne(Media::class, 'model')
            ->where('order_column', 1);
    }
}
