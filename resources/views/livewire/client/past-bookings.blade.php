<div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
    <div class="row">
        <div class="col-12">
            <div class="table-style1 table-responsive">
                <table class="table table-borderless align-middle">
                    <thead class="table-orange ">
                        <tr>
                            <th class="fz15 fw500" scope="col">@lang('Service')</th>
                            <th class="fz15 fw500 text-center" scope="col">@lang('Plan')</th>
                            <th class="fz15 fw500 text-center" scope="col">@lang('Price')</th>
                            <th class="fz15 fw500 text-center" scope="col">@lang('Duration')</th>
                            <th class="fz15 fw500 text-center" scope="col">@lang('Total')</th>
                            <th class="fz15 fw500 text-center" scope="col">@lang('Status')</th>
                            <th class="fz15 fw500 text-center" scope="col">@lang('Invoice')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                            <tr>
                                <td>
                                    <h6 class="mb-0">{{ $booking->service->title }}</h6>
                                    @foreach ($booking->extras as $exta)
                                        <span>{{ __($exta->title) }}</span>
                                        <span class="text-muted">({{ $exta->pivot->formatted_exta_price }})</span>
                                    @endforeach
                                </td>
                                <td class="text-center">{{ $booking->plan->title() }}</td>
                                <td class="text-center">{{ $booking->formatted_service_price }}</td>
                                <td class="text-center">{{ $booking->duration }}{{ __('h') }}</td>
                                <td class="text-center">{{ $booking->formatted_total }}</td>
                                <td class="text-center">
                                    <span class="{{ $booking->status->badge() }}">{{ $booking->status->title() }}</span>
                                </td>
                                <td class="text-center">
                                    @if ($booking->invoice)
                                        <x-btn-click wire:click="download({{ $booking->id }})" title="Download" position="start"
                                            icon="far fa-download" />
                                    @else
                                        <x-btn-click wire:click="download({{ $booking->id }})" title="Generate" position="start"
                                            icon="far fa-file-invoice" />
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <p>@lang('No bookings found')</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div wire:ignore class="col-12">
            {{ $bookings->onEachSide(1)->links('components.pagination') }}
        </div>
    </div>
</div>