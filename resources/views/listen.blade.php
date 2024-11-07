@extends('layouts.app')

@section('content')

    <div>
        <div class="relative group">
            <div class="w-full h-[575px]">
                <img class="rounded-2xl h-full hidden gif"
                     src=""
                     alt="Gif (Something went wrong while loading gif, refresh page to retry)">

                <div class="rounded-2xl bg-[#262626] h-full flex items-center justify-center hidden loader">
                    <img class="w-40" src="{{ asset('assets/loader.svg') }}" alt="Loading...">
                </div>
            </div>

            <button class="hidden absolute top-5 right-5 p-2 rounded-xl bg-[#424242] cursor-pointer change-gif-btn"
                    title="Change Gif">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"/>
                </svg>
            </button>
        </div>

        <div class="flex items-center justify-between mt-4 px-4">
            <audio id="audio" hidden>
                <source src="" type="audio/mpeg">
                Your browser does not support the audio.
            </audio>

            <div class="flex items-center space-x-4">
                <img class="vinyl-disk" src="{{ asset('assets/vinyl-disk.png') }}"
                     alt="Vinyl disk">
                <div>
                    <h1 class="text-white font-semibold text-lg text-skeleton w-32 mb-1" id="song-name"></h1>
                    <h6 class="text-gray-300 font-light text-sm text-skeleton w-32" id="song-author"></h6>
                </div>
            </div>

            <button id="action-btn" class="hover:bg-[#424242] rounded-lg p-2 transition-colors"></button>

            <div class="wave-container" id="waveContainer"></div>
        </div>
    </div>

@endsection
