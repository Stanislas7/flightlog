<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Flight</title>
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4">Create Flight</h1>

        <form action="{{ route('flights.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @csrf
            <div>
                <label for="flight_number" class="block font-medium">Flight Number:</label>
                <input type="text" name="flight_number" id="flight_number" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label for="departure_date" class="block font-medium">Departure Date:</label>
                <input type="date" name="departure_date" id="departure_date" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label for="departure_airport" class="block font-medium">Departure Airport:</label>
                <input type="text" name="departure_airport" id="departure_airport" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label for="departure_time" class="block font-medium">Departure Time:</label>
                <input type="time" name="departure_time" id="departure_time" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label for="arrival_airport" class="block font-medium">Arrival Airport:</label>
                <input type="text" name="arrival_airport" id="arrival_airport" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label for="arrival_time" class="block font-medium">Arrival Time:</label>
                <input type="time" name="arrival_time" id="arrival_time" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label for="flight_time" class="block font-medium">Flight Time (minutes):</label>
                <input type="number" name="flight_time" id="flight_time" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label for="airline" class="block font-medium">Airline:</label>
                <input type="text" name="airline" id="airline" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label for="aircraft_id" class="block font-medium">Aircraft:</label>
                <select name="aircraft_id" id="aircraft_id" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    @foreach ($aircraft as $plane)
                    <option value="{{ $plane->id }}">{{ $plane->icao_code }} - {{ $plane->full_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="flight_class" class="block font-medium">Flight Class:</label>
                <select name="flight_class" id="flight_class" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    <option value="Economy">Economy</option>
                    <option value="Premium Economy">Premium Economy</option>
                    <option value="Business">Business</option>
                    <option value="First">First</option>
                    <option value="Private">Private</option>
                </select>
            </div>
            <div>
                <label for="flight_seat" class="block font-medium">Seat:</label>
                <select name="flight_seat" id="flight_seat"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    <option value="Window">Window</option>
                    <option value="Middle">Middle</option>
                    <option value="Aisle">Aisle</option>
                </select>
            </div>
            <div>
                <label for="flight_seat_number" class="block font-medium">Seat Number:</label>
                <input type="text" name="flight_seat_number" id="flight_seat_number"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label for="flight_reason" class="block font-medium">Flight Reason:</label>
                <select name="flight_reason" id="flight_reason" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    <option value="Leisure">Leisure</option>
                    <option value="Business">Business</option>
                    <option value="Crew">Crew</option>
                </select>
            </div>
            <div>
                <label for="aircraft_reg" class="block font-medium">Aircraft Registration:</label>
                <input type="text" name="aircraft_reg" id="aircraft_reg"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div class="col-span-2">
                <label for="comments" class="block font-medium">Comments:</label>
                <textarea name="comments" id="comments"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2"></textarea>
            </div>
            <div class="col-span-2">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Create Flight</button>
            </div>
        </form>

        <p class="mt-4"><a href="{{ route('flights.index') }}" class="text-blue-600">Back to Flights</a></p>
    </div>
</body>

</html>
