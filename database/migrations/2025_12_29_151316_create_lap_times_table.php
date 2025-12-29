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
            $table->id();
            $table->foreignId('race_id')->constrained()->onDelete('cascade');
            $table->foreignId('driver_id')->constrained()->onDelete('cascade');
            $table->integer('lap_number');
            $table->decimal('lap_time', 8, 3); // seconds with milliseconds
            $table->decimal('sector_1', 8, 3)->nullable();
            $table->decimal('sector_2', 8, 3)->nullable();
            $table->decimal('sector_3', 8, 3)->nullable();
            $table->integer('position');
            $table->boolean('is_pit_lap')->default(false);
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
