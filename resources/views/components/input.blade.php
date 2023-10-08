@props(['label' => null, 'alert' => false])

<div class="form-group">
    @if ($label)
        <label class="form-label fw600 dark-color">@lang($label)</label>
    @endif

    <input class="form-control @error($attributes['wire:model']) border-danger is-invalid @enderror"
        placeholder="{{ __($attributes['placeholder']) }}" {{ $attributes }} />

    @if ($alert)
        <div class="mt-2">
            <x-alert-error :name="$attributes['wire:model']" />
        </div>
    @else
        @error($attributes['wire:model'])
            <div class="invalid-feedback">@lang($message)</div>
        @enderror
    @endif
</div>
