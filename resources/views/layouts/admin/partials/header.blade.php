<header class="header-nav nav-innerpage-style menu-home4 dashboard_header main-menu">
    <nav class="posr">
        <div class="container-fluid pr30 pr15-xs pl30 posr menu_bdrt1">
            <div class="row align-items-center justify-content-between">
                <div class="col-6 col-lg-auto">
                    <div class="text-center text-lg-start d-flex align-items-center">
                        <div class="dashboard_header_logo position-relative me-2 me-xl-5">
                            <x-logo width="160" />
                        </div>
                        <div class="fz20 ms-2 ms-xl-5">
                            <a href="javascript:void(0)" class="dashboard_sidebar_toggle_icon text-thm1 vam">
                                <img src="{{ Vite::image('dark-nav-icon.svg') }}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-auto">
                    <div class="text-center text-lg-end">
                        <ul class="mb0 d-flex align-items-center justify-content-center justify-content-sm-end p-0">
                            <li class="dropdown-locale">
                                <x-locale />
                            </li>
                            <li class="user_setting">
                                <div class="dropdown">
                                    <button class="ud-btn btn-thm text-white rounded-pill fs-6" href="#"
                                        data-bs-toggle="dropdown">
                                        <i class="far fa-user-circle me-1"></i>
                                        {{ Auth::user()->full_name }}
                                        <i class="far fa-angle-down ms-1"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <div class="user_setting_content">
                                            @foreach (\App\Constants\Menu::ADMIN_MENU as $menu)
                                                <a wire:navigate href="{{ route($menu['route']) }}"
                                                    class="dropdown-item mb-2 {{ request()->routeIs($menu['route']) ? '-is-active' : '' }}">
                                                    <i class="{{ $menu['icon'] }} me-3"></i>
                                                    @lang($menu['title'])
                                                </a>
                                            @endforeach

                                            <livewire:components.logout classes="dropdown-item" />
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
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

                    @if (Auth::check())
                        <x-a :title="Auth::user()->full_name" :route="Auth::user()->role->route()" icon="far fa-user-circle" />
                    @else
                        <x-a title="Sign in" route="auth.login" icon="far fa-user-circle" />
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

