<div>
    <section class="home-banner-style4 p0 bgc-white">
        <div class="home-style4 maxw1600 bdrs24 position-relative mx-auto mx20-lg">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="inner-banner-style4 mx-auto">
                            <h2 class="hero-title animate-up-1 text-white">
                                Punctual or
                                <br class="d-none d-md-block">
                                regular cleaning
                            </h2>
                            {{-- <p class="hero-text fz15 animate-up-2">
                            From as low as $10 per day with limited time offer discounts.
                        </p> --}}
                            <div class="animate-up-2 mt-4">
                                <x-a title="Book your session now" route="home" icon="far fa-calendar" />
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
                            <img src="{{ $service->media() }}"
                                class="card-img">
                            <div class="card-img-overlay d-flex flex-column justify-content-center">
                                <div class="text-start ms-2 ">
                                    <h5 class="card-title text-dark fz30 fw700 mb-4">{{ $service->title() }}</h5>
                                    <a class="ud-btn btn-thm py-3 px-4 rounded-pill fs-6" wire:navigate
                                        href="{{ route('home') }}">
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

    <section class="mx-auto maxw1600 bgc-thm-light bdrs24">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto wow fadeInUp" data-wow-delay="300ms"
                    style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                    <div class="main-title text-center">
                        <h2 class="title fz40 fw700">@lang('Easy steps for everyone')</h2>
                        {{-- <p class="paragraph">Aliquam lacinia diam quis lacus euismod</p> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4 wow fadeInLeft" data-wow-delay="00ms"
                    style="visibility: visible; animation-delay: 0ms; animation-name: fadeInLeft;">
                    <div class="iconbox-style3 active text-center">
                        <div class="icon"><img src="{{ Vite::image('home/1.png') }}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h4 class="title">Buy a property</h4>
                            <p class="text">Nullam sollicitudin blandit eros eu pretium. Nullam maximus ultricies
                                auctor.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay="300ms"
                    style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                    <div class="iconbox-style3 active text-center">
                        <div class="icon"><img src="{{ Vite::image('home/2.png') }}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h4 class="title">Sell a property</h4>
                            <p class="text">Nullam sollicitudin blandit eros eu pretium. Nullam maximus ultricies
                                auctor.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay="300ms"
                    style="visibility: visible; animation-delay: 300ms; animation-name: fadeInRight;">
                    <div class="iconbox-style3 active text-center">
                        <div class="icon"><img src="{{ Vite::image('home/3.png') }}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h4 class="title">Rent a property</h4>
                            <p class="text">Nullam sollicitudin blandit eros eu pretium. Nullam maximus ultricies
                                auctor.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="cta-banner4 d-flex align-items-center mx-auto maxw1600 bdrs24" data-stellar-background-ratio="0.1">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 mx-auto wow fadeInUp" data-wow-delay="300ms">
                <div class="cta-style4 position-relative text-center">
                    <h6 class="sub-title fw400 text-white">BUY OR SELL</h6>
                    <h1 class="cta-title mb30 text-white">Looking to Buy a new property or sell an existing one?
                        Realton provides an awesome solution!</h1>
                    <div class="d-block d-sm-flex justify-content-center">
                        <a href="page-dashboard-add-property.html" class="ud-btn btn-thm me-0 me-sm-4">Submit
                            Property<i class="fal fa-arrow-right-long"></i></a>
                        <a href="page-grid-default-v1.html" class="ud-btn btn-white">Browse Properties<i
                                class="fal fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section> --}}

    <section>
        <div class="container">
            <div class="row align-items-md-center wow fadeInUp" data-wow-delay="300ms">
                <div class="col-md-6 col-lg-6">
                    <div class="position-relative mb30-md">
                        <img class="w-100 bdrs24" src="{{ Vite::image('home/why.jpg') }}" alt="">
                        <a href="page-property-single-v1.html">
                            <div class="iconbox-style7 d-flex align-items-center">
                                <span class="icon flaticon-home flex-shrink-0"></span>
                                <div class="iconbox-content flex-shrink-1 ms-2">
                                    <p class="text mb-0">Total Rent</p>
                                    <h4 class="title mb-0">4,382 Unit</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 offset-lg-1 wow fadeInUp" data-wow-delay="500ms">
                    <div class="main-title2">
                        <h2 class="title">@lang('Why Choose Us?')</h2>
                        <p class="paragraph fz15">@lang('We have the best Pros that can help you in any service you want.')</p>
                    </div>
                    <div class="why-chose-list style3">
                        <div class="list-one d-flex align-items-start mb30">
                            <span class="list-icon flex-shrink-0 flaticon-security"></span>
                            <div class="list-content flex-grow-1 ml20">
                                <h6 class="mb-1">Property Management</h6>
                                <p class="text mb-0 fz15">Nullam sollicitudin blandit eros eu pretium. Nullam maximus
                                    ultricies auctor.</p>
                            </div>
                        </div>
                        <div class="list-one d-flex align-items-start mb30">
                            <span class="list-icon flex-shrink-0 flaticon-keywording"></span>
                            <div class="list-content flex-grow-1 ml20">
                                <h6 class="mb-1">Mortgage Services</h6>
                                <p class="text mb-0 fz15">Nullam sollicitudin blandit eros eu pretium. Nullam maximus
                                    ultricies auctor.</p>
                            </div>
                        </div>
                        <div class="list-one d-flex align-items-start">
                            <span class="list-icon flex-shrink-0 flaticon-investment"></span>
                            <div class="list-content flex-grow-1 ml20">
                                <h6 class="mb-1">Currency Services</h6>
                                <p class="text mb-0 fz15">Nullam sollicitudin blandit eros eu pretium. Nullam maximus
                                    ultricies auctor.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="our-testimonial mx-auto maxw1600 bgc-thm-light bdrs24">
        <div class="container">
            <div class="row">
                <div class="col wow fadeInUp" data-wow-delay="100ms">
                    <div class="main-title">
                        <h2 class="title fz40 fw700">@lang('What others say about us')</h2>
                        <p class="paragraph">Aliquam lacinia diam quis lacus euismod</p>
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
                                    <h5 class="title">Great Work</h5>
                                    <span class="icon fas fa-quote-left"></span>
                                    <p class="text">“Amazing design, easy to customize and a design quality
                                        superlative account on its cloud platform for the optimized performance. And
                                        we didn’t on our original designs.”</p>
                                    <div class="testimonial-review">
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </div>
                                </div>
                                <div class="thumb d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img class="wa" src="images/testimonials/testimonial-1.png"
                                            alt="">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0">Leslie Alexander</h6>
                                        <p class="mb-0">Nintendo</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-style1 position-relative">
                                <div class="testimonial-content">
                                    <h5 class="title">Great Work</h5>
                                    <span class="icon fas fa-quote-left"></span>
                                    <p class="text">“Amazing design, easy to customize and a design quality
                                        superlative account on its cloud platform for the optimized performance. And
                                        we didn’t on our original designs.”</p>
                                    <div class="testimonial-review">
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </div>
                                </div>
                                <div class="thumb d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img class="wa" src="images/testimonials/testimonial-2.png"
                                            alt="">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0">Floyd Miles</h6>
                                        <p class="mb-0">Bank of America</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-style1 position-relative">
                                <div class="testimonial-content">
                                    <h5 class="title">Great Work</h5>
                                    <span class="icon fas fa-quote-left"></span>
                                    <p class="text">“Amazing design, easy to customize and a design quality
                                        superlative account on its cloud platform for the optimized performance. And
                                        we didn’t on our original designs.”</p>
                                    <div class="testimonial-review">
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a class="me-1" href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                    </div>
                                </div>
                                <div class="thumb d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img class="wa" src="images/testimonials/testimonial-3.png"
                                            alt="">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0">Dianne Russell</h6>
                                        <p class="mb-0">Facebook</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div id="section-join" class="cta-banner2 bgc-thm maxw1600 d-flex mx-auto bdrs24">
            <div class="img-box-5">
                <img class="img-1 spin-right" src="{{ Vite::image('home/element-1.png') }}">
            </div>
            <div class="img-box-6">
                <img class="img-1 spin-left" src="{{ Vite::image('home/element-1.png') }}">
            </div>
            <div class="container my-auto">
                <div class="row">
                    <div class="col wow fadeInUp" data-wow-delay="500ms">
                        <div class="cta-style2">
                            <h2 class="cta-title fz40 fw700">Start Listing or Buying a Property With Realton</h2>
                            <p class="cta-text">Talk to our experts or Browse through more properties.</p>
                            <a class="ud-btn btn-dark py-3 px-4 rounded-pill fs-6" wire:navigate
                                href="{{ route('home') }}">
                                <i class="far fa-user-circle me-1"></i>
                                Join us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
