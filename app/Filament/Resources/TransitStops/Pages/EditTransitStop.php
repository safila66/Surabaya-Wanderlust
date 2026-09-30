<?php

namespace App\Filament\Resources\TransitStops\Pages;

use App\Filament\Resources\TransitStops\TransitStopResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTransitStop extends EditRecord
{
    protected static string $resource = TransitStopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
