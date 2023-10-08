<section class="footer-style1 at-home4 pt60 pb-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="footer-widget light-style mb-4 mb-lg-5">
                    <a class="footer-logo" href="{{ route('home') }}">
                        <img class="mb40" width="200px" src="{{ Vite::image('logo.png') }}">
                    </a>
                    <div class="contact-info mb25">
                        <p class="text mb5">Address</p>
                        <h6 class="info-phone"><a href="%2b(0)-123-050-945-02.html">329 Queensberry Street, North
                                Melbourne VIC 3051, Australia.</a></h6>
                    </div>
                    <div class="contact-info mb25">
                        <p class="text mb5">Total Free Customer Care</p>
                        <h6 class="info-phone"><a href="%2b(0)-123-050-945-02.html">+(0) 123 050 945 02</a></h6>
                    </div>
                    <div class="contact-info">
                        <p class="text mb5">Nee Live Support?</p>
                        <h6 class="info-mail"><a href="mailto:hi@homez.com">hi@homez.com</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-widget mb-4 mb-lg-5 ps-0 ps-lg-5">
                    <livewire:components.services-links />
                    <div class="link-style1 light-style mb-4">
                        <h6 class="mb20">Discover</h6>
                        <ul class="ps-0">
                            <li><a href="#">Miami</a></li>
                            <li><a href="#">Los Angeles</a></li>
                            <li><a href="#">Chicago</a></li>
                            <li><a href="#">New York</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-widget mb-4 mb-lg-5 ps-0 ps-lg-5">
                    <div class="link-style1 light-style mb-3">
                        <h6 class="mb25">@lang('Quick Links')</h6>
                        <ul class="ps-0">
                            <li><a href="#">@lang('Terms of Use')</a></li>
                            <li><a href="#">@lang('Privacy Policy')</a></li>
                            <li><a href="#">@lang('Pricing Plans')</a></li>
                            <li><a href="#">@lang('Our Services')</a></li>
                            <li><a href="#">@lang('Contact Support')</a></li>
                            <li><a href="#">@lang('Careers')</a></li>
                            <li><a href="#">@lang('FAQs')</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-widget mb-4 mb-lg-5">
                    <div class="mailchimp-widget mb30">
                        <h6 class="title mb30">Keep Yourself Up to Date</h6>
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
                        <a href="#"><i class="fab fa-facebook-f list-inline-item"></i></a>
                        <a href="#"><i class="fab fa-twitter list-inline-item"></i></a>
                        <a href="#"><i class="fab fa-instagram list-inline-item"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in list-inline-item"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<a class="scrollToHome" href="#"><i class="fas fa-angle-up"></i></a>
