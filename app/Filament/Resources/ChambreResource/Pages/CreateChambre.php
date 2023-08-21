<?php

namespace App\Filament\Resources\ChambreResource\Pages;

use App\Filament\Resources\ChambreResource;
use Filament\Resources\Pages\CreateRecord;

class CreateChambre extends CreateRecord
{
    protected static string $resource = ChambreResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return "La chambre a ete cree avec succes";
    }
}
