<?php

namespace App\Repositories;

use App\Models\Extra;
use Illuminate\Database\Eloquent\Collection;

class ExtraRepository
{
    public function find(int $id): Extra
    {
        return Extra::findOrFail($id);
    }

    public function findIn(array $ids): Collection
    {
        return Extra::find($ids);
    }
}
