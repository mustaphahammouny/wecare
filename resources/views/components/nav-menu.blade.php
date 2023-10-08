<ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
    @foreach (\App\Constants\Menu::STORE_MENU as $menu)
        <li class="visible_list">
            <a class="list-item {{ request()->routeIs($menu['route']) ? 'is-active' : '' }}" wire:navigate href="{{ route($menu['route']) }}">
                <span class="title">{{ __($menu['title']) }}</span>
            </a>
        </li>
    @endforeach
</ul>
