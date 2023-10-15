<?php

namespace App\Repositories;

use App\Models\Pricing;
use Illuminate\Database\Eloquent\Collection;

class PricingRepository
{
    public function get(array $filter = []): Collection
    {
        return $this->findBy($filter)
            ->get();
    }

    public function first(array $filter = []): Pricing
    {
        return $this->findBy($filter)
            ->first();
    }

    private function findBy(array $filter)
    {
        return Pricing::when($filter['plan'] ?? false, function ($query, $plan) {
            $query->where('plan', $plan);
        })
            ->when($filter['duration'] ?? false, function ($query, $duration) {
                $query->where('min_duration', '<=', $duration);
                $query->where('max_duration', '>=', $duration);
            });
    }
}
