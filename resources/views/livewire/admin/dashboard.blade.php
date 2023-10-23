<div class="row row-cols-1 row-cols-sm-2 row-cols-xxl-4">
    @foreach ($counts['general'] as $item)
        <div class="col">
            <div class="d-flex justify-content-between statistics_funfact">
                <div class="details">
                    <div class="text fz20">@lang($item['title'])</div>
                    <div class="title">{{ $item['count'] }}</div>
                    <a wire:navigate href="{{ route($item['route']) }}">
                        @lang('See details')
                        <i class="far fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="icon text-center"><i class="{{ $item['icon'] }}"></i></div>
            </div>
        </div>
    @endforeach

    @foreach ($counts['bookings'] as $item)
        <div class="col">
            <div
                class="d-flex justify-content-between statistics_funfact bg-opacity-50 {{ $item['status']->background() }}">
                <div class="details">
                    <div class="text fz20">@lang($item['status']->title())</div>
                    <div class="text fz15">@lang('Bookings')</div>
                    <div class="title">{{ $item['count'] }}</div>
                    <a wire:navigate href="{{ route('admin.bookings') }}">
                        @lang('See details')
                        <i class="far fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="icon text-center"><i class="far fa-calendar-days"></i></div>
            </div>
        </div>
    @endforeach
</div>
