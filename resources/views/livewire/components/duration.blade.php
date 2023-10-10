<div>
    <h4 class="title fz17 my-4 text-center">@lang('Duration of your session')</h4>
    <form wire:submit="submit">
        <div wire:ignore class="row row-cols-2 row-cols-sm-4">
            @foreach ($durations as $duration)
                <div wire:key="{{ $duration['duration'] }}" class="col">
                    <x-btn-radio wire:model.live="form.duration" id="duration-{{ $duration['duration'] }}"
                        value="{{ $duration['duration'] }}">
                        <span class="mt-1">{{ $duration['duration'] }}@lang('h')</span>
                        <br />
                        <span class="fz10">{{ $duration['hourly_price'] }}</span>
                    </x-btn-radio>
                </div>
            @endforeach
        </div>

        <x-alert-error name="form.duration" />

        <div class="d-flex justify-content-between my20">
            <x-btn-click wire:click="$parent.previous('duration')" title="Previous" icon="far fa-chevron-left" />
            <x-btn-submit title="Next" position="end" icon="far fa-chevron-right" />
        </div>
    </form>
</div>
