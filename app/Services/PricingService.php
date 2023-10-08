<?php

namespace App\Services;

use App\Repositories\PricingRepository;

class PricingService
{
    public function __construct(protected PricingRepository $pricingRepository)
    {
    }

    public function get(array $filter)
    {
        return $this->pricingRepository->get($filter);
    }
}
