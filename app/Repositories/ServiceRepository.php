<?php

namespace App\Repositories;

use App\Data\ServiceFilter;
use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;

class ServiceRepository
{
    public function get(?ServiceFilter $serviceFilter): Collection
    {
        return $this->findBy($serviceFilter)
            ->get();
    }

    public function first(ServiceFilter $serviceFilter): Service
    {
        return $this->findBy($serviceFilter)
            ->first();
    }

    public function firstOrFail(ServiceFilter $serviceFilter): Service
    {
        return $this->findBy($serviceFilter)
            ->firstOrFail();
    }

    public function find($id): Service
    {
        return Service::with(['extras'])
            ->findOrFail($id);
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
}
