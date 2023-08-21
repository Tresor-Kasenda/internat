<?php

declare(strict_types=1);

namespace App\Filament\Resources\InterneResource\Pages;

use App\Filament\Resources\InterneResource;
use Filament\Resources\Pages\EditRecord;

class EditInterne extends EditRecord
{
    protected static string $resource = InterneResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getUpdatedNotificationTitle(): ?string
    {
        return "L'eleve interne a  été modifié avec succès";
    }
}
