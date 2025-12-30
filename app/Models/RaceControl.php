<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RaceControl extends Model
{
    protected $fillable = [
        'category',
        'date',
        'driver_number',
        'flag',
        'lap_number',
        'meeting_key',
        'message',
        'scope',
        'sector',
        'session_key',
    ];

    protected $casts = [
        'driver_number' => 'integer',
        'lap_number' => 'integer',
        'meeting_key' => 'integer',
        'sector' => 'integer',
        'session_key' => 'integer',
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
        return $this->belongsTo(Sessions::class, 'session_key', 'session_key');
    }
}
