<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $table = 'teams_members';
    protected $guarded = [];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
