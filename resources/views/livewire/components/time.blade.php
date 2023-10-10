<div>
    <h4 class="title fz17 my-4 text-center">@lang('Time of your session')</h4>
    <form wire:submit="submit">
        <div wire:ignore class="row row-cols-2 row-cols-sm-4">
            @foreach ($times as $time)
                <div wire:key="{{ $time }}" class="col">
                    <x-btn-radio wire:model="form.time" id="time-{{ $time }}" value="{{ $time }}">
                        <span class="mt-1">{{ $time }}@lang('h')</span>
                    </x-btn-radio>
                </div>
            @endforeach
        </div>

        <x-alert-error name="form.time" />

        <div class="d-flex justify-content-between my20">
            <x-btn-click wire:click="$parent.previous('time')" title="Previous" icon="far fa-chevron-left" />
            <x-btn-submit title="Next" position="end" icon="far fa-chevron-right" />
        </div>
    </form>
</div>
