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
        Schema::create('pits', function (Blueprint $table) {
            // API Provided by openf1.org
            // Sample URL: https://api.openf1.org/v1/pit?session_key=9158&pit_duration%3C31
            /*
                Provides information about cars going through the pit lane.
            */
            $table->id();
            $table->string('date');
            $table->integer('driver_number');
            $table->integer('lap_number');
            $table->integer('meeting_key');
            $table->decimal('pit_duration');
            $table->integer('session_key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pits');
    }
};
