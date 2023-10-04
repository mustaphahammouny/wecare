<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }} - {{ config('app.name') }}</title>

    @vite(['resources/scss/app.ltr.scss'])

    @vite(['resources/js/app.js'])

    {{ $styles ?? '' }}

    @livewireStyles
</head>

<body>
    {{ $slot }}

    <a class="mm-wrapper__blocker mm-blocker mm-slideout" id="mm-0" aria-label="Close menu" href="#mm-2"></a>

    {{ $scripts ?? '' }}

    @livewireScripts
</body>

</html>
