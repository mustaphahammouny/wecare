<div class="dashboard__sidebar d-none d-lg-block">
    <div class="dashboard_sidebar_list">
        @foreach (\App\Constants\Menu::CLIENT_MENU as $menu)
            {{-- <p class="fz15 fw400 ff-heading mt30">{{ __($menu['heading']) }}</p> --}}
            <div class="sidebar_list_item">
                <a wire:navigate href="{{ route($menu['route']) }}"
                    class="items-center mb-2 {{ request()->routeIs($menu['route']) ? '-is-active' : '' }}">
                    <i class="{{ $menu['icon'] }} me-3"></i>
                    {{ __($menu['title']) }}
                </a>
            </div>
        @endforeach

        <div class="sidebar_list_item fixed-bottom mx30">
            <livewire:components.logout classes="items-center" />
        </div>
    </div>
</div>
