<div id="page" class="mobilie_header_nav stylehome1">
    <div class="mobile-menu">
        <div class="header innerpage-style">
            <div class="menu_and_widgets">
                <div class="mobile_menu_bar d-flex justify-content-between align-items-center">
                    <a class="menubar" href="#menu">
                        <img src="{{ Vite::image('mobile-dark-nav-icon.svg') }}">
                    </a>

                    <x-logo width="130" />

                    @if (Auth::check())
                        <a wire:navigate href='{{ route('client.services') }}'>
                            <span class="icon fz18 far fa-user-circle"></span>
                            <span>{{ Auth::user()->full_name }}</span>
                        </a>
                    @else
                        <a wire:navigate href='{{ route('auth.login') }}'>
                            <span class="icon fz18 far fa-user-circle"></span>
                            <span>@lang('Sign in')</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /.mobile-menu -->
    <nav id="menu" class="">
        <ul>
            @foreach (\App\Constants\Menu::STORE_MENU as $menu)
                <li>
                    <a wire:navigate href="{{ route($menu['route']) }}">
                        @lang($menu['title'])
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</div>
