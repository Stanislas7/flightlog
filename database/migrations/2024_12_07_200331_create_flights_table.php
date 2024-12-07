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
            $table->integer('flight_time');
            $table->string('airline');
            $table->foreignId('aircraft_id')->constrained('aircraft')->onDelete('cascade');
            $table->string('aircraft_reg')->nullable();
            $table->string('flight_class');
            $table->string('flight_seat');
            $table->string('flight_seat_number')->nullable();
            $table->string('flight_reason');
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
