<?php

namespace App\Repositories;

use App\Data\CompanyData;
use App\Data\CompanyFilter;
use App\Models\Company;
use Exception;
use Illuminate\Support\Facades\DB;

class CompanyRepository
{
    public function first(CompanyFilter $companyFilter): ?Company
    {
        return $this->findBy($companyFilter)
            ->first();
    }

    public function updateOrCreate(CompanyData $companyData)
    {
        $company = Company::firstOrNew([
            'user_id' => $companyData->userId,
        ]);

        return $this->persist($company, $companyData);
    }

    private function findBy(CompanyFilter $companyFilter)
    {
        return Company::when($companyFilter->userId ?? false, function ($query, $userId) {
            $query->where('user_id', $userId);
        });
    }

    private function persist(Company $company, CompanyData $companyData)
    {
        try {
            DB::beginTransaction();

            $company->fill($companyData->except('userId')->toArray());

            $company->save();

            DB::commit();

            return $company;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
