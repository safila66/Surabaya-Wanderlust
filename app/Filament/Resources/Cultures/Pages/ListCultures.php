<?php

namespace App\Filament\Resources\Cultures\Pages;

use App\Filament\Resources\Cultures\CultureResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCultures extends ListRecords
{
    protected static string $resource = CultureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
