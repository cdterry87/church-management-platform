<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutreachProject extends Model
{
    use HasFactory;

    protected $table = 'outreach_projects';

    protected $guarded = [];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }

    public function participants()
    {
        return $this->hasMany(OutreachVolunteer::class, 'project_id');
    }
}
