<?php

namespace App\Filament\Resources\Destinations\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DestinationForm
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
                Textarea::make('activities')
                    ->columnSpanFull(),
                TextInput::make('opening_hours'),
                TextInput::make('ticket_price'),
                TextInput::make('ticket_url')->url()->label('Ticket / Booking URL'),
                Textarea::make('facilities')
                    ->columnSpanFull(),
                Textarea::make('accessibility')
                    ->columnSpanFull(),
                TextInput::make('visit_duration'),
                TextInput::make('location'),
                TextInput::make('maps_url')
                    ->url(),
                FileUpload::make('image')
                    ->image(),
            ]);
    }
}
