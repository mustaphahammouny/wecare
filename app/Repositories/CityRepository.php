<?php

namespace App\Repositories;

use App\Data\CityFilter;
use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityRepository
{
    public function get(?CityFilter $cityFilter): Collection
    {
        return $this->findBy($cityFilter)
            ->get();
    }

    private function findBy(?CityFilter $cityFilter)
    {
        return City::when($cityFilter->name ?? false, function ($query, $name) {
            $query->where('name', $name);
        });
    }
}
