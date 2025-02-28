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

    <div class="wrapper ovh">
        <header class="header-nav nav-innerpage-style menu-home4 main-menu">
            <!-- Ace Responsive Menu -->
            <nav class="posr">
                <div class="container posr menu_bdrt1">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <x-logo />
                        </div>
                        <div class="col-auto">
                            <div class="d-flex align-items-center">
                                <livewire:components.btn-auth />
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div id="page" class="mobilie_header_nav stylehome1">
            <div class="mobile-menu">
                <div class="header innerpage-style">
                    <div class="menu_and_widgets pt-1">
                        <div class="mobile_menu_bar d-flex justify-content-between align-items-center">
                            <x-logo width="130" />

                            <livewire:components.btn-auth />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="body_content">
            {{ $slot }}
        </div>
    </div>

</x-layout::app>
