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

        @if ($form->duration && !empty($state['service']['extras']))
            <h4 class="title fz17 mt-2">@lang('Additional options')</h4>
            <div class="row mt20">
                @foreach ($state['service']['extras'] as $extra)
                    <div wire:key="{{ $extra['id'] }}" class="switch-style1">
                        <div class="form-check form-switch mb20">
                            <input wire:model.live="form.extras" type="checkbox" class="form-check-input"
                                value="{{ $extra['id'] }}" id="extra-{{ $extra['id'] }}">
                            <label class="form-check-label" for="extra-{{ $extra['id'] }}">
                                <span>{{ $extra['title'] }}</span>
                                <span class="text-muted">({{ $extra['formatted_price'] }})</span>
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="d-flex justify-content-between my20">
            <x-btn-click wire:click="$parent.previous('duration')" title="Previous" icon="far fa-chevron-left" />
            <x-btn-submit title="Next" position="end" icon="far fa-chevron-right" />
        </div>
    </form>
</div>
