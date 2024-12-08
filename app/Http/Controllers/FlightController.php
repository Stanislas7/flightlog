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
        $validated = $this->validateFlight($request);
        $validated['user_id'] = auth()->id();

        Flight::create($validated);
        $this->updateUserFlightTime($validated['flight_time']);

        return redirect()->route('flights.index')->with('success', 'Your flight has been successfully created.');
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
        $validated = $this->validateFlight($request);
        $previousFlightTime = $flight->flight_time;

        $flight->update($validated);
        $this->updateUserFlightTime($validated['flight_time'] - $previousFlightTime);

        return redirect()->route('flights.index')->with('success', 'Your flight has been successfully updated.');
    }

    /**
     * Delete a flight.
     */
    public function destroy(Flight $flight)
    {
        $flightTime = $flight->flight_time;
        $flight->delete();
        $this->updateUserFlightTime(-$flightTime);

        return redirect()->route('flights.index')->with('success', 'Your flight has been successfully deleted.');
    }

    /**
     * Validate flight data.
     */
    private function validateFlight(Request $request)
    {
        return $request->validate([
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
        ]);
    }

    /**
     * Update user's flight time.
     */
    private function updateUserFlightTime(int $flightTimeChange): void
    {
        $user = auth()->user();
        $user->flight_time += $flightTimeChange;
        $user->save();
    }
}
