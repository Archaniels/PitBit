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
        Schema::create('sessions', function (Blueprint $table) {
            // API Provided by openf1.org
            // Sample URL: https://api.openf1.org/v1/sessions?country_name=Belgium&session_name=Sprint&year=2023
            /*
                Provides information about sessions. A session refers to a distinct period of track 
                activity during a Grand Prix or testing weekend (practice, qualifying, sprint, race, ...).
            */
            $table->id();
            $table->integer('circuit_key');
            $table->string('circuit_short_name');
            $table->string('country_code');
            $table->integer('country_key');
            $table->string('country_name');
            $table->string('date_end');
            $table->string('date_start');
            $table->string('gmt_offset');
            $table->string('location');
            $table->integer('meeting_key');
            $table->integer('session_key');
            $table->string('session_name');
            $table->string('session_type');
            $table->integer('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
