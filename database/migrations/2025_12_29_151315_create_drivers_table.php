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
        Schema::create('drivers', function (Blueprint $table) {
            // API Provided by openf1.org
            // Sample URL: https://api.openf1.org/v1/drivers?driver_number=1&session_key=9158
            /*
                Provides information about drivers for each session.
            */
            $table->id();
            $table->string('broadcast_name'); // e.g. M VERSTAPPEN, C LECLERC, L NORRIS, etc.
            $table->string('country_code'); // NED, MON, GBR, etc.
            $table->integer('driver_number'); // e.g. 1, 16, 4, etc.
            $table->string('first_name'); // e.g. Max, Charles, Lando, etc.
            $table->string('full_name'); // e.g. Max VERSTAPPEN, Charles LECLERC, Lando NORRIS, etc.
            $table->string('headshot_url'); // e.g. https://www.formula1.com/content/dam/fom-website/drivers/M/MAXVER01_Max_Verstappen/maxver01.png.transform/1col/image.png
            $table->string('last_name'); // e.g. Verstappen, Leclerc, Norris, etc.
            $table->integer('meeting_key'); // e.g. 1219, 1218, 1217, etc.
            $table->string('name_acronym'); // e.g. VER, LEC, NOR, etc.
            $table->integer('session_key'); // e.g. 9158, 9157, 9156, etc.
            $table->string('team_colour'); // e.g. 3671C6, 3671C6, 3671C6, etc.
            $table->string('team_name'); // e.g. Red Bull Racing, Ferrari, McLaren, etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
