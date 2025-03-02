<div class="link-style1 light-style mb30">
    <h6 class="mb25">@lang('Services')</h6>
    <div class="link-list">
        @foreach ($this->services as $service)
            <a href="{{ route('booking', $service->slug) }}" wire:navigate>@lang($service->title)</a>
        @endforeach
    </div>
</div>
