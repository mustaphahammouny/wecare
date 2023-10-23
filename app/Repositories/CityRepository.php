<?php

namespace App\Repositories;

use App\Constants\General;
use App\Data\CityData;
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

    public function find(int $id): City
    {
        return City::findOrFail($id);
    }

    public function count(?CityFilter $cityFilter = null): int
    {
        return $this->findBy($cityFilter)
            ->count();
    }

    public function store(CityData $cityData): City
    {
        $city = new City();

        return $this->persist($city, $cityData);
    }

    public function update(City $city, CityData $cityData): City
    {
        return $this->persist($city, $cityData);
    }

    public function delete(City $city): bool
    {
        return $city->delete();
    }

    private function findBy(?CityFilter $cityFilter)
    {
        return City::when($cityFilter->name ?? false, function ($query, $name) {
            $query->where('name', $name);
        });
    }

    private function persist(City $city, CityData $cityData): City
    {
        $city->fill($cityData->toArray());

        $city->save();

        return $city;
    }
}
