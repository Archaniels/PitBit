<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('weather', function (Blueprint $table) {
            // API Provided by openf1.org
            // Sample URL: https://api.openf1.org/v1/weather?meeting_key=1208&wind_direction%3E=130&track_temperature%3E=52
            /*
                The weather over the track, updated every minute.
            */
            $table->id();
            $table->decimal('air_temperature');
            $table->string('date');
            $table->integer('humidity');
            $table->integer('meeting_key');
            $table->decimal('pressure');
            $table->integer('rainfall');
            $table->integer('session_key');
            $table->decimal('track_temperature');
            $table->integer('wind_direction');
            $table->decimal('wind_speed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather');
    }
};
