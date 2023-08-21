<?php

declare(strict_types=1);

namespace App\Filament\Resources\InterneResource\Pages;

use App\Filament\Resources\InterneResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInterne extends CreateRecord
{
    protected static string $resource = InterneResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return "L'eleve interne a  été ajoutés avec succès";
    }
}
