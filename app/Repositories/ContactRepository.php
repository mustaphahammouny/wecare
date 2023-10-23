<?php

namespace App\Repositories;

use App\Constants\General;
use App\Data\ContactData;
use App\Data\ContactFilter;
use App\Models\Contact;

class ContactRepository
{
    public function paginate(?ContactFilter $contactFilter)
    {
        return $this->findBy($contactFilter)
            ->orderBy('created_at', 'desc')
            ->paginate(General::PER_PAGE);
    }

    public function count(?ContactFilter $contactFilter = null): int
    {
        return $this->findBy($contactFilter)
            ->count();
    }

    public function store(ContactData $contactData)
    {
        $contact = new Contact();

        $contact->fill($contactData->toArray());

        $contact->save();

        return $contact;
    }

    private function findBy(?ContactFilter $contactFilter)
    {
        return Contact::when($contactFilter->fullName ?? false, function ($query, $fullName) {
            $query->where('full_name', 'like', "%$fullName%");
        })
            ->when($contactFilter->email ?? false, function ($query, $email) {
                $$query->where('email', 'like', "%$email%");
            })
            ->when($contactFilter->subject ?? false, function ($query, $subject) {
                $$query->where('subject', 'like', "%$subject%");
            })
            ->when($contactFilter->message ?? false, function ($query, $message) {
                $$query->where('message', 'like', "%$message%");
            });
    }
}
