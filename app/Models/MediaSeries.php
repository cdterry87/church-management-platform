<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaSeries extends Model
{
    protected $table = 'media_series';
    protected $guarded = [];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }
}
