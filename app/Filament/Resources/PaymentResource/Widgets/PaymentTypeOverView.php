<?php

namespace App\Filament\Resources\PaymentResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PaymentTypeOverView extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total', 'amount')->currency('FC'),
            Stat::make('Cash', 'amount')->currency('FC')->where('payment_method', 'CASH'),
            Stat::make('Mobile Money', 'amount')->currency('FC')->where('payment_method', 'MOBILE_MONEY'),
        ];
    }
}
