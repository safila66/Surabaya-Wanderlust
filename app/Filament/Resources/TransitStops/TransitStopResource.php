<?php

namespace App\Filament\Resources\TransitStops;

use App\Filament\Resources\TransitStops\Pages\CreateTransitStop;
use App\Filament\Resources\TransitStops\Pages\EditTransitStop;
use App\Filament\Resources\TransitStops\Pages\ListTransitStops;
use App\Filament\Resources\TransitStops\Schemas\TransitStopForm;
use App\Filament\Resources\TransitStops\Tables\TransitStopsTable;
use App\Models\TransitStop;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TransitStopResource extends Resource
{
    protected static ?string $model = TransitStop::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return TransitStopForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TransitStopsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTransitStops::route('/'),
            'create' => CreateTransitStop::route('/create'),
            'edit' => EditTransitStop::route('/{record}/edit'),
        ];
    }
}
