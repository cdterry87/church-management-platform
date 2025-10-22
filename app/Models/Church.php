<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    use HasFactory;

    protected $table = 'churches';

    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function people()
    {
        return $this->hasMany(Person::class);
    }

    public function families()
    {
        return $this->hasMany(Family::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function volunteers()
    {
        return $this->hasMany(Volunteer::class);
    }

    public function outreachProjects()
    {
        return $this->hasMany(OutreachProject::class);
    }
}
