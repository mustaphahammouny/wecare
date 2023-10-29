<?php

namespace App\Repositories;

use App\Constants\General;
use App\Data\ServiceData;
use App\Data\ServiceFilter;
use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class ServiceRepository
{
    public function get(?ServiceFilter $serviceFilter): Collection
    {
        return $this->findBy($serviceFilter)
            ->get();
    }

    public function paginate(?ServiceFilter $serviceFilter)
    {
        return $this->findBy($serviceFilter)
            ->orderBy('created_at', 'desc')
            ->paginate(General::PER_PAGE);
    }

    public function first(ServiceFilter $serviceFilter): Service
    {
        return $this->findBy($serviceFilter)
            ->first();
    }

    public function count(?ServiceFilter $serviceFilter = null): int
    {
        return $this->findBy($serviceFilter)
            ->count();
    }

    public function firstOrFail(ServiceFilter $serviceFilter): Service
    {
        return $this->findBy($serviceFilter)
            ->firstOrFail();
    }

    public function find($id): Service
    {
        return Service::with(['firstMedia'])
            ->findOrFail($id);
    }

    public function store(ServiceData $serviceData): Service
    {
        $service = new Service();

        return $this->persist($service, $serviceData);
    }

    public function update(Service $service, ServiceData $serviceData): Service
    {
        return $this->persist($service, $serviceData);
    }

    public function delete(Service $service): bool
    {
        return $service->delete();
    }

    private function findBy(?ServiceFilter $serviceFilter)
    {
        return Service::with(['extras'])
            ->when($serviceFilter->slug ?? false, function ($query, $slug) {
                $query->where('slug', $slug);
            })
            ->when($serviceFilter->active ?? false, function ($query, $active) {
                $query->where('active', $active);
            });
    }

    private function persist(Service $service, ServiceData $serviceData): Service
    {
        $service->fill($serviceData->except('image')->toArray());

        $service->slug = Str::slug($service->title);

        $service->save();

        return $service;
    }
}
