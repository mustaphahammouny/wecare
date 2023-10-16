<?php

namespace App\Repositories;

use App\Data\PricingFilter;
use App\Models\Pricing;
use Illuminate\Database\Eloquent\Collection;

class PricingRepository
{
    public function get(?PricingFilter $pricingFilter): Collection
    {
        return $this->findBy($pricingFilter)
            ->get();
    }

    public function first(PricingFilter $pricingFilter): Pricing
    {
        return $this->findBy($pricingFilter)
            ->first();
    }

    private function findBy(PricingFilter $pricingFilter)
    {
        return Pricing::when($pricingFilter->plan ?? false, function ($query, $plan) {
            $query->where('plan', $plan);
        })
            ->when($pricingFilter->duration ?? false, function ($query, $duration) {
                $query->where('min_duration', '<=', $duration);
                $query->where('max_duration', '>=', $duration);
            });
    }
}
