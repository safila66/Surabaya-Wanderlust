<?php

namespace App\Filament\Resources\Cultures\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CultureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('regency_id')
                    ->relationship('regency', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('category'),
                Textarea::make('description')
                    ->columnSpanFull(),
                Textarea::make('history')
                    ->columnSpanFull(),
                Textarea::make('tradition')
                    ->columnSpanFull(),
                Textarea::make('local_language')
                    ->columnSpanFull(),
                Textarea::make('location')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image(),
                TextInput::make('source'),
            ]);
    }
}
