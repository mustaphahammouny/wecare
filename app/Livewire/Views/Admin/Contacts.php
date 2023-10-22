<?php

namespace App\Livewire\Views\Admin;

use App\Services\ContactService;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin.app')]
class Contacts extends Component
{
    public function render(ContactService $contactService)
    {
        return view('livewire.admin.contacts')
            ->title('Contacts')
            ->with([
                'contacts' => $contactService->paginate(),
            ]);
    }
}
