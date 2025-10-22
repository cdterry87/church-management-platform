<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutreachVolunteer extends Model
{
    protected $table = 'outreach_volunteers';

    protected $guarded = [];

    protected $casts = [
        'hours_served' => 'decimal:2',
    ];

    public function project()
    {
        return $this->belongsTo(OutreachProject::class, 'project_id');
    }

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class, 'volunteer_id');
    }
}
