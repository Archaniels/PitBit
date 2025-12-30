<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RaceSessions extends Model
{
    protected $fillable = [
        'circuit_key',
        'circuit_short_name',
        'country_code',
        'country_key',
        'country_name',
        'date_end',
        'date_start',
        'gmt_offset',
        'location',
        'meeting_key',
        'session_key',
        'session_name',
        'session_type',
        'year',
    ];

    protected $casts = [
        'circuit_key' => 'integer',
        'country_key' => 'integer',
        'meeting_key' => 'integer',
        'session_key' => 'integer',
        'year' => 'integer',
    ];

    public function meeting(): BelongsTo
    {
        return $this->belongsTo(Meetings::class, 'meeting_key', 'meeting_key');
    }

    public function lapTimes(): HasMany
    {
        return $this->hasMany(LapTime::class, 'session_key', 'session_key');
    }

    public function weather(): HasMany
    {
        return $this->hasMany(Weather::class, 'session_key', 'session_key');
    }

    public function stints(): HasMany
    {
        return $this->hasMany(Stints::class, 'session_key', 'session_key');
    }

    public function carData(): HasMany
    {
        return $this->hasMany(CarData::class, 'session_key', 'session_key');
    }

    public function pits(): HasMany
    {
        return $this->hasMany(Pit::class, 'session_key', 'session_key');
    }

    public function positions(): HasMany
    {
        return $this->hasMany(Position::class, 'session_key', 'session_key');
    }

    public function raceControls(): HasMany
    {
        return $this->hasMany(RaceControl::class, 'session_key', 'session_key');
    }
}
