<div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
    <h4 class="title fz17 mb30">@lang('Update Profile Information')</h4>
    <p>@lang('Update your account\'s profile information and email address.')</p>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form wire:submit="save" class="form-style1">
                <div class="mb15">
                    <x-input wire:model="form.first_name" placeholder="First name" />
                </div>

                <div class="mb15">
                    <x-input wire:model="form.last_name" placeholder="Last name" />
                </div>

                <div class="mb25">
                    <x-input wire:model="form.email" type="email" placeholder="Email" />
                </div>

                <div class="mb15">
                    <x-input-group wire:model="form.phone" placeholder="Phone">
                        <span class="fi fi-ma"></span>
                    </x-input-group>
                </div>

                <div class="d-flex justify-content-end my20">
                    <x-btn-submit title="Save" position="start" icon="far fa-save" />
                </div>
            </form>
        </div>
    </div>
</div>
