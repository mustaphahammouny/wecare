<?php

namespace App\Livewire\Components;

use App\Livewire\Forms\UpdatePasswordForm;
use App\Livewire\Views\Client\Profile;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Computed;
use Livewire\Component;

class UpdatePassword extends Component
{
    protected UserService $userService;

    public UpdatePasswordForm $form;

    public function boot(UserService $userService)
    {
        $this->userService = $userService;
    }

    #[Computed]
    public function user()
    {
        return Auth::user();
    }

    public function save()
    {
        $this->form->validate();

        try {
            $this->userService->updatePassword($this->user, $this->form->password);

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
