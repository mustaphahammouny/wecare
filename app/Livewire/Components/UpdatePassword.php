<?php

namespace App\Livewire\Components;

use App\Livewire\Forms\UpdatePasswordForm;
use App\Livewire\Views\Client\Profile;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class UpdatePassword extends Component
{
    public UpdatePasswordForm $form;

    protected User $user;

    public function boot()
    {
        $this->user = Auth::user();
    }

    public function save(UserService $userService)
    {
        $this->form->validate();

        try {
            $userService->updatePassword($this->user, $this->form->password);

            Session::flash('success', 'Saved!');

            return $this->redirect(Profile::class, navigate: true);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.components.update-password');
    }
}
