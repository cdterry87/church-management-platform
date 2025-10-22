<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventVolunteer extends Model
{
    protected $table = 'events_volunteers';

    protected $guarded = [];

    protected $casts = [
        'checked_in' => 'boolean',
        'checked_in_at' => 'datetime',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }
}
