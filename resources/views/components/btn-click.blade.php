@props(['title', 'icon' => null, 'position' => 'start'])

<button wire:loading.attr="disabled" wire:click="{{ $attributes['wire:click'] }}"
    class="ud-btn btn-dark px-4 rounded-pill fs-6 {{ $attributes['class'] }}" type="button">
    @if ($icon && $position === 'start')
        <i class="{{ $icon }} me-1" wire:loading.class="d-none"></i>
        <div wire:loading>
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    @endif

    @lang($title)

    @if ($icon && $position === 'end')
        <i class="{{ $icon }} ms-1" wire:loading.class="d-none"></i>
        <div wire:loading>
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    @endif
</button>
