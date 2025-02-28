<?php

namespace App\Services;

use App\Data\ServiceData;
use App\Data\ServiceFilter;
use App\Models\Service;
use App\Repositories\ServiceRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class ServiceService
{
    public function __construct(protected ServiceRepository $serviceRepository) {}

    public function get(?ServiceFilter $serviceFilter = null, array $with = [])
    {
        return $this->serviceRepository->get($serviceFilter, $with);
    }

    public function paginate(?ServiceFilter $serviceFilter = null, array $with = [])
    {
        return $this->serviceRepository->paginate($serviceFilter, $with);
    }

    public function first(ServiceFilter $serviceFilter, array $with = [])
    {
        return $this->serviceRepository->first($serviceFilter, $with);
    }

    public function firstOrFail(ServiceFilter $serviceFilter, array $with = [])
    {
        return $this->serviceRepository->firstOrFail($serviceFilter, $with);
    }

    public function find(int $id)
    {
        return $this->serviceRepository->find($id);
    }

    public function updateOrCreate(?Service $service, ServiceData $serviceData)
    {
        try {
            DB::beginTransaction();

            if ($service) {
                $service = $this->serviceRepository->update($service, $serviceData);
            } else {
                $service = $this->serviceRepository->store($serviceData);
            }

            if ($serviceData->image) {
                $service->clearMediaCollection();
                $service->addMedia($serviceData->image)->toMediaCollection();
            }

            DB::commit();

            return $service;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function delete(Service $service)
    {
        try {
            DB::beginTransaction();

            $this->serviceRepository->delete($service);

            DB::commit();

            return $service;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
