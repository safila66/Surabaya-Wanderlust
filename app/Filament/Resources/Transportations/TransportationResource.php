<?php

namespace App\Filament\Resources\Transportations;

use App\Filament\Resources\Transportations\Pages\CreateTransportation;
use App\Filament\Resources\Transportations\Pages\EditTransportation;
use App\Filament\Resources\Transportations\Pages\ListTransportations;
use App\Filament\Resources\Transportations\Schemas\TransportationForm;
use App\Filament\Resources\Transportations\Tables\TransportationsTable;
use App\Models\Transportation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TransportationResource extends Resource
{
    protected static ?string $model = Transportation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return TransportationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TransportationsTable::configure($table);
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
            'index' => ListTransportations::route('/'),
            'create' => CreateTransportation::route('/create'),
            'edit' => EditTransportation::route('/{record}/edit'),
        ];
    }
}
