<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChurchManager extends Model
{
    protected $table = 'churches_managers';
    protected $guarded = [];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }
}
