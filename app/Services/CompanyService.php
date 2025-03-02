<?php

namespace App\Services;

use App\Models\Company;
use App\Models\User;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CompanyService
{
    public function first(array $filter = [])
    {
        return Company::query()
            ->when(
                Arr::get($filter, 'user_id'),
                fn($query, $userId) => $query->where('user_id', $userId)
            )
            ->first();
    }

    public function updateOrCreate(User $user, array $data)
    {
        try {
            DB::beginTransaction();

            $company = Company::query()
                ->updateOrCreate([
                    'user_id' => $user->id,
                ], $data);

            DB::commit();

            return $company;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
