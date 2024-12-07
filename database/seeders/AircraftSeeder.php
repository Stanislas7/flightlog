<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aircraft;

class AircraftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aircraft::insert([
            [
                'icao_code' => 'A320',
                'full_name' => 'Airbus A320',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icao_code' => 'B738',
                'full_name' => 'Boeing 737-800',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
