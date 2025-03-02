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

    <div class="wrapper ovh bg-auth">
        <div class="body_content">
            <section class="our-compare pt60 pb60">
                <div class="container">
                    <div class="row wow fadeInRight" data-wow-delay="300">
                        <div class="col-lg-6 mx-auto">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</x-layout::app>
