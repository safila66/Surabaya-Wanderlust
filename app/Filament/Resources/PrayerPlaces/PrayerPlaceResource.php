<?php

namespace App\Filament\Resources\PrayerPlaces;

use App\Filament\Resources\PrayerPlaces\Pages\CreatePrayerPlace;
use App\Filament\Resources\PrayerPlaces\Pages\EditPrayerPlace;
use App\Filament\Resources\PrayerPlaces\Pages\ListPrayerPlaces;
use App\Filament\Resources\PrayerPlaces\Schemas\PrayerPlaceForm;
use App\Filament\Resources\PrayerPlaces\Tables\PrayerPlacesTable;
use App\Models\PrayerPlace;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PrayerPlaceResource extends Resource
{
    protected static ?string $model = PrayerPlace::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PrayerPlaceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PrayerPlacesTable::configure($table);
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
            'index' => ListPrayerPlaces::route('/'),
            'create' => CreatePrayerPlace::route('/create'),
            'edit' => EditPrayerPlace::route('/{record}/edit'),
        ];
    }
}
