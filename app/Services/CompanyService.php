<?php

namespace App\Services;

use App\Models\Company;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyService
{
    public function updateOrCreate(array $data)
    {
        /** @var User */
        $user = Auth::user();

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
