<a class="header-logo" wire:navigate href="{{ route('home') }}">
    <img width="{{ $attributes['width'] ?? 200 }}" src="{{ Vite::image('logo.png') }}" {{ $attributes }}>
</a>