<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Aircraft;
use App\Enums\FlightClass;
use App\Enums\FlightSeat;
use App\Enums\FlightReason;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Show a list of current user's flights.
     */
    public function index()
    {
        $flights = Flight::with('aircraft')->where('user_id', auth()->id())->get();
        return view('flights.index', compact('flights'));
    }

    public function create()
    {
        $aircraft = Aircraft::all();
        return view('flights.create', compact('aircraft'));
    }

    /**
     * Store a new flight.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
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
            'flight_class' => 'required|string|in:'.implode(',', FlightClass::values()),
            'flight_seat' => 'required|string|in:'.implode(',', FlightSeat::values()),
            'flight_seat_number' => 'nullable|string',
            'flight_reason' => 'required|string|in:'.implode(',', FlightReason::values()),
            'comments' => 'nullable|string',
        ]);

        $validated['user_id'] = auth()->id();

        Flight::create($validated);

        return redirect()->route('flights.index')->with('success', 'Your flight has been created with success.');
    }

    /**
     * Show the form for editing a flight.
     */
    public function edit(Flight $flight)
    {
        $aircraft = Aircraft::all();
        return view('flights.edit', compact('flight', 'aircraft'));
    }

    /**
     * Update a flight.
     */
    public function update(Request $request, Flight $flight)
    {
        $validated = $request->validate([
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
            'flight_class' => 'required|string|in:'.implode(',', FlightClass::values()),
            'flight_seat' => 'required|string|in:'.implode(',', FlightSeat::values()),
            'flight_seat_number' => 'nullable|string',
            'flight_reason' => 'required|string|in:'.implode(',', FlightReason::values()),
            'comments' => 'nullable|string',
        ]);

        $flight->update($validated);

        return redirect()->route('flights.index')->with('success', 'Your flight has been updated with success.');
    }

    /**
     * Delete a flight.
     */
    public function destroy(Flight $flight)
    {
        $flight->delete();

        return redirect()->route('flights.index')->with('success', 'Your flight has been deleted with success.');
    }
}
