<?php

namespace App\Enums;

enum FlightClass: string
{
    case Economy = 'Economy';
    case PremiumEco = 'Premium Economy';
    case Business = 'Business';
    case First = 'First';
    case Private = 'Private';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
