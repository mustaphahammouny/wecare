<?php

namespace App\Services;

use App\Constants\General;
use App\Data\ContactData;
use App\Data\ContactFilter;
use App\Models\Contact;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ContactService
{
    public function paginate(array $filter = [])
    {
        return Contact::query()
            ->when(
                Arr::get($filter, 'email'),
                fn($query, $email) => $query->where('email', 'like', "%$email%")
            )
            ->when(
                Arr::get($filter, 'full_name'),
                fn($query, $fullName) => $query->where('full_name', 'like', "%$fullName%")
            )
            ->orderBy('created_at', 'desc')
            ->paginate(General::PER_PAGE);
    }

    public function store(array $data): Contact
    {
        try {
            $contact = Contact::query()->create($data);

            return $contact;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
