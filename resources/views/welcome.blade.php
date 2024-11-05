@extends('layouts.welcome')

@section('content')

    <main
        class="mx-4 sm:mx-10 md:mx-20 lg:mx-40 my-16 md:my-24 lg:my-32 grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-9">
        <div class="max-w-xl text-white">
            <h1 class="text-4xl font-sans md:text-5xl lg:text-6xl mb-5 md:mb-7 mt-12">
                Music<span class="text-[#eab308] font-bold ps-4">X</span>
            </h1>
            <p class="text-[#A0A0A0] text-lg md:text-xl mb-5 md:mb-7 leading-7 md:leading-8 font-medium">
                Your ultimate music companion for every moment. Dive into specially curated playlists that keep you in
                the
                zone for productivity, relaxation, focus, or creativity. Whether you're working, studying, coding, or
                unwinding, let MusicX provide the soundtrack to your life.
            </p>

            <a href="{{ route('listen') }}"
               class="animated-btn bg-[#2D2F33] w-fit rounded-3xl py-2 px-4 flex items-center gap-2 border-2 border-[#eab308] font-bold">
                Listen now
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="m9 9 10.5-3m0 6.553v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 1 1-.99-3.467l2.31-.66a2.25 2.25 0 0 0 1.632-2.163Zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 0 1-.99-3.467l2.31-.66A2.25 2.25 0 0 0 9 15.553Z"/>
                </svg>
            </a>

        </div>
        <div class="flex justify-center md:justify-end">
            <img src="{{ asset('assets/mello.svg') }}" alt="Music"
                 class="w-full max-w-xs md:max-w-sm lg:w-auto lg:max-w-lg">
        </div>
    </main>

@endsection

