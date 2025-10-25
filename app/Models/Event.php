<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $guarded = [];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }
}
