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

        <div class="flex items-center justify-between mt-4 px-3">
            <audio id="audio" hidden>
                Your browser does not support the audio.
            </audio>

            <div class="flex items-center space-x-4 flex-grow">
                <img class="vinyl-disk" src="{{ asset('assets/vinyl-disk.png') }}" alt="Vinyl disk">
                <div id="text-container" class="flex-grow">
                    <h1 class="text-white font-semibold text-lg text-skeleton mb-1" id="song-name"></h1>
                    <h6 class="text-gray-300 font-medium text-sm text-skeleton" id="song-author"></h6>
                </div>
            </div>

            <div class="flex justify-center items-center gap-x-2 me-3">
                <button id="repeat-btn" title="Start repeating" class="flex flex-col items-center relative text-white hover:bg-[#424242] rounded-lg p-2 transition-colors">
                    <svg id="repeat-svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3"/>
                    </svg>
                    <span id="repeat-dot" class="font-bold absolute text-3xl hidden">.</span>
                </button>
                <button id="shuffle-btn" class="hover:bg-[#424242] rounded-lg p-2 transition-colors" title="Shuffle">
                    <svg id="Flat" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"
                         class="size-6 text-white fill-current">
                        <path
                            d="M241.58984,191.19238c-.10351.13733-.19873.27845-.30859.41211-.25195.30725-.51758.60279-.79834.88343l-23.99756,23.99743a12.0001,12.0001,0,0,1-16.9707-16.9707L203.0293,196H172.11719a20.03724,20.03724,0,0,1-16.27442-8.375L81.82422,84H32a12,12,0,0,1,0-24H83.88281a20.03726,20.03726,0,0,1,16.27442,8.375L174.17578,172H203.0293l-3.51465-3.51465a12.0001,12.0001,0,0,1,16.9707-16.9707l23.99756,23.99743c.28076.28064.54639.57618.79834.88343.10986.13366.20508.27478.30859.41211.13184.17541.26758.34753.38965.53027.11328.169.21094.34424.31446.51746.09716.16247.19921.32141.28857.48877.0957.17859.17676.36218.26221.54431.08154.17261.168.34228.24121.51916.07373.17884.13379.36145.19873.543.06738.18762.13916.37293.19726.5647.05616.1842.09668.37146.14356.55762.04834.19311.10254.38366.1416.5802.04346.219.06982.43994.10107.6604.02344.167.05518.33105.07178.50024a12.03715,12.03715,0,0,1,0,2.37256c-.0166.16919-.04834.33325-.07178.50024-.03125.22046-.05761.44141-.10107.6604-.03906.19654-.09326.38709-.1416.5802-.04688.18616-.0874.37342-.14356.55762-.0581.19214-.13037.37756-.19775.56543-.06445.18115-.12451.36353-.19824.542-.07324.17725-.15967.34717-.24121.52014-.08594.18189-.16651.36524-.26221.54358-.08936.16736-.19141.3263-.28857.48877-.10352.17322-.20118.34851-.31446.51746C241.85742,190.84485,241.72168,191.017,241.58984,191.19238ZM110.39648,152.64453a11.998,11.998,0,0,0-16.73925,2.79L81.82422,172H32a12,12,0,0,0,0,24H83.88281a20.03726,20.03726,0,0,0,16.27442-8.375l13.02929-18.24121A11.99859,11.99859,0,0,0,110.39648,152.64453Zm35.207-49.28906a11.99655,11.99655,0,0,0,16.73925-2.79L174.17578,84H203.0293l-3.51465,3.51465a12.0001,12.0001,0,0,0,16.9707,16.9707l24-24c.02979-.02954.0542-.06225.083-.092.24707-.25195.48584-.51221.71-.785.12354-.15052.23145-.309.34668-.464.11816-.15869.24121-.31324.35156-.47779.12012-.17993.2251-.3667.335-.55151.08985-.15173.18555-.29968.269-.45557.09961-.186.18408-.37719.27343-.56713.07764-.16553.16016-.32789.23047-.49732.07666-.18481.13867-.37353.20557-.56128.06494-.18176.13476-.361.19141-.54663.05712-.18945.0996-.38184.14746-.57324.04687-.18848.10009-.374.13818-.56592.04395-.22131.07031-.44482.10156-.66772.02344-.16492.05518-.32691.07129-.49378a12.03958,12.03958,0,0,0,0-2.3728c-.01611-.16687-.04785-.32886-.07129-.49378-.03125-.2229-.05761-.44641-.10156-.66772-.03809-.19189-.09131-.37744-.13818-.56592-.04786-.1914-.09034-.38379-.14746-.57324-.05665-.18567-.12647-.36487-.19141-.54663-.0669-.18762-.12891-.37647-.20557-.56128-.07031-.16956-.15283-.332-.231-.49756-.08887-.18982-.17334-.38086-.273-.56689-.0835-.15589-.1792-.30384-.269-.45557-.10986-.18481-.21484-.37158-.335-.55151-.11035-.16455-.2334-.3191-.35156-.47779-.11523-.155-.22314-.31347-.34668-.464-.22412-.27282-.46289-.53308-.71-.785-.02881-.02979-.05322-.0625-.083-.092l-24-24a12.0001,12.0001,0,0,0-16.9707,16.9707L203.0293,60H172.11719a20.03724,20.03724,0,0,0-16.27442,8.375L142.81348,86.61621A11.99859,11.99859,0,0,0,145.60352,103.35547Z"/>
                    </svg>
                </button>
                <button id="action-btn" class="hover:bg-[#424242] rounded-lg p-2 transition-colors"></button>
            </div>

            <div class="wave-container" id="waveContainer"></div>
        </div>
    </div>

@endsection
