<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Genre extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function songs(): HasMany
    {
        return $this->hasMany(Song::class);
    }

    public function songsCountByGenre($genre): int
    {
        return $this->songs()->where('genre_id', $genre->id)->count();
    }
}
