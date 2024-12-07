<?php

namespace App\Enums;

enum FlightSeat: string
{
    case Window = 'Window';
    case Middle = 'Middle';
    case Aisle = 'Aisle';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
