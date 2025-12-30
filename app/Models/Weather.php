<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Weather extends Model
{
    protected $fillable = [
        'air_temperature',
        'date',
        'humidity',
        'meeting_key',
        'pressure',
        'rainfall',
        'session_key',
        'track_temperature',
        'wind_direction',
        'wind_speed',
    ];

    protected $casts = [
        'air_temperature' => 'decimal:2',
        'humidity' => 'integer',
        'meeting_key' => 'integer',
        'pressure' => 'decimal:2',
        'rainfall' => 'integer',
        'session_key' => 'integer',
        'track_temperature' => 'decimal:2',
        'wind_direction' => 'integer',
        'wind_speed' => 'decimal:2',
    ];

    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meetings::class, 'meeting_key', 'meeting_key');
    }

    public function session(): BelongsTo
    {
        return $this->belongsTo(RaceSessions::class, 'session_key', 'session_key');
    }
}
