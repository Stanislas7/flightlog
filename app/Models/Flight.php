<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    public function aircraft()
    {
        return $this->belongsTo(Aircraft::class);
    }
}
