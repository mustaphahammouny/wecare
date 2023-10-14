<?php

namespace App\Services;

use App\Data\CompanyData;
use App\Data\CompanyFilter;
use App\Repositories\CompanyRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class CompanyService
{
    public function __construct(protected CompanyRepository $companyRepository)
    {
    }

    public function first(CompanyFilter $companyFilter)
    {
        return $this->companyRepository->first($companyFilter);
    }

    public function updateOrCreate(CompanyData $companyData)
    {
        try {
            DB::beginTransaction();

            $booking = $this->companyRepository->updateOrCreate($companyData);

            DB::commit();

            return $booking;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
