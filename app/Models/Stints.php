<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stints extends Model
{
    protected $fillable = [
        'compound',
        'driver_number',
        'lap_end',
        'lap_start',
        'meeting_key',
        'session_key',
        'stint_number',
        'tyre_age_at_start',
    ];

    protected $casts = [
        'driver_number' => 'integer',
        'lap_end' => 'integer',
        'lap_start' => 'integer',
        'meeting_key' => 'integer',
        'session_key' => 'integer',
        'stint_number' => 'integer',
        'tyre_age_at_start' => 'integer',
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
