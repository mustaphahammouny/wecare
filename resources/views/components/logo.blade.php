@props(['width' => 200])

<a class="header-logo" wire:navigate href="{{ route('home') }}">
    <img width="{{ $width }}" src="{{ Vite::image('logo.png') }}">
</a>