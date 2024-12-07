<?php

namespace App\Enums;

enum FlightReason: string
{
    case Leisure = 'Leisure';
    case Business = 'Business';
    case Crew = 'Crew';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
