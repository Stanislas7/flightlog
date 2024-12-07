<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Flights</title>
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4">All Flights</h1>

        <table class="min-w-full border border-gray-300 border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-2">#</th>
                    <th class="border border-gray-300 p-2">Flight Number</th>
                    <th class="border border-gray-300 p-2">Departure</th>
                    <th class="border border-gray-300 p-2">Arrival</th>
                    <th class="border border-gray-300 p-2">Aircraft</th>
                    <th class="border border-gray-300 p-2">Class</th>
                    <th class="border border-gray-300 p-2">Reason</th>
                    <th class="border border-gray-300 p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($flights as $flight)
                <tr>
                    <td class="border border-gray-300 p-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 p-2">
                        <a href="{{ route('flights.edit', $flight->id) }}" class="text-blue-600 hover:underline">
                            {{ $flight->flight_number }}
                        </a>
                    </td>
                    <td class="border border-gray-300 p-2">
                        {{ $flight->departure_airport }} <br>
                        {{ $flight->departure_date }} {{ $flight->departure_time }}
                    </td>
                    <td class="border border-gray-300 p-2">
                        {{ $flight->arrival_airport }} <br>
                        {{ $flight->arrival_time }}
                    </td>
                    <td class="border border-gray-300 p-2">{{ $flight->aircraft->icao_code }} - {{
                        $flight->aircraft->full_name }}</td>
                    <td class="border border-gray-300 p-2">{{ $flight->flight_class }}</td>
                    <td class="border border-gray-300 p-2">{{ $flight->flight_reason }}</td>
                    <td class="border border-gray-300 p-2">
                        <form action="{{ route('flights.destroy', $flight->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="border border-gray-300 p-2 text-center">No flights found</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <p class="mt-4"><a href="{{ route('flights.create') }}" class="text-blue-600">Add New Flight</a></p>
    </div>
</body>

</html>
