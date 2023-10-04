@props(['title', 'route', 'icon' => null])

<a wire:navigate class="ud-btn btn-thm px-4 rounded-pill fs-6" href="{{ route($route) }}">
    @if ($icon)
        <i class="{{ $icon }} me-1"></i>
    @endif
    @lang($title)
</a>
