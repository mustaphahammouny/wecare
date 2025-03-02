<div>
    <div class="row wow fadeInUp row-cols-1 row-cols-lg-2 row-cols-xl-3 justify-content-center" data-wow-delay="300ms">
        @foreach ($this->services as $service)
            <div class="col mb-4">
                <div class="card h-100 border-0 bdrs24" style="overflow: hidden;">
                    <img src="{{ $service->firstMedia?->getUrl() }}" class="card-img" height="100%">
                    <div class="card-img-overlay d-flex flex-column justify-content-center">
                        <div class="text-start">
                            <h5 class="card-title text-dark text-nowrap fz30 fw700 mb-4">@lang($service->title)</h5>
                            <a class="ud-btn btn-thm px-4 rounded-pill fs-6" wire:navigate
                                href="{{ route('booking', $service->slug) }}">
                                <i class="far fa-calendar me-1"></i>
                                @lang('Book now')
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
