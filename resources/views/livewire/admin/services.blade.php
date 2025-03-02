<div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
    <div class="row">
        <div class="col-12">
            <div class="text-end">
                <x-a route="admin.service" title="Create" position="start" icon="far fa-plus" />
            </div>

            <div class="table-style1 table-responsive">
                <table class="table table-borderless align-middle text-nowrap">
                    <thead>
                        <tr>
                            <th class="fz15 fw500" scope="col"></th>
                            <th class="fz15 fw500" scope="col">@lang('Title')</th>
                            <th class="fz15 fw500" scope="col">@lang('Slug')</th>
                            {{-- <th class="fz15 fw500 text-center" scope="col">@lang('Min duration')</th>
                            <th class="fz15 fw500 text-center" scope="col">@lang('Max duration')</th>
                            <th class="fz15 fw500 text-center" scope="col">@lang('Step duration')</th> --}}
                            <th class="fz15 fw500 text-center" scope="col">@lang('Status')</th>
                            <th class="fz15 fw500 text-center" scope="col">@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->services as $service)
                            <tr>
                                <td>
                                    <div style="max-width: 100px">
                                        <img class="img-fluid rounded" src="{{ $service->firstMedia?->getUrl() }}"
                                            alt="Service Image">
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0">{{ $service->title }}</h6>
                                </td>
                                <td>{{ $service->slug }}</td>
                                {{-- <td class="text-center">{{ $service->min_duration }}@lang('h')</td>
                                <td class="text-center">{{ $service->max_duration }}@lang('h')</td>
                                <td class="text-center">{{ $service->step_duration }}@lang('h')</td> --}}
                                <td class="text-center">
                                    <x-is-active :active="$service->active" />
                                </td>
                                <td class="text-center text-nowrap">
                                    <div class="d-inline-flex">
                                        <x-a route="admin.service" :param="['service' => $service->id]" title="Edit" position="start"
                                            icon="far fa-edit" class="me-2" />
                                        <x-btn-click wire:click="delete({{ $service->id }})" title="Delete"
                                            position="start" icon="far fa-trash" />
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <p>@lang('No services found')</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div wire:ignore class="col-12">
            {{ $this->services->onEachSide(1)->links('components.pagination') }}
        </div>
    </div>
</div>
