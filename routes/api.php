<?php

use App\Http\Controllers\GetGifController;
use App\Http\Controllers\GetSongController;
use Illuminate\Support\Facades\Route;

Route::get('/songs/random', [GetSongController::class, 'random']);

Route::get('/songs/{genre:name}', [GetSongController::class, 'byGenre']);

Route::get('/gifs/random', [GetGifController::class, 'random']);
