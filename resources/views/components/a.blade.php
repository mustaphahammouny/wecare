@props(['title', 'route', 'icon' => null, 'position' => 'start'])

<a wire:navigate class="ud-btn btn-thm px-4 rounded-pill fs-6" href="{{ route($route) }}">
    @if ($icon && $position === 'start')
        <i class="{{ $icon }} me-1"></i>
    @endif

    @lang($title)

    @if ($icon && $position === 'end')
        <i class="{{ $icon }} ms-1"></i>
    @endif
</a>
