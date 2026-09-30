<?php

namespace App\Filament\Resources\Culinaries;

use App\Filament\Resources\Culinaries\Pages\CreateCulinary;
use App\Filament\Resources\Culinaries\Pages\EditCulinary;
use App\Filament\Resources\Culinaries\Pages\ListCulinaries;
use App\Filament\Resources\Culinaries\Schemas\CulinaryForm;
use App\Filament\Resources\Culinaries\Tables\CulinariesTable;
use App\Models\Culinary;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CulinaryResource extends Resource
{
    protected static ?string $model = Culinary::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CulinaryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CulinariesTable::configure($table);
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
            'index' => ListCulinaries::route('/'),
            'create' => CreateCulinary::route('/create'),
            'edit' => EditCulinary::route('/{record}/edit'),
        ];
    }
}
