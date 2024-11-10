<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GifResource\Pages;
use App\Filament\Resources\GifResource\RelationManagers;
use App\Models\Gif;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GifResource extends Resource
{
    protected static ?string $model = Gif::class;

    protected static ?string $navigationIcon = 'heroicon-s-gif';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('link')
                    ->disk('gifs')
                    ->label('Upload Gif')
                    ->multiple()
                    ->acceptedFileTypes(['image/gif'])
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('link')
                    ->disk('gifs')
                    ->width(250)
                    ->height(150)
                    ->label('Gif')
                    ->wrap(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGifs::route('/'),
            'create' => Pages\CreateGif::route('/create'),
            'edit' => Pages\EditGif::route('/{record}/edit'),
        ];
    }
}
