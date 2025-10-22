<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $table = 'donations';

    protected $guarded = [];

    protected $casts = [
        'amount' => 'decimal:2',
        'donated_at' => 'datetime',
    ];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
