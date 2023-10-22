<?php

namespace App\Services;

use App\Data\ContactData;
use App\Data\ContactFilter;
use App\Repositories\ContactRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class ContactService
{
    public function __construct(protected ContactRepository $contactRepository)
    {
    }

    public function paginate(ContactFilter $contactFilter = null)
    {
        return $this->contactRepository->paginate($contactFilter);
    }

    public function store(ContactData $contactData)
    {
        try {
            DB::beginTransaction();

            $booking = $this->contactRepository->store($contactData);

            DB::commit();

            return $booking;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
