<?php

namespace App\Services;

use App\Constants\General;
use App\Models\City;
use Exception;
use Illuminate\Support\Arr;

class CityService
{
    public function get()
    {
        return City::query()->get();
    }

    public function paginate(array $filter = [])
    {
        return City::query()
            ->when(
                Arr::get($filter, 'name'),
                fn($query, $name) => $query->where('name', $name)
            )
            ->orderBy('created_at', 'desc')
            ->paginate(General::PER_PAGE);
    }

    public function store(array $data): City
    {
        $city = new City;

        return $this->persist($city, $data);
    }

    public function update(City $city, array $data): City
    {
        return $this->persist($city, $data);
    }

    public function delete(City $city): City
    {
        try {
            $city->delete();

            return $city;
        } catch (Exception $e) {
            throw $e;
        }
    }

    private function persist(City $city, array $data)
    {
        try {
            $city->fill($data);

            $city->save();

            return $city;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
