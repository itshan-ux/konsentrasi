<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User_232187 extends Authenticatable
{
    use Notifiable;

    protected $table = 'users_232187';
    protected $primaryKey = 'id_232187';

    protected $fillable = [
        'name_232187',
        'email_232187',
        'password_232187',
        'role_232187',
    ];

    protected $hidden = [
        'password_232187',
    ];

    public $timestamps = false; 

    public function getAuthPassword()
    {
        return $this->password_232187;
    }
}
