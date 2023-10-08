<div class="link-style1 light-style mb30">
    <h6 class="mb25">@lang('Services')</h6>
    <div class="link-list">
        @foreach ($services as $service)
            <a href="#">{{ $service->title() }}</a>
        @endforeach
    </div>
</div>
