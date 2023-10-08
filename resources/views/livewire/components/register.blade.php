<div>
    <x-alert-session />

    <form wire:submit="register">
        <div class="mb15">
            <x-input wire:model="form.first_name" placeholder="First name" />
        </div>
        <div class="mb15">
            <x-input wire:model="form.last_name" placeholder="Last name" />
        </div>
        <div class="mb25">
            <x-input wire:model="form.email" type="email" placeholder="Email" />
        </div>
        <div class="mb15">
            <x-input wire:model="form.password" type="password" placeholder="Password" />
        </div>
        <div class="mb15">
            <x-input wire:model="form.password_confirmation" type="password" placeholder="Password Confirmation" />
        </div>
        <div class="d-grid mb20">
            <x-btn-submit title="Sign up" />
        </div>
    </form>
</div>
