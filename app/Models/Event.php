<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

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

    public function attendees()
    {
        return $this->hasMany(EventAttendee::class);
    }

    public function volunteers()
    {
        return $this->hasMany(EventVolunteer::class);
    }
}
