<?php

namespace App\Services;

use App\Data\ServiceFilter;
use App\Repositories\ServiceRepository;

class ServiceService
{
    public function __construct(protected ServiceRepository $serviceRepository)
    {
    }

    public function get(ServiceFilter $serviceFilter = null)
    {
        return $this->serviceRepository->get($serviceFilter);
    }

    public function first(ServiceFilter $serviceFilter)
    {
        return $this->serviceRepository->first($serviceFilter);
    }
}