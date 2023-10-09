<x-layout::app>

    <x-slot name="title">
        @lang($title)
    </x-slot>

    <x-slot name="styles">
        {{ $styles ?? '' }}
    </x-slot>

    <x-slot name="scripts">
        {{ $scripts ?? '' }}
    </x-slot>

    <div class="wrapper">
        <!-- Header -->
        @include('layouts.client.partials.header')

        <div class="dashboard_content_wrapper">
            <div class="dashboard dashboard_wrapper mx20">
                <!-- SideBar -->
                @include('layouts.client.partials.sidebar')

                <div class="dashboard__main px0-md">
                    <div class="dashboard__content bgc-f7">
                        <div class="row pb40">
                            <div class="col-lg-12">
                                <!-- Mobile SideBar -->
                                @include('layouts.client.partials.mobile-sidebar')
                            </div>
                            <div class="col-lg-12">
                                <div class="dashboard_title_area">
                                    <h2>{{ $title }}</h2>
                                </div>
                            </div>
                        </div>

                        <x-alert-session />

                        <!-- Body -->
                        {{ $slot }}
                    </div>
                    <!-- Footer -->
                    @include('layouts.client.partials.footer')
                </div>
            </div>
        </div>

        <a class="scrollToHome" href="#"><i class="fas fa-angle-up"></i></a>
    </div>

</x-layout::app>
