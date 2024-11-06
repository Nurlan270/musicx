<?php

namespace App\Providers;

use App\Models\Genre;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::setScriptRoute(function ($handle) {
            return \Illuminate\Support\Facades\Route::get('/livewire/live-wire-js', $handle);
        });

        View::composer('layouts.app', function ($view) {
            $view->with('genres', Genre::all());
        });
    }
}
