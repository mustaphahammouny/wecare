<?php

namespace App\Services;

use App\Data\PricingData;
use App\Data\PricingFilter;
use App\Models\Pricing;
use App\Repositories\PricingRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class PricingService
{
    public function __construct(protected PricingRepository $pricingRepository)
    {
    }

    public function get(PricingFilter $pricingFilter = null)
    {
        return $this->pricingRepository->get($pricingFilter);
    }

    public function paginate(PricingFilter $pricingFilter = null)
    {
        return $this->pricingRepository->paginate($pricingFilter);
    }

    public function find(int $id)
    {
        return $this->pricingRepository->find($id);
    }

    public function updateOrCreate(?Pricing $pricing, PricingData $pricingData)
    {
        try {
            DB::beginTransaction();

            if ($pricing) {
                $pricing = $this->pricingRepository->update($pricing, $pricingData);
            } else {
                $pricing = $this->pricingRepository->store($pricingData);
            }

            DB::commit();

            return $pricing;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function delete(Pricing $pricing)
    {
        try {
            DB::beginTransaction();

            $this->pricingRepository->delete($pricing);

            DB::commit();

            return $pricing;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
