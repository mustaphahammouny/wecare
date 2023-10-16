<?php

namespace App\Services;

use App\Data\PricingFilter;
use App\Repositories\PricingRepository;

class PricingService
{
    public function __construct(protected PricingRepository $pricingRepository)
    {
    }

    public function get(PricingFilter $pricingFilter)
    {
        return $this->pricingRepository->get($pricingFilter);
    }
}
