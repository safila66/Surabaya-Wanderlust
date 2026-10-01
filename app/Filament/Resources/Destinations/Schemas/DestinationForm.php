<?php

namespace App\Filament\Resources\Destinations\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class DestinationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')->schema([
                    Select::make('regency_id')
                        ->relationship('regency', 'name', fn($query) => $query->whereIn('name', ['Surabaya Barat', 'Surabaya Tengah', 'Surabaya Timur', 'Surabaya Selatan', 'Surabaya Utara']))
                        ->label('Region')
                        ->required(),
                    TextInput::make('name')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (string $operation, $state, \Filament\Schemas\Components\Utilities\Set $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null),
                    TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),
                    TextInput::make('opening_hours'),
                    TextInput::make('ticket_price')
                        ->datalist([
                            'Gratis',
                            'Di bawah Rp 25.000',
                            'Rp 25.000 - Rp 50.000',
                            'Rp 50.000 - Rp 100.000',
                            'Rp 100.000 - Rp 250.000',
                            'Rp 250.000 - Rp 500.000',
                            'Rp 500.000 - Rp 1.000.000',
                            'Di atas Rp 1.000.000',
                            'Bervariasi',
                        ]),
                    TextInput::make('price_min')->numeric()->label('Min Price (Angka)')->placeholder('Contoh: 30000'),
                    TextInput::make('price_max')->numeric()->label('Max Price (Angka)')->placeholder('Contoh: 75000'),
                    TextInput::make('visit_duration'),
                ])->columns(2)->columnSpanFull(),

                Section::make('Description & Details')->schema([
                    Textarea::make('description')->columnSpanFull(),
                    Textarea::make('activities')->columnSpanFull(),
                    Textarea::make('facilities')->columnSpanFull(),
                    Textarea::make('accessibility')->columnSpanFull(),
                ])->columns(1)->collapsed()->columnSpanFull(),

                Section::make('Media & Links')->schema([
                    FileUpload::make('image')->image()->columnSpanFull(),
                    TextInput::make('ticket_url')->url()->label('Ticket / Booking URL')->columnSpanFull(),
                ])->columns(1)->columnSpanFull(),

                Section::make('Location & Map Coordinates')->schema([
                    TextInput::make('location')->columnSpanFull(),
                    TextInput::make('maps_url')->url()->label('Google Maps URL')->columnSpanFull(),
                    TextInput::make('latitude')->numeric(),
                    TextInput::make('longitude')->numeric(),
                ])->columns(2)->columnSpanFull(),
            ]);
    }
}
