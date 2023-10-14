<?php

namespace App\Services;

use App\Data\ContactData;
use App\Repositories\ContactRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class ContactService
{
    public function __construct(protected ContactRepository $contactRepository)
    {
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
