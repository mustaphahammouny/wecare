<div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
    <div class="row">
        <div class="col-12">
            <div class="text-end">
                <x-a route="admin.pricing" title="Create" position="start" icon="far fa-plus" />
            </div>

            <div class="table-style1 table-responsive">
                <table class="table table-borderless align-middle text-nowrap">
                    <thead>
                        <tr>
                            <th class="fz15 fw500 text-center w-25" scope="col">@lang('Min duration')</th>
                            <th class="fz15 fw500 text-center w-25" scope="col">@lang('Max duration')</th>
                            <th class="fz15 fw500 text-center w-25" scope="col">@lang('Price')</th>
                            <th class="fz15 fw500 text-center" scope="col">@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pricings as $pricing)
                            <tr>
                                <td class="text-center">{{ $pricing->min_duration }}@lang('h')</td>
                                <td class="text-center">{{ $pricing->max_duration }}@lang('h')</td>
                                <td class="text-center">{{ $pricing->price }}</td>
                                <td class="text-center text-nowrap">
                                    <div class="d-inline-flex">
                                        <x-a route="admin.pricing" :param="['id' => $pricing->id]" title="Edit" position="start"
                                            icon="far fa-edit" class="me-2" />
                                        <x-btn-click wire:click="delete({{ $pricing->id }})" title="Delete"
                                            position="start" icon="far fa-trash" />
                                    </div>
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
            {{ $pricings->onEachSide(1)->links('components.pagination') }}
        </div>
    </div>
</div>
