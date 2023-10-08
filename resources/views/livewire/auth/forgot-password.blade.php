<div class="log-reg-form signup-modal form-style1 bgc-white p50 p30-sm default-box-shadow2 bdrs12">
    <div class="text-center mb40">
        <x-logo />
        <h2 class="mt25">@lang('Forgot your password?')</h2>
    </div>

    <x-alert-session />

    <form wire:submit="send">
        <div class="mb25">
            <x-input wire:model="form.email" type="email" placeholder="Email" />
        </div>
        <div class="d-grid mb20">
            <x-btn-submit title="Send" />
        </div>
    </form>

    <p class="dark-color text-center mb0 mt10">
        @lang('Already have an account?')
        <a class="dark-color fw600" wire:navigate href="{{ route('auth.login') }}">
            @lang('Sign in')
        </a>
    </p>
</div>
