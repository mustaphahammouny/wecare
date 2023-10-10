<div>
    <h4 class="title fz17 my-4 text-center">@lang('Please sign in/up before continue')</h4>

    <livewire:dynamic-component :component="$current" :key="$current" />

    @if ($current == \App\Livewire\Components\Register::class)
        <p class="dark-color text-center mb0 mt10">
            @lang('Already have an account?')
            <a href="javascript:void(0)" class="dark-color fw600" wire:click="navigate('login')">
                @lang("Sign in")
            </a>
        </p>
    @else
        <p class="dark-color text-center mb0 mt10">
            @lang("Don't have an account?")
            <a href="javascript:void(0)" class="dark-color fw600" wire:click="navigate('register')">
                @lang("Sign up")
            </a>
        </p>
    @endif
</div>
