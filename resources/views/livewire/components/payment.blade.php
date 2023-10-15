<div>
    <h4 class="title fz17 my-4 text-center">@lang('Payment')</h4>
    <form wire:submit="submit">
        <div class="row mt20">
            <div class="switch-style1">
                <div class="form-check form-switch mb20">
                    <input wire:model="form.agreed" type="checkbox" class="form-check-input" id="agreed">
                    <label class="form-check-label" for="agreed">
                        <span>@lang('by checking this box you agree to the terms and conditions')</span>
                    </label>
                </div>
            </div>

            <x-alert-error name="form.frenquecy" />
        </div>

        <div class="d-flex justify-content-between mb20">
            <x-btn-click wire:click="$parent.previous('payment')" title="Previous" icon="far fa-chevron-left" />
            <x-btn-submit title="Next" position="end" icon="far fa-chevron-right" />
        </div>
    </form>
</div>
