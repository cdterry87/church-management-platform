<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams_members_events';
    protected $guarded = [];

    public function teamMember()
    {
        return $this->belongsTo(TeamMember::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
