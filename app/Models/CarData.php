<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarData extends Model
{
    protected $fillable = [
        'brake',
        'date',
        'driver_number',
        'drs',
        'meeting_key',
        'n_gear',
        'rpm',
        'session_key',
        'speed',
        'throttle',
    ];

    protected $casts = [
        'brake' => 'integer',
        'driver_number' => 'integer',
        'drs' => 'integer',
        'meeting_key' => 'integer',
        'n_gear' => 'integer',
        'rpm' => 'integer',
        'session_key' => 'integer',
        'speed' => 'integer',
        'throttle' => 'integer',
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
