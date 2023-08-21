<?php

namespace App\Filament\Resources\PunitionResource\Pages;

use App\Filament\Resources\PunitionResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePunition extends CreateRecord
{
    protected static string $resource = PunitionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return "La punition a ete cree avec succes";
    }
}
