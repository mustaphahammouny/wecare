<div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
    <h4 class="title fz17 mb30">@lang('Update Password')</h4>
    <p>@lang('Ensure your account is using a long, random password to stay secure.')</p>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form wire:submit="save" class="form-style1">
                <div class="mb15">
                    <x-input wire:model="form.current_password" type="password" placeholder="Current password" />
                </div>

                <div class="mb15">
                    <x-input wire:model="form.password" type="password" placeholder="Password" />
                </div>

                <div class="mb15">
                    <x-input wire:model="form.password_confirmation" type="password"
                        placeholder="Password confirmation" />
                </div>

                <div class="d-flex justify-content-end my20">
                    <x-btn-submit title="Save" position="start" icon="far fa-save" />
                </div>
            </form>
        </div>
    </div>
</div>
