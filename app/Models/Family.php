<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Family extends Model
{
    use HasFactory;

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
