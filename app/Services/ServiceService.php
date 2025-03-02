<?php

namespace App\Services;

use App\Constants\General;
use App\Models\Service;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ServiceService
{
    public function get(array $with = [])
    {
        return Service::query()
            ->with($with)
            ->where('active', true)
            ->get();
    }

    public function paginate(array $filter = [])
    {
        return Service::query()
            ->with(['firstMedia'])
            ->when(
                Arr::get($filter, 'slug'),
                fn($query, $slug) => $query->where('slug', $slug)
            )
            ->orderBy('created_at', 'desc')
            ->paginate(General::PER_PAGE);
    }

    public function store(array $data): Service
    {
        $service = new Service;

        return $this->persist($service, $data);
    }

    public function update(Service $service, array $data): Service
    {
        return $this->persist($service, $data);
    }

    public function delete(Service $service): Service
    {
        try {
            $service->delete();

            return $service;
        } catch (Exception $e) {
            throw $e;
        }
    }

    private function persist(Service $service, array $data)
    {
        try {
            DB::beginTransaction();

            $service->fill($data);

            $service->save();

            if ($image = Arr::get($data, 'image')) {
                $service->clearMediaCollection();
                $service->addMedia($image)->toMediaCollection();
            }

            DB::commit();

            return $service;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
