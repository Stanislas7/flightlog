<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number');
            $table->date('departure_date');
            $table->string('departure_airport');
            $table->time('departure_time');
            $table->string('arrival_airport');
            $table->time('arrival_time');
            $table->integer('flight_time')->comment('Duration in minutes');
            $table->string('airline');
            $table->foreignId('aircraft_id')->constrained('aircraft')->onDelete('cascade');
            $table->string('aircraft_reg')->nullable();
            $table->enum('flight_class', ['Economy', 'Premium Eco', 'Business', 'First', 'Private']);
            $table->enum('flight_seat', ['Window', 'Middle', 'Aisle']);
            $table->string('flight_seat_number')->nullable();
            $table->enum('flight_reason', ['Leisure', 'Business', 'Crew']);
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
