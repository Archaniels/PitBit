<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LapTime extends Model
{
    protected $fillable = [
        'race_id',
        'driver_id',
        'lap_number',
        'lap_time',
        'sector_1',
        'sector_2',
        'sector_3',
        'position',
        'is_pit_lap',
    ];

    protected $casts = [
        'lap_time' => 'decimal:3',
        'sector_1' => 'decimal:3',
        'sector_2' => 'decimal:3',
        'sector_3' => 'decimal:3',
        'is_pit_lap' => 'boolean',
    ];

    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
