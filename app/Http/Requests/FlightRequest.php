<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\FlightClass;
use App\Enums\FlightSeat;
use App\Enums\FlightReason;

class FlightRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'flight_number' => 'required|string',
            'departure_date' => 'required|date',
            'departure_airport' => 'required|string',
            'departure_time' => 'required',
            'arrival_airport' => 'required|string',
            'arrival_time' => 'required',
            'flight_time' => 'required|integer',
            'airline' => 'required|string',
            'aircraft_id' => 'required|exists:aircraft,id',
            'aircraft_reg' => 'nullable|string',
            'flight_class' => 'required|string|in:' . implode(',', FlightClass::values()),
            'flight_seat' => 'required|string|in:' . implode(',', FlightSeat::values()),
            'flight_seat_number' => 'nullable|string',
            'flight_reason' => 'required|string|in:' . implode(',', FlightReason::values()),
            'comments' => 'nullable|string',
        ];
    }
}
