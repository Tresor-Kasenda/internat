<?php

declare(strict_types=1);

namespace App\Filament\Resources\FacultyResource\Pages;

use App\Filament\Resources\FacultyResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFaculty extends CreateRecord
{
    protected static string $resource = FacultyResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return "La faculte a ete cree avec succes";
    }
}
