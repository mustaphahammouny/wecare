<div>
    <x-breadcumb title="Contact" />

    <div class="container py-5">
        <div class="row wow fadeInRight" data-wow-delay="300">
            <div class="col col-lg-8 mx-auto">
                <div class="text-center mb40">
                    <h2 class="mt25">@lang('Contact us')</h2>
                </div>

                <x-alert-session />

                <form wire:submit="send">
                    <div class="mb25">
                        <x-input wire:model="form.full_name" placeholder="Full name" />
                    </div>
                    <div class="mb25">
                        <x-input wire:model="form.email" type="email" placeholder="Email" />
                    </div>
                    <div class="mb25">
                        <x-input wire:model="form.subject" placeholder="Suject" />
                    </div>
                    <div class="mb15">
                        <x-textarea wire:model="form.message" placeholder="Message" />
                    </div>
                    <div class="d-grid mb20">
                        <x-btn-submit title="Send" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
