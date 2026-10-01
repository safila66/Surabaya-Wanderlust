<?php

namespace App\Filament\Resources\Accommodations\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class AccommodationForm
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
                    TextInput::make('price_range')
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
                    TextInput::make('distance'),
                    TextInput::make('source'),
                ])->columns(2)->columnSpanFull(),

                Section::make('Description & Facilities')->schema([
                    Textarea::make('description')->columnSpanFull(),
                    Textarea::make('facilities')->columnSpanFull(),
                ])->columns(1)->collapsed()->columnSpanFull(),

                Section::make('Media & Links')->schema([
                    FileUpload::make('image')->image()->columnSpanFull(),
                    TextInput::make('booking_url')->url()->label('Booking URL'),
                    TextInput::make('official_url')->url()->label('Official Website URL'),
                ])->columns(2)->columnSpanFull(),

                Section::make('Location & Map Coordinates')->schema([
                    TextInput::make('location')->columnSpanFull(),
                    TextInput::make('maps_url')->url()->label('Google Maps URL')->columnSpanFull(),
                    TextInput::make('latitude')->numeric(),
                    TextInput::make('longitude')->numeric(),
                ])->columns(2)->columnSpanFull(),
            ]);
    }
}
