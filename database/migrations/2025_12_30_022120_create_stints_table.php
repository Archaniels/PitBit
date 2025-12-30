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
        Schema::create('stints', function (Blueprint $table) {
            // API Provided by openf1.org
            // Sample URL: https://api.openf1.org/v1/stints?session_key=9165&tyre_age_at_start%3E=3
            /*
                Provides information about individual stints. A stint refers to a period of continuous 
                driving by a driver during a session.
            */
            $table->id();
            $table->string('compound');
            $table->integer('driver_number');
            $table->integer('lap_end');
            $table->integer('lap_start');
            $table->integer('meeting_key');
            $table->integer('session_key');
            $table->integer('stint_number');
            $table->integer('tyre_age_at_start');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stints');
    }
};
