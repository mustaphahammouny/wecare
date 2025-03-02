<div>
    <x-alert-session />

    <form wire:submit="login">
        <div class="mb25">
            <x-input wire:model="form.email" placeholder="Email" />
        </div>

        <div class="mb15">
            <x-input wire:model="form.password" type="password" placeholder="Password" />
        </div>

        <div class="checkbox-style1 d-block d-sm-flex align-items-center justify-content-between mb10">
            <label class="custom_checkbox fz14 ff-heading">
                <span>@lang('Remember me')</span>
                <input wire:model="form.remember" type="checkbox">
                <span class="checkmark"></span>
            </label>
            {{-- <a class="fz14 ff-heading" wire:navigate href="{{ route('auth.password.request') }}">
                @lang('Forgot your password?')
            </a> --}}
        </div>

        <div class="d-grid mb20">
            <x-btn-submit icon="fa fa-sign-in" title="Sign in" />
        </div>
    </form>
</div>
