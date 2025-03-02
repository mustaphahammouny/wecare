<div>
    <x-breadcumb title="Pricing" />

    <section class="our-pricing py40">
        <div class="container">
            <div wire:ignore class="row wow fadeInUp" data-wow-delay="100ms">
                <div class="col-lg-6 offset-lg-3">
                    <div class="main-title text-center mb30">
                        <h2>@lang('Our pricings')</h2>
                        <p>@lang('Discover the perfect plan tailored to your needs.')</p>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 wow fadeInUp justify-content-center"
                data-wow-delay="300ms">
                @foreach ($this->services as $service)
                    <div class="col">
                        <div class="pricing_packages">
                            <div class="heading mb30">
                                <h1 class="text-center">{{ $service->title }}</h1>
                                <h4 class="package_title py-2">
                                    @lang('from') {{ $service->minDuration->min }}
                                    @lang('to') {{ $service->maxDuration->max }} @lang('hours')
                                </h4>
                                <p class="text mb-0">
                                    @lang('Cost')
                                </p>
                                <h4 class="text1">
                                    {{ $this->price($service) }}
                                </h4>
                                <p class="text">@lang('Per hour')</p>
                                <img class="price-icon" src="images/icon/pricing-icon-1.svg" alt="">
                            </div>
                            <div class="details">
                                <div class="d-grid">
                                    <a wire:navigate href="{{ route('booking', ['slug' => $service->slug]) }}"
                                        class="ud-btn btn-thm-border text-thm">
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
    </section>
</div>
