<?php

namespace App\Filament\Resources\TransitStops\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransitStopForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('type')
                    ->required(),
                TextInput::make('latitude')
                    ->numeric(),
                TextInput::make('longitude')
                    ->numeric(),
                TextInput::make('route_info'),
            ]);
    }
}
