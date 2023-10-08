<div class="dashboard_navigationbar d-block d-lg-none">
    <div class="dropdown">
        <button class="dropbtn text-start">
            <i class="fa fa-bars me-3"></i>
            {{ Auth::user()->full_name }}
        </button>
        <ul id="myDropdown" class="dropdown-content">
            @foreach (\App\Constants\Menu::CLIENT_MENU as $menu)
                <li class="{{ request()->routeIs($menu['route']) ? 'active' : '' }}">
                    <a wire:navigate href="{{ route($menu['route']) }}">
                        <i class="{{ $menu['icon'] }} me-3"></i>
                        @lang($menu['title'])
                    </a>
                </li>
            @endforeach

            <li>
                <livewire:components.logout />
            </li>
        </ul>
    </div>
</div>
