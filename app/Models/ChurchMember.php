<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChurchMember extends Model
{
    protected $table = 'churches_members';
    protected $guarded = [];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }
}
