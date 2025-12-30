<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Driver extends Model
{
    protected $fillable = [
        'broadcast_name',
        'country_code',
        'driver_number',
        'first_name',
        'full_name',
        'headshot_url',
        'last_name',
        'meeting_key',
        'name_acronym',
        'session_key',
        'team_colour',
        'team_name',
    ];

    protected $casts = [
        'driver_number' => 'integer',
        'meeting_key' => 'integer',
        'session_key' => 'integer',
    ];

    public function lapTimes(): HasMany
    {
        return $this->hasMany(LapTime::class, 'driver_number', 'driver_number');
    }

    public function carData(): HasMany
    {
        return $this->hasMany(CarData::class, 'driver_number', 'driver_number');
    }

    public function stints(): HasMany
    {
        return $this->hasMany(Stints::class, 'driver_number', 'driver_number');
    }

    public function pits(): HasMany
    {
        return $this->hasMany(Pit::class, 'driver_number', 'driver_number');
    }

    public function positions(): HasMany
    {
        return $this->hasMany(Position::class, 'driver_number', 'driver_number');
    }
}
