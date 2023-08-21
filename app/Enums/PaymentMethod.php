<?php

declare(strict_types=1);

namespace App\Enums;

use Exception;
use Filament\Support\Contracts\HasLabel;

enum PaymentMethod: string implements HasLabel
{
    case Cash = 'cash';
    case MobileMoney = 'mobile_money';
    case Autre = 'autre';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Cash => 'Cash',
            self::MobileMoney => 'Mobile Money',
            self::Autre => 'Autre',
            default => throw new Exception("Unknown label for {$this->value}"),
        };
    }
}
