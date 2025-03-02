<div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
    <div class="row">
        <div class="col-12">
            <div class="table-style1 table-responsive">
                <table class="table table-borderless align-middle text-nowrap">
                    <thead>
                        <tr>
                            <th class="fz15 fw500" scope="col">@lang('Full name')</th>
                            <th class="fz15 fw500" scope="col">@lang('Email')</th>
                            <th class="fz15 fw500" scope="col">@lang('Phone')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->clients as $client)
                            <tr>
                                <td><h6 class="mb-0">{{ $client->full_name }}</h6></td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->phone }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <p>@lang('No clients found')</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div wire:ignore class="col-12">
            {{ $this->clients->onEachSide(1)->links('components.pagination') }}
        </div>
    </div>
</div>
