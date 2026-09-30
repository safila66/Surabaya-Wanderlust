<?php

namespace App\Filament\Resources\Transportations\Pages;

use App\Filament\Resources\Transportations\TransportationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTransportations extends ListRecords
{
    protected static string $resource = TransportationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
