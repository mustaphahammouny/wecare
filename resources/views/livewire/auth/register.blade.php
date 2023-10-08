<div class="log-reg-form signup-modal form-style1 bgc-white p50 p30-sm default-box-shadow2 bdrs12">
    <div class="text-center mb40">
        <x-logo />
        <h2 class="mt25">@lang('Sign up')</h2>
    </div>

    <livewire:components.register />

    <p class="dark-color text-center mb0 mt10">
        @lang('Already have an account?')
        <a class="dark-color fw600" wire:navigate href="{{ route('auth.login') }}">
            @lang('Sign in')
        </a>
    </p>
</div>
