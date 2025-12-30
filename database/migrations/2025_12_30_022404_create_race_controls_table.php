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
        Schema::create('race_controls', function (Blueprint $table) {
            // API Provided by openf1.org
            // Sample URL: https://api.openf1.org/v1/race_control?flag=BLACK AND WHITE&driver_number=1&date>=2023-01-01&date<2023-09-01
            /*
                Provides information about race control (racing incidents, flags, safety car, ...).
            */
            $table->id();
            $table->string('category');
            $table->string('date');
            $table->integer('driver_number');
            $table->string('flag');
            $table->integer('lap_number');
            $table->integer('meeting_key');
            $table->string('message');
            $table->string('scope');
            $table->integer('sector')->nullable();
            $table->integer('session_key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('race_controls');
    }
};
