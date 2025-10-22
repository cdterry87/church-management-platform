<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';

    protected $guarded = [];

    protected $casts = [
        'goal_amount' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }
}
