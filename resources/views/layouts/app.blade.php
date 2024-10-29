<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="robots" content="index, follow"/>
    <meta name="theme-color" content="#30d557"/>
    <meta name="description"
          content="Tune into a world of sound crafted just for you."/>

    {{--  Open Graph Meta (OG)  --}}
    <meta property="og:image"
          content="{{ asset('assets/og-card.png') }}"/>
    <meta property="og:description"
          content="Tune into a world of sound crafted just for you."/>
    <meta property="og:url" content="{{ config('app.url') }}"/>
    <meta property="og:site_name" content="Music X"/>

    {{--  Icons  --}}
    {{--    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('src/ico/apple-touch-icon.png') }}">--}}
    {{--    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('src/ico/favicon-32x32.png') }}">--}}
    {{--    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('src/ico/favicon-16x16.png') }}">--}}

    <title>{{ config('app.name') }} - Tune into a world of sound crafted just for you.</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body @if(Route::is('welcome')) class="gradient h-screen overflow-hidden" @endif>

    @yield('content')

</body>
</html>
