<?php

namespace App\Livewire\Views\Admin;

use App\Services\ContactService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.admin.app')]
#[Title('Contacts')]
class Contacts extends Component
{
    #[Computed]
    public function contacts(ContactService $contactService)
    {
        return $contactService->paginate();
    }

    public function render()
    {
        return view('livewire.admin.contacts');
    }
}
