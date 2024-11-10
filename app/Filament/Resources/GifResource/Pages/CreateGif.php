<?php

namespace App\Filament\Resources\GifResource\Pages;

use App\Filament\Resources\GifResource;
use App\Models\Gif;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CreateGif extends CreateRecord
{
    protected static string $resource = GifResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        foreach ($data['link'] as $file) {
            $gif = Gif::query()->create([
                'link' => $file,
            ]);
        }

        return $gif;
    }

}
