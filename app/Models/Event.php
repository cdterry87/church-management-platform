<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $guarded = [];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        'is_recurring' => 'boolean',
    ];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }

    public function attendance()
    {
        return $this->hasMany(EventAttendance::class);
    }

    public function eventVolunteers()
    {
        return $this->hasMany(EventVolunteer::class);
    }
}
