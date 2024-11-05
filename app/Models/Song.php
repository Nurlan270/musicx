<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Song extends Model
{
    public $timestamps = false;

    protected $fillable = [
      'name', 'genre_id',
      'link',
    ];

    protected static function booted(): void
    {
        static::deleting(function ($model) {
            if ($model->link && Storage::disk('songs')->exists($model->link)) {
                Storage::disk('songs')->delete($model->link);
            }
        });
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}
