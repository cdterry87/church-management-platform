<?php

namespace App\Filament\ChurchManager\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait HasChurchScope
{
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        $user = Auth::user();

        if ($user && $user->church_id) {
            $query->where('church_id', $user->church_id);
        }

        return $query;
    }
}
