<?php

namespace App\Filament\Resources\TravelGuides\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TravelGuideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('regency_id')
                    ->relationship('regency', 'name')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Textarea::make('getting_around')
                    ->columnSpanFull(),
                Textarea::make('travel_tips')
                    ->columnSpanFull(),
                Textarea::make('local_rules')
                    ->columnSpanFull(),
                Textarea::make('best_time')
                    ->columnSpanFull(),
                TextInput::make('estimated_budget'),
                FileUpload::make('image')
                    ->image(),
                TextInput::make('source'),
                TextInput::make('source_url')
                    ->url(),
                DatePicker::make('last_updated'),
            ]);
    }
}
