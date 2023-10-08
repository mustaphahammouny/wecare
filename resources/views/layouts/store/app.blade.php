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
        <!-- Header -->
        @include('layouts.store.partials.header')

        <div class="body_content">
            <!-- Body -->
            {{ $slot }}

            <!-- Footer -->
            @include('layouts.store.partials.footer')
        </div>
    </div>

</x-layout::app>
