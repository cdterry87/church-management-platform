<?php

namespace App\Traits;

use App\Models\Scopes\ChurchScope;
use Illuminate\Database\Eloquent\Builder;

trait BelongsToChurch
{
    protected static function bootBelongsToChurch()
    {
        static::addGlobalScope(new ChurchScope());

        static::creating(function ($model) {
            if (auth()->check() && auth()->user()->church_id && empty($model->church_id)) {
                $model->church_id = auth()->user()->church_id;
            }
        });
    }

    public function church()
    {
        return $this->belongsTo(\App\Models\Church::class);
    }

    /**
     * Scope manually to the current church if you need to disable global scope.
     */
    public function scopeForCurrentChurch(Builder $query)
    {
        return $query->where('church_id', auth()->user()->church_id ?? null);
    }
}
