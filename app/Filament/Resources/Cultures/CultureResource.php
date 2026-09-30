<?php

namespace App\Filament\Resources\Cultures;

use App\Filament\Resources\Cultures\Pages\CreateCulture;
use App\Filament\Resources\Cultures\Pages\EditCulture;
use App\Filament\Resources\Cultures\Pages\ListCultures;
use App\Filament\Resources\Cultures\Schemas\CultureForm;
use App\Filament\Resources\Cultures\Tables\CulturesTable;
use App\Models\Culture;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CultureResource extends Resource
{
    protected static ?string $model = Culture::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CultureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CulturesTable::configure($table);
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
            'index' => ListCultures::route('/'),
            'create' => CreateCulture::route('/create'),
            'edit' => EditCulture::route('/{record}/edit'),
        ];
    }
}
