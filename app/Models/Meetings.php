<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Meetings extends Model
{
    protected $fillable = [
        'circuit_key',
        'circuit_short_name',
        'country_code',
        'country_key',
        'country_name',
        'date_start',
        'gmt_offset',
        'location',
        'meeting_key',
        'meeting_name',
        'meeting_official_name',
        'year',
    ];

    protected $casts = [
        'circuit_key' => 'integer',
        'country_key' => 'integer',
        'meeting_key' => 'integer',
        'year' => 'integer',
    ];

    public function sessions(): HasMany
    {
        return $this->hasMany(RaceSessions::class, 'meeting_key', 'meeting_key');
    }

    public function lapTimes(): HasMany
    {
        return $this->hasMany(LapTime::class, 'meeting_key', 'meeting_key');
    }

    public function weather(): HasMany
    {
        return $this->hasMany(Weather::class, 'meeting_key', 'meeting_key');
    }

    public function stints(): HasMany
    {
        return $this->hasMany(Stints::class, 'meeting_key', 'meeting_key');
    }

    public function carData(): HasMany
    {
        return $this->hasMany(CarData::class, 'meeting_key', 'meeting_key');
    }

    public function pits(): HasMany
    {
        return $this->hasMany(Pit::class, 'meeting_key', 'meeting_key');
    }

    public function positions(): HasMany
    {
        return $this->hasMany(Position::class, 'meeting_key', 'meeting_key');
    }

    public function raceControls(): HasMany
    {
        return $this->hasMany(RaceControl::class, 'meeting_key', 'meeting_key');
    }
}
