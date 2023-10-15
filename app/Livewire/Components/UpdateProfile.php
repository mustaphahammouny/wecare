<?php

namespace App\Livewire\Components;

use App\Livewire\Forms\UpdateProfileForm;
use App\Livewire\Views\Client\Profile;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class UpdateProfile extends Component
{
    public UpdateProfileForm $form;

    protected User $user;

    public function boot()
    {
        $this->user = Auth::user();
    }

    public function mount()
    {
        $this->form->fillProps($this->user);
    }

    public function save(UserService $userService)
    {
        $this->form->validate();

        try {
            $userService->update($this->user, $this->form->toData());

            Session::flash('success', 'Saved!');

            return $this->redirect(Profile::class, navigate: true);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.components.update-profile');
    }
}
