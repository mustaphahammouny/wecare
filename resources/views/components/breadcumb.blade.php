@props(['title'])

<section class="breadcumb-section py-5" style="background-color: rgba(235, 103, 83, 0.07)">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcumb-style1">
                    <h2 class="title">@lang($title)</h2>
                    <div class="breadcumb-list">
                        <a wire:navigate href="{{ route('home') }}">@lang('Home')</a>
                        <a href="javascript:void(0);">@lang($title)</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
