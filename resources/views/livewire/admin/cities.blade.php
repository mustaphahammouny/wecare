<div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
    <div class="row">
        <div class="col-12">
            <div class="text-end">
                <x-a route="admin.city" title="Create" position="start" icon="far fa-plus" />
            </div>

            <div class="table-style1 table-responsive">
                <table class="table table-borderless align-middle text-nowrap">
                    <thead>
                        <tr>
                            <th class="fz15 fw500 w-100" scope="col">@lang('Name')</th>
                            <th class="fz15 fw500 text-center" scope="col">@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cities as $city)
                            <tr>
                                <td>
                                    <h6 class="mb-0">{{ $city->name }}</h6>
                                </td>
                                <td class="text-center text-nowrap">
                                    <div class="d-inline-flex">
                                        <x-a route="admin.city" :param="['id' => $city->id]" title="Edit" position="start"
                                            icon="far fa-edit" class="me-2" />
                                        <x-btn-click wire:click="delete({{ $city->id }})" title="Delete"
                                            position="start" icon="far fa-trash" />
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <p>@lang('No cities found')</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div wire:ignore class="col-12">
            {{ $cities->onEachSide(1)->links('components.pagination') }}
        </div>
    </div>
</div>
