<footer class="dashboard_footer py-4">
    <div class="container">
        <div class="row align-items-center justify-content-center justify-content-md-between">
            <div class="col-auto">
                <div class="copyright-widget">
                    <p class="text mb-0">© {{ config('app.name') }} {{ date('Y') }} - @lang('All rights reserved.')</p>
                </div>
            </div>
            <div class="col-auto">
                <div class="footer_bottom_right_widgets">
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
    </div>
</footer>
