<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $table = 'families';

    protected $guarded = [];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }

    public function people()
    {
        return $this->hasMany(Person::class);
    }
}
