<?php

namespace App\Services;

use App\Data\CityData;
use App\Data\CityFilter;
use App\Models\City;
use App\Repositories\CityRepository;
use Exception;
use Illuminate\Support\Facades\DB;

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

    public function find(int $id)
    {
        return $this->cityRepository->find($id);
    }

    public function updateOrCreate(?City $city, CityData $cityData)
    {
        try {
            DB::beginTransaction();

            if ($city) {
                $city = $this->cityRepository->update($city, $cityData);
            } else {
                $city = $this->cityRepository->store($cityData);
            }

            DB::commit();

            return $city;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function delete(City $city)
    {
        try {
            DB::beginTransaction();

            $this->cityRepository->delete($city);

            DB::commit();

            return $city;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
