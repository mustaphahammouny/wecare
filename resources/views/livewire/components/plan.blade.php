<div>
    <h4 class="title fz17 my-4 text-center">@lang('Plans & Additional options')</h4>
    <form wire:submit="submit">
        <div wire:ignore class="row">
            @foreach ($plans as $plan)
                <div wire:key="{{ $plan->value }}" class="col">
                    <x-btn-radio wire:model.live="form.plan" id="service-{{ $plan->value }}" value="{{ $plan->value }}">
                        <img class="mb-2" width="40px" src="{{ $plan->media() }}" />
                        <br />
                        <span class="mt-1">
                            {{ $plan->title() }}
                        </span>
                    </x-btn-radio>
                </div>
            @endforeach
        </div>

        <x-alert-error name="form.plan" />

        @if (!empty($planOptions))
            <div class="row mt20">
                @foreach ($planOptions as $planOption)
                    <div wire:key="{{ $planOption->value }}" class="switch-style1">
                        <div class="form-check form-switch mb20">
                            <input wire:model="form.plan_option" type="radio" class="form-check-input"
                                value="{{ $planOption->value }}" id="plan-option-{{ $planOption->value }}">
                            <label class="form-check-label" for="plan-option-{{ $planOption->value }}">
                                <span>{{ $planOption->title() }}</span>
                            </label>
                        </div>
                    </div>
                @endforeach

                <x-alert-error name="form.plan_option" />
            </div>
        @endif

        @if (!empty($state['service']['extras']))
            <h4 class="title fz17 mt-2">@lang('Additional options')</h4>
            <div class="row mt20">
                @foreach ($state['service']['extras'] as $extra)
                    <div wire:key="{{ $extra['id'] }}" class="switch-style1">
                        <div class="form-check form-switch mb20">
                            <input wire:model="form.extras" type="checkbox" class="form-check-input"
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
            <x-btn-click wire:click="$parent.previous('plan')" title="Previous" icon="far fa-chevron-left" />
            <x-btn-submit title="Next" position="end" icon="far fa-chevron-right" />
        </div>
    </form>
</div>
