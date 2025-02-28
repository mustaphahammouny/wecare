<?php

namespace App\Repositories;

use App\Constants\General;
use App\Data\DurationData;
use App\Data\DurationFilter;
use App\Models\Duration;
use Illuminate\Database\Eloquent\Collection;

class DurationRepository
{
    public function get(?DurationFilter $durationFilter): Collection
    {
        return $this->findBy($durationFilter)
            ->get();
    }

    public function paginate(?DurationFilter $durationFilter)
    {
        return $this->findBy($durationFilter)
            ->orderBy('created_at', 'desc')
            ->paginate(General::PER_PAGE);
    }

    public function first(DurationFilter $durationFilter): Duration
    {
        return $this->findBy($durationFilter)
            ->first();
    }

    public function find($id): Duration
    {
        return Duration::findOrFail($id);
    }

    public function store(DurationData $durationData): Duration
    {
        $duration = new Duration();

        return $this->persist($duration, $durationData);
    }

    public function update(Duration $duration, DurationData $durationData): Duration
    {
        return $this->persist($duration, $durationData);
    }

    public function delete(Duration $duration): bool
    {
        return $duration->delete();
    }

    private function findBy(?DurationFilter $durationFilter)
    {
        return Duration::when($durationFilter->duration ?? false, function ($query, $duration) {
            $query->where('min', '<=', $duration);
            $query->where('max', '>=', $duration);
        });
    }

    private function persist(Duration $duration, DurationData $durationData): Duration
    {
        $duration->fill($durationData->toArray());

        $duration->save();

        return $duration;
    }
}
