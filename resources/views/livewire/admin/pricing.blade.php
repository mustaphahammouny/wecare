<div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
    <h4 class="title fz17 mb30">
        @if ($id)
            @lang('Edit pricing')
        @else
            @lang('Create new pricing')
        @endif
    </h4>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form wire:submit="save" class="form-style1">
                <div class="mb15">
                    <x-input wire:model="form.min_duration" placeholder="Min duration" />
                </div>

                <div class="mb15">
                    <x-input wire:model="form.max_duration" placeholder="Max duration" />
                </div>

                <div class="mb15">
                    <x-input wire:model="form.price" placeholder="Price" />
                </div>

                <div class="d-flex justify-content-end my20">
                    <x-btn-submit title="Save" position="start" icon="far fa-save" />
                </div>
            </form>
        </div>
    </div>
</div>
