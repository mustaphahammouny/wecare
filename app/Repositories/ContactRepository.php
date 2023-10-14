<?php

namespace App\Repositories;

use App\Data\ContactData;
use App\Models\Contact;

class ContactRepository
{
    public function store(ContactData $contactData)
    {
        $contact = new Contact();

        $contact->fill($contactData->toArray());

        $contact->save();

        return $contact;
    }
}
