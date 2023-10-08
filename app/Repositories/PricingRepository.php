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

    private function findBy(array $filter)
    {
        return Pricing::when($filter['plan'] ?? false, function ($query, $plan) {
            $query->where('plan', $plan);
        })
            ->when($filter['min_duration'] ?? false, function ($query, $minDuration) {
                $query->where('min_duration', $minDuration);
            })
            ->when($filter['max_duration'] ?? false, function ($query, $maxDuration) {
                $query->where('max_duration', $maxDuration);
            });
    }
}
