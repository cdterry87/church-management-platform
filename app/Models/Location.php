<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    protected $table = 'locations';
    protected $guarded = [];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }
}
