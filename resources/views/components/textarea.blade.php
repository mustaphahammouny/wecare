@props(['alert' => false])

<div class="form-group">
    @if (Arr::has($attributes, 'placeholder'))
        <label class="form-label fw600 dark-color">@lang(Arr::get($attributes, 'placeholder'))</label>
    @endif

    <textarea class="form-control @error($attributes['wire:model']) border-danger is-invalid @enderror"
        placeholder="{{ __($attributes['placeholder']) }}" {{ $attributes }}></textarea>

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
