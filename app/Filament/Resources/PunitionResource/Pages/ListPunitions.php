<?php

namespace App\Filament\Resources\PunitionResource\Pages;

use App\Filament\Resources\PunitionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPunitions extends ListRecords
{
    protected static string $resource = PunitionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
