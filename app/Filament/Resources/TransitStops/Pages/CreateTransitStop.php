<?php

namespace App\Filament\Resources\TransitStops\Pages;

use App\Filament\Resources\TransitStops\TransitStopResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTransitStop extends CreateRecord
{
    protected static string $resource = TransitStopResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
