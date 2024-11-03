<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="url" content="{{ App::environment('production') ? config('app.url') : config('app.url').':8000' }}">

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
<body class="h-screen px-72 text-white bg-[#181818] overflow-hidden">

<header
    class="w-screen h-16 flex items-center justify-between relative left-1/2 transform -translate-x-1/2 text-white px-80 bg-[#121212]">
    <h1 class="text-4xl font-mono">
        Music<span class="text-[#eab308] font-bold ps-3">X</span>
    </h1>
</header>

<main
    class="my-5">
    @yield('content')
</main>

@stack('js')
</body>
</html>
