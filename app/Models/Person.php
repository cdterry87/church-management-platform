<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';

    protected $guarded = [];

    protected $casts = [
        'birthdate' => 'date',
    ];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function volunteers()
    {
        return $this->hasMany(Volunteer::class);
    }

    public function eventAttendance()
    {
        return $this->hasMany(EventAttendee::class);
    }

    // Convenience
    public function getFullNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->last_name}");
    }
}
