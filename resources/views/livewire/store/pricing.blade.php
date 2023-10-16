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
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 wow fadeInUp" data-wow-delay="300ms">
                @foreach ($pricings as $pricing)
                    <div class="col">
                        <div class="pricing_packages">
                            <div class="heading mb30">
                                <h4 class="package_title py-2">
                                    @lang('from') {{ $pricing->min_duration }}
                                    @lang('to') {{ $pricing->max_duration }} @lang('hours')
                                </h4>
                                <p class="text mb-0">
                                    @lang('Cost')
                                </p>
                                <h1 class="text1">{{ $pricing->formatted_price }}</h1>
                                <p class="text">@lang('Per hour')</p>
                                <img class="price-icon" src="images/icon/pricing-icon-1.svg" alt="">
                            </div>
                            <div class="details">
                                <div class="d-grid">
                                    <a wire:navigate href="{{ route('auth.login') }}"
                                        class="ud-btn btn-thm-border text-thm">
                                        @lang('Sign in now')
                                        <i class="fal fa-arrow-right-long ms-1"></i>
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
