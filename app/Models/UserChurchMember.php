<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserChurchMember extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'church-member';
    protected $table = 'users_church_members';

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
