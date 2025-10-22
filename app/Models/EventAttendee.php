<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventAttendee extends Model
{
    protected $table = 'events_attendees';

    protected $guarded = [];

    protected $casts = [
        'attended' => 'boolean',
        'checked_in_at' => 'datetime',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
