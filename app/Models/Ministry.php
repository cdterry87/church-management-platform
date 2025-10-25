<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    protected $table = 'ministries';
    protected $guarded = [];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }
}
