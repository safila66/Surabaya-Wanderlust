<?php

namespace App\Filament\Resources\Culinaries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class CulinaryForm
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
                    Select::make('category')
                        ->label('Category / Type')
                        ->options([
                            'food' => 'Traditional Food',
                            'resto-cafe' => 'Resto & Cafe',
                            'bar-club' => 'Bar & Club',
                        ])
                        ->default('food')
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
                    TextInput::make('price_max')->numeric()->label('Max Price (Angka)')->placeholder('Contoh: 75000'),

                    TextInput::make('opening_hours')
                    ->label('Opening Hours')
                    ->placeholder('Contoh: 08:00 - 21:00')
                    ->datalist([
                    '24 Jam',
                    '08:00 - 17:00',
                    '08:00 - 21:00',
                    '10:00 - 22:00',
                    '11:00 - 23:00',
                    '12:00 - 00:00',
                    '08:00 - 00:00',
                    '17:00 - 00:00',
    ]),

TextInput::make('source'),
                    TextInput::make('source'),
                    Toggle::make('souvenir')->required(),
                    Toggle::make('reservation_required')->label('Reservation Required for Dine In'),
                ])->columns(2)->columnSpanFull(),

                Section::make('Description & Details')->schema([
                    Textarea::make('description')->columnSpanFull(),
                    Textarea::make('history')->columnSpanFull(),
                    Textarea::make('ingredients')->columnSpanFull(),
                    Textarea::make('taste')->columnSpanFull(),
                    TextInput::make('where_to_buy')->columnSpanFull(),
                ])->columns(1)->collapsed()->columnSpanFull(),

                Section::make('Media & Menu')->schema([
                    FileUpload::make('image')->image(),
                    FileUpload::make('menu_image')->image()->multiple()->directory('culinary-menus')->label('Menu Images'),
                    Textarea::make('menu_description')->label('Menu Description')->columnSpanFull(),
                ])->columns(2)->columnSpanFull(),

                Section::make('Delivery / Takeaway Links')->schema([
                    TextInput::make('gofood_url')->url()->label('GoFood Link'),
                    TextInput::make('grabfood_url')->url()->label('GrabFood Link'),
                    TextInput::make('shopeefood_url')->url()->label('ShopeeFood Link'),
                ])->columns(3)->columnSpanFull(),

                Section::make('Location & Map Coordinates')->schema([
                    TextInput::make('location')->columnSpanFull(),
                    TextInput::make('maps_url')->url()->label('Google Maps URL')->columnSpanFull(),
                    TextInput::make('latitude')->numeric(),
                    TextInput::make('longitude')->numeric(),
                ])->columns(2)->columnSpanFull(),
            ]);
    }
}
