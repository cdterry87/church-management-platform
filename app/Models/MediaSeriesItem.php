<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaSeriesItem extends Model
{
    protected $table = 'media_series_items';
    protected $guarded = [];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }

    public function mediaSeries()
    {
        return $this->belongsTo(MediaSeries::class);
    }
}
