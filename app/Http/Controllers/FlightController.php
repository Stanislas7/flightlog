<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Aircraft;
use App\Http\Requests\FlightRequest;
use Illuminate\Http\Request;

class FlightController extends Controller
{
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

    public function store(FlightRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        Flight::create($validated);
        $this->updateUserFlightTime($validated['flight_time']);

        return redirect()->route('flights.index')->with('success', 'Your flight has been successfully created.');
    }

    public function edit(Flight $flight)
    {
        $aircraft = Aircraft::all();
        return view('flights.edit', compact('flight', 'aircraft'));
    }

    public function update(FlightRequest $request, Flight $flight)
    {
        $validated = $request->validated();
        $previousFlightTime = $flight->flight_time;

        $flight->update($validated);
        $this->updateUserFlightTime($validated['flight_time'] - $previousFlightTime);

        return redirect()->route('flights.index')->with('success', 'Your flight has been successfully updated.');
    }

    public function destroy(Flight $flight)
    {
        $flightTime = $flight->flight_time;
        $flight->delete();
        $this->updateUserFlightTime(-$flightTime);

        return redirect()->route('flights.index')->with('success', 'Your flight has been successfully deleted.');
    }

    private function updateUserFlightTime(int $flightTimeChange): void
    {
        $user = auth()->user();
        $user->flight_time += $flightTimeChange;
        $user->save();
    }
}
