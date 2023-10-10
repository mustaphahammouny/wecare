<?php

namespace App\Repositories;

use App\Data\CompanyData;
use App\Data\CompanyFilter;
use App\Models\Company;

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

    private function findBy(?CompanyFilter $companyFilter)
    {
        return Company::when($companyFilter->userId ?? false, function ($query, $userId) {
            $query->where('user_id', $userId);
        });
    }

    private function persist(Company $company, CompanyData $companyData)
    {
        $company->fill($companyData->except('userId')->toArray());

        $company->save();

        return $company;
    }
}
