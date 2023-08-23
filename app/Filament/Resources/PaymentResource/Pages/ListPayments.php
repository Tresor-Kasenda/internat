<?php

declare(strict_types=1);

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Enums\PaymentMethod;
use App\Filament\Resources\PaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Filament\Support\Enums\IconPosition;
use Illuminate\Database\Eloquent\Builder;

class ListPayments extends ListRecords
{
    protected static string $resource = PaymentResource::class;

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'Par cash' => Tab::make()
                ->icon('heroicon-m-banknotes')
                ->iconPosition(IconPosition::Before)
                ->modifyQueryUsing(fn(Builder $query) => $query->where('payment_method', '=', PaymentMethod::Cash)),
            'Mobile money' => Tab::make()
                ->icon('heroicon-m-credit-card')
                ->iconPosition(IconPosition::Before)
                ->modifyQueryUsing(fn(Builder $query) => $query->where('payment_method', '=', PaymentMethod::MobileMoney)),
            'Autres' => Tab::make()
                ->icon('heroicon-m-currency-dollar')
                ->iconPosition(IconPosition::Before)
                ->modifyQueryUsing(fn(Builder $query) => $query->where('payment_method', '=', PaymentMethod::Autre)),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
