<?php

namespace App\Models;

use App\Enums\ServiceList;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Service extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $appends = [
        'list',
    ];

    protected function list(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => ServiceList::from($attributes['slug'])
        );
    }

    public function extras(): HasMany
    {
        return $this->hasMany(Extra::class);
    }
}
