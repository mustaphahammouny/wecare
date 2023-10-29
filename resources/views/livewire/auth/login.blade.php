<div class="log-reg-form signup-modal form-style1 bgc-white p50 p30-sm default-box-shadow2 bdrs12">
    <div class="text-center mb40">
        <x-logo />
        <h2 class="mt25">@lang('Sign in')</h2>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 mb25 text-center">
        <div class="col mt10">
            <h5>@lang('As admin')</h5>
            <p class="mb-0"><strong>@lang('Email'):</strong> admin@wecare.com</p>
            <p class="mb-0"><strong>@lang('Password'):</strong> password</p>
        </div>
        <div class="col mt10">
            <h5>@lang('As client')</h5>
            <p class="mb-0"><strong>@lang('Email'):</strong> client@wecare.com</p>
            <p class="mb-0"><strong>@lang('Password'):</strong> password</p>
        </div>
    </div>

    <livewire:components.login />

    <p class="dark-color text-center mb0 mt10">
        @lang("Don't have an account?")
        <a class="dark-color fw600" wire:navigate href="{{ route('auth.register') }}">
            @lang('Sign up')
        </a>
    </p>
</div>
