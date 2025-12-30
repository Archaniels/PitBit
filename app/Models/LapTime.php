<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LapTime extends Model
{
    protected $fillable = [
        'date_start',
        'driver_number',
        'duration_sector_1',
        'duration_sector_2',
        'duration_sector_3',
        'i1_speed',
        'i2_speed',
        'is_pit_out_lap',
        'lap_duration',
        'lap_number',
        'meeting_key',
        'segments_sector_1',
        'segments_sector_2',
        'segments_sector_3',
        'session_key',
        'st_speed',
    ];

    protected $casts = [
        'driver_number' => 'integer',
        'duration_sector_1' => 'decimal:3',
        'duration_sector_2' => 'decimal:3',
        'duration_sector_3' => 'decimal:3',
        'i1_speed' => 'integer',
        'i2_speed' => 'integer',
        'is_pit_out_lap' => 'boolean',
        'lap_duration' => 'decimal:3',
        'lap_number' => 'integer',
        'meeting_key' => 'integer',
        'segments_sector_1' => 'decimal:3',
        'segments_sector_2' => 'decimal:3',
        'segments_sector_3' => 'decimal:3',
        'session_key' => 'integer',
        'st_speed' => 'integer',
    ];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driver_number', 'driver_number');
    }

    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meetings::class, 'meeting_key', 'meeting_key');
    }

    public function session(): BelongsTo
    {
        return $this->belongsTo(RaceSessions::class, 'session_key', 'session_key');
    }
}
