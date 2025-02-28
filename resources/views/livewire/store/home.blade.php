<div>
    <section class="home-banner-style4 p0 bgc-white">
        <div class="home-style4 maxw1600 bdrs24 position-relative mx-auto mx20-lg">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="inner-banner-style4 mx-auto">
                            <h2 class="hero-title animate-up-1 text-white">
                                @lang('Need care?')
                                <br class="d-none d-md-block">
                                @lang('WeCare is here!')
                            </h2>
                            <div class="animate-up-2 mt-4">
                                <x-a title="Sign in now" route="auth.login" icon="far fa-user-circle" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px40">
        <div class="container">
            <div class="row">
                <div class="col m-auto wow fadeInUp" data-wow-delay="100ms">
                    <div class="main-title text-center">
                        <h2 class="title fz40 fw700">@lang('Discover our best services')</h2>
                        {{-- <p class="paragraph">Aliquam lacinia diam quis lacus euismod</p> --}}
                    </div>
                </div>
            </div>
            <div class="row wow fadeInUp row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center"
                data-wow-delay="300ms">
                @foreach ($services as $service)
                    <div class="col mb-4">
                        <div class="card h-100 border-0 bdrs24" style="overflow: hidden;">
                            <img src="{{ $service->getFirstMediaUrl() }}" class="card-img">
                            <div class="card-img-overlay d-flex flex-column justify-content-center">
                                <div class="text-start ms-2 ">
                                    <h5 class="card-title text-dark fz30 fw700 mb-4">@lang($service->title)</h5>
                                    <a class="ud-btn btn-thm py-3 px-4 rounded-pill fs-6" wire:navigate
                                        href="{{ route('booking', ['slug' => $service->slug]) }}">
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

    <section class="our-testimonial mx-auto maxw1600 bgc-thm-light bdrs24">
        <div class="container">
            <div class="row">
                <div class="col wow fadeInUp" data-wow-delay="100ms">
                    <div class="main-title">
                        <h2 class="title fz40 fw700">@lang('What others say about us')</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-slider navi_pagi_top_right slider-3-grid owl-carousel owl-theme wow fadeInUp"
                        data-wow-delay="300ms">
                        <div class="item">
                            <div class="testimonial-style1 position-relative">
                                <div class="testimonial-content">
                                    <h5 class="title">@lang('Booked Cooking Service')</h5>
                                    <span class="icon fas fa-quote-left"></span>
                                    <p class="text">“@lang('I signed up for a cooking class through this app, and it
                                                                            exceeded my expectations. The instructor was not only a skilled chef but also an
                                                                            excellent teacher. I learned valuable cooking techniques and tried delicious
                                                                            recipes. The app made it easy to connect with the instructor and access class
                                                                            materials. I can\'t wait to take more classes!')”</p>
                                    <div class="testimonial-review">
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </div>
                                </div>
                                <div class="thumb d-flex align-items-center">
                                    <div class="ms-3">
                                        <h6 class="mb-0">@lang('Kamal')</h6>
                                        <p class="mb-0">@lang('Rabat')</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-style1 position-relative">
                                <div class="testimonial-content">
                                    <h5 class="title">@lang('Booked Coaching Service')</h5>
                                    <span class="icon fas fa-quote-left"></span>
                                    <p class="text">“@lang('I had an incredible experience with the coaching service on this
                                                                            app. The coach was not only knowledgeable but also a great motivator. Their
                                                                            guidance and support were instrumental in helping me achieve my goals. I highly
                                                                            recommend this service to anyone looking for personal growth and development.')”
                                    </p>
                                    <div class="testimonial-review">
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </div>
                                </div>
                                <div class="thumb d-flex align-items-center">
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0">@lang('Youssra')</h6>
                                        <p class="mb-0">@lang('Casablance')</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-style1 position-relative">
                                <div class="testimonial-content">
                                    <h5 class="title">@lang('Booked Cleaning Service')</h5>
                                    <span class="icon fas fa-quote-left"></span>
                                    <p class="text">“@lang('I recently booked a cleaning service through this app, and I
                                                                            couldn\'t be happier with the results. The cleaner was punctual, professional,
                                                                            and left my home spotless. It was so convenient to schedule the service through
                                                                            the app, and the whole process was seamless. I\'ll definitely be using this
                                                                            service again for regular cleanings.')”</p>
                                    <div class="testimonial-review">
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </div>
                                </div>
                                <div class="thumb d-flex align-items-center">
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0">@lang('Hossam')</h6>
                                        <p class="mb-0">@lang('Temara')</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
