<?php

namespace App\Livewire\Views\Store;

use App\Livewire\Forms\ContactForm;
use App\Services\ContactService;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.store.app')]
class Contact extends Component
{
    public ContactForm $form;

    public function send(ContactService $contactService)
    {
        $this->form->validate();

        try {
            $contactService->store($this->form->toData());

            Session::flash('success', 'Thank you for your trust, we will reach out soon!');

            return $this->redirect(self::class, navigate: true);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.store.contact')
            ->title('Contact');
    }
}
