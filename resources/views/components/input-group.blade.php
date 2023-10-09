@props(['label' => null, 'alert' => false])

@if ($label)
    <label class="form-label fw600 dark-color">@lang($label)</label>
@endif

<div class="input-group has-validation">
    <span class="input-group-text rounded-end-0">
        {{ $slot }}
    </span>

    <input class="form-control @error($attributes['wire:model']) border-danger is-invalid @enderror"
        placeholder="{{ __($attributes['placeholder']) }}" {{ $attributes }} />

    @if ($alert)
        <div class="w-100 mt-2">
            <x-alert-error :name="$attributes['wire:model']" classes="mb-0" />
        </div>
    @else
        @error($attributes['wire:model'])
            <div class="invalid-feedback">@lang($message)</div>
        @enderror
    @endif
</div>
