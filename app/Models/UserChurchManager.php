<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserChurchManager extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'church-manager';
    protected $table = 'users_church_managers';

    protected $fillable = [
        'church_id',
        'name',
        'email',
        'password',
        'photo_path'
    ];

    protected $hidden = ['password', 'remember_token'];

    public function church()
    {
        return $this->belongsTo(Church::class);
    }
}
