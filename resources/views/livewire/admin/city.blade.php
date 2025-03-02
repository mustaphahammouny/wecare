<div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
    <h4 class="title fz17 mb30">
        @lang($city ? 'Edit city' : 'Create new city')
    </h4>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form wire:submit="save" class="form-style1">
                <div class="mb15">
                    <x-input wire:model="form.name" placeholder="Name" />
                </div>

                <div class="d-flex justify-content-end my20">
                    <x-btn-submit title="Save" position="start" icon="far fa-save" />
                </div>
            </form>
        </div>
    </div>
</div>
