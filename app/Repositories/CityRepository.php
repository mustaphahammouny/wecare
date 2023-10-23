<?php

namespace App\Repositories;

use App\Constants\General;
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

    public function paginate(?CityFilter $cityFilter)
    {
        return $this->findBy($cityFilter)
            ->orderBy('created_at', 'desc')
            ->paginate(General::PER_PAGE);
    }

    public function count(?CityFilter $cityFilter = null): int
    {
        return $this->findBy($cityFilter)
            ->count();
    }

    private function findBy(?CityFilter $cityFilter)
    {
        return City::when($cityFilter->name ?? false, function ($query, $name) {
            $query->where('name', $name);
        });
    }
}
