<?php

namespace App\Filament\Resources\Culinaries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CulinaryForm
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
                Select::make('category')
                    ->label('Category / Type')
                    ->options([
                        'food' => 'Traditional Food',
                        'resto-cafe' => 'Resto & Cafe',
                        'bar-club' => 'Bar & Club',
                    ])
                    ->default('food')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Textarea::make('history')
                    ->columnSpanFull(),
                Textarea::make('ingredients')
                    ->columnSpanFull(),
                Textarea::make('taste')
                    ->columnSpanFull(),
                TextInput::make('price_range'),
                FileUpload::make('menu_image')->image()->directory('culinary-menus')->label('Menu Image'),
                Textarea::make('menu_description')->label('Menu Description')->columnSpanFull(),
                Filament\Forms\Components\Toggle::make('reservation_required')->label('Reservation Required for Dine In'),
                TextInput::make('gofood_url')->url()->label('GoFood Link'),
                TextInput::make('grabfood_url')->url()->label('GrabFood Link'),
                TextInput::make('shopeefood_url')->url()->label('ShopeeFood Link'),
                TextInput::make('where_to_buy'),
                TextInput::make('location'),
                Toggle::make('souvenir')
                    ->required(),
                FileUpload::make('image')
                    ->image(),
                TextInput::make('source'),
            ]);
    }
}