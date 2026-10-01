<?php

namespace App\Filament\Resources\Culinaries\Pages;

use App\Filament\Resources\Culinaries\CulinaryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCulinary extends EditRecord
{
    protected static string $resource = CulinaryResource::class;

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
