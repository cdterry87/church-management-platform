<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    protected $table = 'churches';
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function staffMembers()
    {
        return $this->hasMany(StaffMember::class);
    }
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
    public function ministries()
    {
        return $this->hasMany(Ministry::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function mediaSeries()
    {
        return $this->hasMany(MediaSeries::class);
    }
    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
