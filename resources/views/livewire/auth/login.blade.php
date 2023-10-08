<div class="log-reg-form signup-modal form-style1 bgc-white p50 p30-sm default-box-shadow2 bdrs12">
    <div class="text-center mb40">
        <x-logo />
        <h2 class="mt25">@lang('Sign in')</h2>
    </div>

    <livewire:components.login />

    <p class="dark-color text-center mb0 mt10">
        @lang("Don't have an account?")
        <a class="dark-color fw600" wire:navigate href="{{ route('auth.register') }}">
            @lang('Sign up')
        </a>
    </p>
</div>
