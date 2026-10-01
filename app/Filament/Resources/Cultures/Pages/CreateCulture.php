<?php

namespace App\Filament\Resources\Cultures\Pages;

use App\Filament\Resources\Cultures\CultureResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCulture extends CreateRecord
{
    protected static string $resource = CultureResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
