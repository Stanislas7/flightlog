<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\FlightClass;
use App\Enums\FlightReason;
use App\Enums\FlightSeat;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_number',
        'departure_date',
        'departure_airport',
        'departure_time',
        'arrival_airport',
        'arrival_time',
        'flight_time',
        'airline',
        'aircraft_id',
        'aircraft_reg',
        'flight_class',
        'flight_seat',
        'flight_seat_number',
        'flight_reason',
        'comments',
        'user_id',
    ];

    public function aircraft()
    {
        return $this->belongsTo(Aircraft::class);
    }
}
