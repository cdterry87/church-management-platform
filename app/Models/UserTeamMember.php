<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserTeamMember extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'team-member';
    protected $table = 'users_team_members';

    protected $fillable = [
        'church_id',
        'team_id',
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

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
