<div>
    <x-breadcumb title="Pricing" />

    <section class="our-pricing py40">
        <div class="container">
            <div wire:ignore class="row wow fadeInUp" data-wow-delay="100ms">
                <div class="col-lg-6 offset-lg-3">
                    <div class="main-title text-center mb30">
                        <h2>Membership Plans</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur.</p>
                    </div>
                </div>
            </div>
            <div class="row wow fadeInUp" data-wow-delay="300ms">
                @foreach ($pricings as $pricing)
                    <div class="col-md-6">
                        <div class="pricing_packages @if ($pricing->plan == \App\Enums\PlanList::Regular) active @endif">
                            <div class="heading mb30">
                                <h4 class="package_title py-2">{{ $pricing->plan->title() }}</h4>
                                <p class="text mb-0">@lang('Starting from')</p>
                                <h1 class="text1">{{ $pricing->formatted_price }}</h1>
                                <p class="text">@lang('Per hour')</p>
                                <img class="price-icon" src="images/icon/pricing-icon-1.svg" alt="">
                            </div>
                            <div wire:ignore class="details">
                                <div class="list-style1 mb40">
                                    <ul>
                                        @foreach ($pricing->plan->benefits() as $benefit)
                                            <li>
                                                <i class="far {{ $benefit['icon'] }} text-white fz20"></i>
                                                <span>@lang($benefit['title'])</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
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
