<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@lang('Invoice')</title>
    <style>
        @page {
            margin: 40px 30px;
        }

        body {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
        }

        footer {
            position: fixed;
            bottom: -10px;
            left: 0px;
            right: 0px;
            padding: 20px 0;
            text-align: center;
            /* border-radius: 8px; */
        }

        .fw-bold {
            font-weight: 700 !important;
        }

        .mt-4 {
            margin-top: 1.5rem !important;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .mb-0 {
            margin-bottom: 0 !important;
        }

        .w-50 {
            width: 50%;
        }

        .w-100 {
            width: 100%;
        }

        .bg-dark {
            background-color: #000000;
            color: #fff;
        }

        .text-center {
            text-align: center !important;
        }

        .text-end {
            text-align: right !important;
        }

        .text-muted {
            color: #6c757d
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            text-align: left;
            padding: 20px;
        }

        /* .table-invoice thead th:first-child {
            border-radius: 8px 0 0 8px;
        }

        .table-invoice thead th:last-child {
            border-radius: 0 8px 8px 0;
        } */

        .table-total {
            /* width: 50% !important; */
            /* margin-left: auto; */
        }

        .table-bordered tbody tr {
            border-bottom: 1px solid #dee2e6;
        }

        .table-total th,
        .table-total td {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .table-header th,
        .table-header td {
            padding-bottom: 20px;
        }

        .table-py-0 th,
        .table-py-0 td {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }
    </style>
</head>

<body>
    <footer>
        <strong>@lang('Email'):</strong> {{ \App\Constants\General::INFO['email'] }}
        <strong>@lang('Phone'):</strong> {{ \App\Constants\General::INFO['phone'] }}
        <br />
        <strong>@lang('Address'):</strong> {{ \App\Constants\General::INFO['address'] }}
    </footer>

    <main>
        <div>
            <table class="table table-header table-bordered">
                <tbody>
                    <tr>
                        <td>
                            <img width="150" src={{ resource_path('images/logo.png') }} />
                        </td>
                        <td class="text-end">
                            <span class="fw-bold ">@lang('Invoice') :</span>
                            <span class="text-muted">{{ $booking->number }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <table class="table table-py-0">
                <tbody>
                    <tr>
                        <td class="w-50 fw-bold">@lang('Billed from') :</td>
                        <td class="w-50 fw-bold">@lang('Billed to') :</td>
                    </tr>
                    <tr>
                        <td>{{ \App\Constants\General::INFO['name'] }}</td>
                        <td>{{ $booking->user->company->name ?? $booking->user->full_name }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">{{ \App\Constants\General::INFO['address'] }}</td>
                        <td class="text-muted">{{ $booking->address }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <table class="table table-py-0">
                <tbody>
                    <tr>
                        <td>
                            <span class="fw-bold">@lang('Billed date') :</span>
                            <span>{{ $booking->service_at }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <table class="table table-invoice table-bordered">
                <thead class="bg-dark">
                    <tr>
                        <th>@lang('Service')</th>
                        <th>@lang('Unity')</th>
                        <th>@lang('Price')</th>
                        <th class="text-center">@lang('Quantity')</th>
                        <th class="text-end">@lang('Total')</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $booking->service->title }}</td>
                        <td>@lang('Hour')</td>
                        <td>{{ \App\Support\Number::format($booking->hourly_price * (1 - \App\Constants\General::TAX)) }}
                        </td>
                        <td class="text-center">{{ $booking->duration }}</td>
                        <td class="text-end">
                            {{ \App\Support\Number::format($booking->hourly_price * (1 - \App\Constants\General::TAX) * $booking->duration) }}
                        </td>
                    </tr>
                    @foreach ($booking->extras as $extra)
                        <tr>
                            <td>{{ $extra->title }}</td>
                            <td>@lang('Unity')</td>
                            <td>{{ \App\Support\Number::format($extra->price * (1 - \App\Constants\General::TAX)) }}
                            </td>
                            <td class="text-center">1</td>
                            <td class="text-end">
                                {{ \App\Support\Number::format($extra->price * (1 - \App\Constants\General::TAX)) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <table class="table table-total">
                <tbody>
                    <tr>
                        <td class="w-100 text-end">@lang('Total excluding tax') :</td>
                        <td class="text-end">
                            {{ \App\Support\Number::toPrice($booking->total * (1 - \App\Constants\General::TAX)) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="w-100 text-end">@lang('Tax') ({{ \App\Constants\General::TAX * 100 }}%) :</td>
                        <td class="text-end">
                            {{ \App\Support\Number::toPrice($booking->total * \App\Constants\General::TAX) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="w-100 text-end">@lang('Total including tax') :</td>
                        <td class="text-end">{{ \App\Support\Number::toPrice($booking->total) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
