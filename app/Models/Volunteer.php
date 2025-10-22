<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $table = 'volunteers';

    protected $guarded = [];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function eventAssignments()
    {
        return $this->hasMany(EventVolunteer::class);
    }

    public function outreachParticipations()
    {
        return $this->hasMany(OutreachVolunteer::class, 'volunteer_id');
    }
}
