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
        Schema::create('car_data', function (Blueprint $table) {
            // API Provided by openf1.org
            // Sample URL: https://api.openf1.org/v1/car_data?driver_number=55&session_key=9159&speed%3E=315
            /*
                Some data about each car, at a sample rate of about 3.7 Hz.
            */
            $table->id();
            $table->integer('brake');
            $table->string('date');
            $table->integer('driver_number');
            $table->integer('drs');
            $table->integer('meeting_key');
            $table->integer('n_gear');
            $table->integer('rpm');
            $table->integer('session_key');
            $table->integer('speed');
            $table->integer('throttle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_data');
    }
};
