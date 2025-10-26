<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    use HasFactory;

    protected $table = 'churches';
    protected $guarded = [];

    public function members()
    {
        return $this->hasMany(ChurchMember::class);
    }

    public function managers()
    {
        return $this->hasMany(ChurchManager::class);
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
