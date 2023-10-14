<section class="footer-style1 at-home4 pt60 pb-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="footer-widget light-style mb-4 mb-lg-5">
                    <x-logo class="mb40" />
                    <div class="contact-info mb25">
                        <p class="text mb5">@lang('Address')</p>
                        <h6 class="info-phone">
                            <a href="%2b(0)-123-050-945-02.html">
                                @lang('App 5 Avenue Agdal Rabat, Morocco.')
                            </a>
                        </h6>
                    </div>
                    <div class="contact-info mb25">
                        <p class="text mb5">@lang('Phone')</p>
                        <h6 class="info-phone">
                            <a href="%2b(0)-123-050-945-02.html">
                                +212 123 456 789
                            </a>
                        </h6>
                    </div>
                    <div class="contact-info">
                        <p class="text mb5">@lang('Email')</p>
                        <h6 class="info-mail">
                            <a href="mailto:support@wecare.com">
                                support@wecare.com
                            </a>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-widget mb-4 mb-lg-5 ps-0 ps-lg-5">
                    <livewire:components.services-links />
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-widget mb-4 mb-lg-5 ps-0 ps-lg-5">
                    <div class="link-style1 light-style mb-3">
                        <h6 class="mb25">@lang('Quick Links')</h6>
                        <ul class="ps-0">
                            @foreach (\App\Constants\Menu::STORE_MENU as $menu)
                                <li>
                                    <a wire:navigate href="{{ route($menu['route']) }}">
                                        @lang($menu['title'])
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-widget mb-4 mb-lg-5">
                    <div class="mailchimp-widget mb30">
                        <h6 class="title mb30">@lang('Keep Yourself Up to Date')</h6>
                        <div class="mailchimp-style1 at-home4 white-version">
                            <input type="email" class="form-control" placeholder="Your Email">
                            <button class="btn" type="submit"><span class="flaticon-send"></span></button>
                        </div>
                    </div>
                    <div class="app-widget">
                        <h5 class="title mb10">@lang('Apps')</h5>
                        <div class="row">
                            <div class="col-auto">
                                <a href="#">
                                    <div class="app-info light-style d-flex align-items-center mb10">
                                        <div class="flex-shrink-0">
                                            <i class="fab fa-apple fz30 text-white"></i>
                                        </div>
                                        <div class="flex-grow-1 ml20">
                                            <p class="app-text fz13 mb0">@lang('Download on the')</p>
                                            <h6 class="app-title text-white fz14">@lang('Apple Store')</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="#">
                                    <div class="app-info light-style d-flex align-items-center mb10">
                                        <div class="flex-shrink-0">
                                            <i class="fab fa-google-play fz30 text-white"></i>
                                        </div>
                                        <div class="flex-grow-1 ml20">
                                            <p class="app-text fz13 mb0">@lang('Download on the')</p>
                                            <h6 class="app-title text-white fz14">@lang('Google Play')</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container gray-bdrt1 py-4">
        <div class="row">
            <div class="col-sm-6 my-auto">
                <div class="text-center text-lg-start">
                    <p class="copyright-text ff-heading mb-0">© {{ config('app.name') }} {{ date('Y') }} - @lang('All rights reserved')</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="social-widget text-center text-sm-end">
                    <div class="social-style1 light-style">
                        <a class="me-2 fw600 fz15" href="#">@lang('Follow us')</a>
                        @foreach (\App\Constants\General::SOCIALS as $social)
                            <a href="{{ $social['url'] }}">
                                <i class="fab {{ $social['icon'] }} list-inline-item"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<a class="scrollToHome" href="#"><i class="fas fa-angle-up"></i></a>
