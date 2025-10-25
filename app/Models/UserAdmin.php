<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserAdmin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
    protected $table = 'users_admins';

    protected $fillable = ['name', 'email', 'password', 'photo_path'];
    protected $hidden = ['password', 'remember_token'];
}
