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
        Schema::create('lap_times', function (Blueprint $table) {
            // API Provided by openf1.org
            // Sample URL: https://api.openf1.org/v1/laps?session_key=9161&driver_number=63&lap_number=8
            /*
                Provides detailed information about individual laps.
            */
            $table->id();
            $table->string('date_start');
            $table->integer('driver_number');
            $table->decimal('duration_sector_1', 8, 3)->nullable();
            $table->decimal('duration_sector_2', 8, 3)->nullable();
            $table->decimal('duration_sector_3', 8, 3)->nullable();
            $table->integer('i1_speed');
            $table->integer('i2_speed');
            $table->boolean('is_pit_out_lap')->default(false);
            $table->decimal('lap_duration');
            $table->integer('lap_number');
            $table->integer('meeting_key');
            $table->decimal('segments_sector_1', 8, 3)->nullable();
            $table->decimal('segments_sector_2', 8, 3)->nullable();
            $table->decimal('segments_sector_3', 8, 3)->nullable();
            $table->integer('session_key');
            $table->integer('st_speed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lap_times');
    }
};
