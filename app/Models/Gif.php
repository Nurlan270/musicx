<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gif extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'link'
    ];

    protected static function booted(): void
    {
        static::deleting(function ($model) {
            if ($model->link && Storage::disk('gifs')->exists($model->link)) {
                Storage::disk('gifs')->delete($model->link);
            }
        });
    }
}
