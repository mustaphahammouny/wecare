<?php

namespace App\Repositories;

use App\Constants\General;
use App\Data\PricingData;
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

    public function paginate(?PricingFilter $pricingFilter)
    {
        return $this->findBy($pricingFilter)
            ->orderBy('created_at', 'desc')
            ->paginate(General::PER_PAGE);
    }

    public function first(PricingFilter $pricingFilter): Pricing
    {
        return $this->findBy($pricingFilter)
            ->first();
    }

    public function find($id): Pricing
    {
        return Pricing::findOrFail($id);
    }

    public function store(PricingData $pricingData): Pricing
    {
        $pricing = new Pricing();

        return $this->persist($pricing, $pricingData);
    }

    public function update(Pricing $pricing, PricingData $pricingData): Pricing
    {
        return $this->persist($pricing, $pricingData);
    }

    public function delete(Pricing $pricing): bool
    {
        return $pricing->delete();
    }

    private function findBy(?PricingFilter $pricingFilter)
    {
        return Pricing::when($pricingFilter->duration ?? false, function ($query, $duration) {
                $query->where('min_duration', '<=', $duration);
                $query->where('max_duration', '>=', $duration);
            });
    }

    private function persist(Pricing $pricing, PricingData $pricingData): Pricing
    {
        $pricing->fill($pricingData->toArray());

        $pricing->save();

        return $pricing;
    }
}
