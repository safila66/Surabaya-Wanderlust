<?php

namespace App\Filament\Resources\Accommodations\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AccommodationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('regency_id')
                    ->relationship('regency', 'name')->label('Region')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('price_range'),
                TextInput::make('distance'),
                Textarea::make('facilities')
                    ->columnSpanFull(),
                TextInput::make('location'),
                TextInput::make('maps_url')
                    ->url(),
                TextInput::make('booking_url')
                    ->url(),
                TextInput::make('official_url')
                    ->url(),
                FileUpload::make('image')
                    ->image(),
                TextInput::make('source'),
            ]);
    }
}
