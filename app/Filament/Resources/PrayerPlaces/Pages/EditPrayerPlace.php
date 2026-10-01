<?php

namespace App\Filament\Resources\PrayerPlaces\Pages;

use App\Filament\Resources\PrayerPlaces\PrayerPlaceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPrayerPlace extends EditRecord
{
    protected static string $resource = PrayerPlaceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
