<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Flight</title>
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4">Edit Flight</h1>

        <form action="{{ route('flights.update', $flight->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="flight_number" class="block font-medium">Flight Number:</label>
                <input type="text" name="flight_number" id="flight_number" value="{{ $flight->flight_number }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label for="departure_date" class="block font-medium">Departure Date:</label>
                <input type="date" name="departure_date" id="departure_date" value="{{ $flight->departure_date }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label for="departure_airport" class="block font-medium">Departure Airport:</label>
                <input type="text" name="departure_airport" id="departure_airport" value="{{ $flight->departure_airport }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label for="departure_time" class="block font-medium">Departure Time:</label>
                <input type="time" name="departure_time" id="departure_time" value="{{ $flight->departure_time }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label for="arrival_airport" class="block font-medium">Arrival Airport:</label>
                <input type="text" name="arrival_airport" id="arrival_airport" value="{{ $flight->arrival_airport }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label for="arrival_time" class="block font-medium">Arrival Time:</label>
                <input type="time" name="arrival_time" id="arrival_time" value="{{ $flight->arrival_time }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label for="flight_time" class="block font-medium">Flight Time (minutes):</label>
                <input type="number" name="flight_time" id="flight_time" value="{{ $flight->flight_time }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label for="airline" class="block font-medium">Airline:</label>
                <input type="text" name="airline" id="airline" value="{{ $flight->airline }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            </div>
            <div>
                <label for="aircraft_id" class="block font-medium">Aircraft:</label>
                <select name="aircraft_id" id="aircraft_id" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    @foreach ($aircraft as $plane)
                    <option value="{{ $plane->id }}" {{ $plane->id === $flight->aircraft_id ? 'selected' : '' }}>
                        {{ $plane->icao_code }} - {{ $plane->full_name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="flight_class" class="block font-medium">Flight Class:</label>
                <select name="flight_class" id="flight_class" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    @foreach (App\Enums\FlightClass::cases() as $class)
                    <option value="{{ $class->value }}" {{ $class->value === $flight->flight_class ? 'selected' : '' }}>
                        {{ $class->value }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="flight_seat" class="block font-medium">Seat:</label>
                <select name="flight_seat" id="flight_seat" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    @foreach (App\Enums\FlightSeat::cases() as $seat)
                    <option value="{{ $seat->value }}" {{ $seat->value === $flight->flight_seat ? 'selected' : '' }}>
                        {{ $seat->value }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="flight_reason" class="block font-medium">Flight Reason:</label>
                <select name="flight_reason" id="flight_reason" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    @foreach (App\Enums\FlightReason::cases() as $reason)
                    <option value="{{ $reason->value }}" {{ $reason->value === $flight->flight_reason ? 'selected' : '' }}>
                        {{ $reason->value }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="comments" class="block font-medium">Comments:</label>
                <textarea name="comments" id="comments"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2">{{ $flight->comments }}</textarea>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Update Flight</button>
            </div>
        </form>

        <p class="mt-4"><a href="{{ route('flights.index') }}" class="text-blue-600">Back to Flights</a></p>
    </div>
</body>

</html>
