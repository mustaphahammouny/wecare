<div class="ps-widget bgc-white bdrs12 default-box-shadow2 p10 mb30 overflow-hidden position-relative">
    <h4 class="title fz17 my-4 text-center">@lang('Your basket')</h4>
    @isset($state['phone'])
        <div class="row">
            <div class="col-md-12">
                <x-walkscore icon="flaticon-call">
                    <p class="dark-color fw600 mb-0">{{ $state['phone'] }}</p>
                </x-walkscore>
            </div>
            <div class="col-md-12">
                <x-walkscore icon="flaticon-location">
                    <p class="dark-color fw600 mb-0">{{ $state['address'] }}</p>
                </x-walkscore>
            </div>

            @isset($state['duration'])
                <div class="col-md-12">
                    <x-walkscore icon="far fa-cart-shopping" :end="$state['duration']['hourly_price']">
                        <p class="dark-color fw600 mb-0">
                            <span>{{ $state['service']['title'] }}</span>
                        </p>
                        <p class="text mb-0">
                            @isset($state['frenquecy'])
                                {{ \App\Enums\FrequencyList::from($state['frenquecy'])->title() }}
                            @else
                                {{ \App\Enums\PlanList::from($state['plan'])->title() }}
                            @endisset
                        </p>
                    </x-walkscore>

                    <div class="ms-4">
                        @foreach ($state['extras'] as $extra)
                            <x-pd-list :title="$extra['title']" :end="$extra['formatted_price']" />
                        @endforeach

                        <x-pd-list title="Duration" :end="$state['duration']['duration'] . '' . __('h')" />
                        <div class="pt10 bdrt1">
                            <x-pd-list title="Total" :end="$total" />
                        </div>
                    </div>
                </div>
            @endisset
        </div>
    @else
        <x-empty-basket />
    @endisset
</div>
