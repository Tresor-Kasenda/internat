<?php

declare(strict_types=1);

namespace App\Filament\Resources\InterneResource\Pages;

use App\Filament\Resources\InterneResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInternes extends ListRecords
{
    protected static string $resource = InterneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
