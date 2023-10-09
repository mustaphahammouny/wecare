<div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
    <h4 class="title fz17 mb30">@lang('Update Company Information')</h4>
    <p>@lang('Please verify the accuracy of the information provided, as it is crucial for generating your invoices correctly.')</p>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <x-alert-session />

            <form wire:submit="save" class="form-style1">
                <div class="mb15">
                    <x-input wire:model="form.name" placeholder="Company name" />
                </div>

                <div class="mb15">
                    <x-input wire:model="form.ice" placeholder="ICE" />
                </div>

                <div class="mb25">
                    <x-textarea wire:model="form.address" rows="4" placeholder="Company address" />
                </div>

                <div class="d-flex justify-content-end my20">
                    <x-btn-submit title="Save" position="start" icon="far fa-save" />
                </div>
            </form>
        </div>
    </div>
</div>
