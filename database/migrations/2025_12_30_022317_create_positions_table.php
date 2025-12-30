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
        Schema::create('positions', function (Blueprint $table) {
            // API Provided by openf1.org
            // Sample URL: https://api.openf1.org/v1/position?meeting_key=1217&driver_number=40&position%3C=3
            /*
                Provides driver positions throughout a session, including initial placement and subsequent changes.
            */
            $table->id();
            $table->string('date');
            $table->integer('driver_number');
            $table->integer('meeting_key');
            $table->integer('position');
            $table->integer('session_key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
