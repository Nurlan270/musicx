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
    class="w-screen h-16 flex items-center justify-between relative left-1/2 transform -translate-x-1/2 text-white px-80">
    <h1 class="text-4xl font-sans">
        Music<span class="text-[#eab308] font-bold ps-3">X</span>
    </h1>

    <div class="flex flex-row items-center justify-center gap-x-4">
        <button id="labs-btn"
                class="relative flex items-center justify-center p-2.5 border border-[#eab308] rounded-xl overflow-hidden transition-all duration-300 group hover:ps-16">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                 class="size-5 text-[#eab308]">
                <path fill-rule="evenodd"
                      d="M10.5 3.798v5.02a3 3 0 0 1-.879 2.121l-2.377 2.377a9.845 9.845 0 0 1 5.091 1.013 8.315 8.315 0 0 0 5.713.636l.285-.071-3.954-3.955a3 3 0 0 1-.879-2.121v-5.02a23.614 23.614 0 0 0-3 0Zm4.5.138a.75.75 0 0 0 .093-1.495A24.837 24.837 0 0 0 12 2.25a25.048 25.048 0 0 0-3.093.191A.75.75 0 0 0 9 3.936v4.882a1.5 1.5 0 0 1-.44 1.06l-6.293 6.294c-1.62 1.621-.903 4.475 1.471 4.88 2.686.46 5.447.698 8.262.698 2.816 0 5.576-.239 8.262-.697 2.373-.406 3.092-3.26 1.47-4.881L15.44 9.879A1.5 1.5 0 0 1 15 8.818V3.936Z"
                      clip-rule="evenodd"/>
            </svg>
            <span
                class="absolute whitespace-nowrap transition-all duration-500 ps-2 opacity-0 font-medium text-[#eab308] group-hover:-translate-x-12 group-hover:opacity-100">Labs</span>
        </button>

        <select id="genre" name="genre" title="Music genre"
                class="bg-transparent text-[#eab308] border border-[#eab308] rounded-xl p-2 w-40 text-center cursor-pointer transition-colors hover:bg-[#2e2e2e] appearance-none font-bold">
            <option value="none" class="bg-[#181818] text-[#eab308]" selected disabled>Choose music genre</option>
            @foreach($genres as $genre)
                <option value="{{ $genre->name }}" class="bg-[#181818] text-[#eab308]">{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>
</header>

<!-- Labs Modal -->
<div id="labs-modal"
     class="fixed inset-0 z-10 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm hidden">
    <div class="absolute inset-0" id="overlay"></div>

    <!-- Modal content -->
    <div class="relative bg-[#424242] rounded-lg w-1/3 p-6 z-10 border border-[#eab308]">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                     class="size-5 text-[#eab308]">
                    <path fill-rule="evenodd"
                          d="M10.5 3.798v5.02a3 3 0 0 1-.879 2.121l-2.377 2.377a9.845 9.845 0 0 1 5.091 1.013 8.315 8.315 0 0 0 5.713.636l.285-.071-3.954-3.955a3 3 0 0 1-.879-2.121v-5.02a23.614 23.614 0 0 0-3 0Zm4.5.138a.75.75 0 0 0 .093-1.495A24.837 24.837 0 0 0 12 2.25a25.048 25.048 0 0 0-3.093.191A.75.75 0 0 0 9 3.936v4.882a1.5 1.5 0 0 1-.44 1.06l-6.293 6.294c-1.62 1.621-.903 4.475 1.471 4.88 2.686.46 5.447.698 8.262.698 2.816 0 5.576-.239 8.262-.697 2.373-.406 3.092-3.26 1.47-4.881L15.44 9.879A1.5 1.5 0 0 1 15 8.818V3.936Z"
                          clip-rule="evenodd"/>
                </svg>
                <span class="font-bold text-xl text-white">Welcome to Labs!</span>
            </div>

            <button id="closeModal" class="text-white p-1.5 rounded-lg transition-colors hover:bg-[#6e6d6d]">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M10 8.586L4.707 3.293a1 1 0 10-1.414 1.414L8.586 10l-5.293 5.293a1 1 0 001.414 1.414L10 11.414l5.293 5.293a1 1 0 001.414-1.414L11.414 10l5.293-5.293a1 1 0 00-1.414-1.414L10 8.586z"
                          clip-rule="evenodd"/>
                </svg>
            </button>
        </div>

        <div class="mt-9 text-white font-medium">
            <p>Here, you can share your music, songs, or even gifs with us. If you have a tune or a gif you'd like to
                see on our website, simply send it over! With your permission, we'll proudly feature it.</p>
            <br>
            <p>We’re also open to ideas for making our site even better, so feel free to reach out with suggestions.</p>
            <br>
            <p>Email us at <span class="font-medium hover:underline text-[#eab308] cursor-pointer px-1"><a
                        target="_blank"
                        href="mailto:feedback@nurlan.dev">feedback@nurlan.dev</a></span> or click the button below to
                get in touch.</p>
        </div>

        <div class="flex items-center justify-center mt-7">
            <a target="_blank" href="mailto:feedback@nurlan.dev"
               class="border px-9 py-2 rounded-xl border-[#eab308] text-[#eab308] font-bold bg-transparent transition-colors hover:bg-[#eab308] hover:text-white">Get
                in
                touch</a>
        </div>
    </div>
</div>

<main
    class="my-5">
    @yield('content')
</main>

@stack('js')
</body>
</html>
