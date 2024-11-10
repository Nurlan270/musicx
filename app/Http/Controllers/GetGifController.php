<?php

namespace App\Http\Controllers;

use App\Http\Resources\GifResource;
use App\Models\Gif;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetGifController extends Controller
{
    public function random(Request $request)
    {
        if (Gif::query()->exists()) {
            $randomId = mt_rand(Gif::query()->min('id'), Gif::query()->max('id'));
            $randomGif = Gif::query()->whereKey($randomId)->first();

            return new GifResource($randomGif);
        }

        return response()->json('No gif exists, please first add any gif.', Response::HTTP_NOT_FOUND);
    }
}
