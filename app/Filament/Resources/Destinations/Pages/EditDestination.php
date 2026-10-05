<?php

namespace App\Filament\Resources\Destinations\Pages;

use App\Filament\Concerns\RedirectsToPreviousIndex;
use App\Filament\Resources\Destinations\DestinationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDestination extends EditRecord
{
    use RedirectsToPreviousIndex;

    protected static string $resource = DestinationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->successRedirectUrl(fn () => $this->getPreviousIndexUrl()),
        ];
    }
}