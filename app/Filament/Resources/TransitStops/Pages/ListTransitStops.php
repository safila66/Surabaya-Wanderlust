<?php

namespace App\Filament\Resources\TransitStops\Pages;

use App\Filament\Resources\TransitStops\TransitStopResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTransitStops extends ListRecords
{
    protected static string $resource = TransitStopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
