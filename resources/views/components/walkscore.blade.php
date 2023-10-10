@props([
    'icon',
    'end' => null
])

<div class="walkscore d-flex flex-nowrap align-items-center mb20">
    <span class="icon me-3 mb10-sm flex-shrink-0 {{ $icon }}"></span>
    <div class="details">
        {{ $slot }}
    </div>
    @if ($end)
        <p class="ms-auto mb-2">{{ $end }}</p>
    @endif
</div>