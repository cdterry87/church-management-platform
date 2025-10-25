<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffMember extends Model
{
    protected $table = 'staff_members';
    protected $guarded = [];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }
}
