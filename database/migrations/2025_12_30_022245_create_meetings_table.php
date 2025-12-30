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
        Schema::create('meetings', function (Blueprint $table) {
            // API Provided by openf1.org
            // Sample URL: https://api.openf1.org/v1/meetings?year=2023&country_name=Singapore
            /*
                Provides information about meetings. A meeting refers to a Grand Prix or testing weekend 
                and usually includes multiple sessions (practice, qualifying, race, ...).
            */
            $table->id();
            $table->integer('circuit_key');
            $table->string('circuit_short_name');
            $table->string('country_code');
            $table->integer('country_key');
            $table->string('country_name');
            $table->string('date_start');
            $table->string('gmt_offset');
            $table->string('location');
            $table->integer('meeting_key');
            $table->string('meeting_name');
            $table->string('meeting_official_name');
            $table->integer('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
