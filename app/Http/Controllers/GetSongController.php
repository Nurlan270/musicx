<?php

namespace App\Http\Controllers;

use App\Http\Resources\SongResource;
use App\Models\Genre;
use App\Models\Song;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetSongController extends Controller
{
    public function byGenre(Request $request, Genre $genre)
    {
        if ($song = Song::query()->where('genre_id', $genre->id)->inRandomOrder()->first()) {
            return new SongResource($song);
        }

        return response()->json('No song exists with this genre, please first add song with this genre.', Response::HTTP_NOT_FOUND);
    }

    public function random(Request $request)
    {
        if (Song::query()->exists()) {
            $randomId = mt_rand(Song::query()->min('id'), Song::query()->max('id'));
            $randomSong = Song::query()->whereKey($randomId)->first();

            return new SongResource($randomSong);
        }

        return response()->json('No song exists, please first add any song.', Response::HTTP_NOT_FOUND);
    }
}
