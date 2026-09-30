<?php

namespace App\Filament\Resources\Culinaries\Pages;

use App\Filament\Resources\Culinaries\CulinaryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCulinaries extends ListRecords
{
    protected static string $resource = CulinaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
