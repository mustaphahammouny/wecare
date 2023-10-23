<?php

namespace App\Services;

use App\Data\CityFilter;
use App\Repositories\CityRepository;

class CityService
{
    public function __construct(protected CityRepository $cityRepository)
    {
    }

    public function get(CityFilter $cityFilter = null)
    {
        return $this->cityRepository->get($cityFilter);
    }

    public function paginate(CityFilter $cityFilter = null)
    {
        return $this->cityRepository->paginate($cityFilter);
    }
}