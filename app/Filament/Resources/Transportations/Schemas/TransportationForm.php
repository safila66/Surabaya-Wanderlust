<?php

namespace App\Filament\Resources\Transportations\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TransportationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('regency_id')
                    ->relationship('regency', 'name', fn($query) => $query->whereIn('name', ['Surabaya Barat', 'Surabaya Tengah', 'Surabaya Timur', 'Surabaya Selatan', 'Surabaya Utara']))->label('Region')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('type'),
                TextInput::make('departure'),
                TextInput::make('destination'),
                TextInput::make('estimated_time'),
                TextInput::make('estimated_cost'),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('ticket_url')
                    ->url(),
                FileUpload::make('image')
                    ->image(),
                TextInput::make('source'),
            ]);
    }
}
