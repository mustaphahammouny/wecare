<div>
    <div class="container-lg mt20">
        <div class="row">
            <div class="col-md-7">
                <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p10 mb30 overflow-hidden position-relative">
                    <x-alert-session />

                    <livewire:dynamic-component :component="$current" :state="$state" :key="$current" />
                </div>
            </div>
            <div class="col d-none d-md-block">
                <livewire:components.basket :state="$state" :key="$current" />
            </div>
        </div>
    </div>

    <div class="container-fluid d-block d-md-none fixed-bottom mb30">
        <div class="btn-group dropup w-100">
            <button type="button" class="ud-btn btn-thm dropdown-toggle w-100" data-bs-toggle="dropdown"
                aria-expanded="false">
                @lang('Booking details')
            </button>
            <ul class="dropdown-menu w-100">
                <livewire:components.basket :state="$state" :key="$current" />
            </ul>
        </div>
    </div>
</div>
