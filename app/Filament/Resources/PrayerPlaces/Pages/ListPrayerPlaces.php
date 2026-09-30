<?php

namespace App\Filament\Resources\PrayerPlaces\Pages;

use App\Filament\Resources\PrayerPlaces\PrayerPlaceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPrayerPlaces extends ListRecords
{
    protected static string $resource = PrayerPlaceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
