@props([
    'title', 
    'icon' => null, 
    'position' => 'start',
])

<button wire:loading.attr="disabled" class="ud-btn btn-thm" type="submit">
    @if ($icon && $position === 'left')
        <i class="{{ $icon }} me-1" wire:loading.class="d-none"></i>
        <div wire:loading>
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    @endif

    {{ $title }}

    @if ($icon && $position === 'right')
        <i class="{{ $icon }} ms-1" wire:loading.class="d-none"></i>
        <div wire:loading>
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    @endif
</button>
