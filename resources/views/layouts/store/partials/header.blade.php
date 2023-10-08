<header class="header-nav nav-innerpage-style menu-home4 main-menu">
    <nav class="posr">
        <div class="container posr menu_bdrt1">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <x-logo />
                </div>
                <div class="col-auto">
                    <x-nav-menu></x-nav-menu>
                </div>
                <div class="col-auto">
                    <div class="d-flex align-items-center">
                        <x-locale />
                        @if (Auth::check())
                            <x-a :title="Auth::user()->full_name" route="client.services" icon="far fa-user-circle" />
                        @else
                            <x-a title="Sign in" route="auth.login" icon="far fa-user-circle" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<x-mobile-menu></x-mobile-menu>
