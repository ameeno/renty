<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getRole()
    {
        return $this->hasOne('App\Role');
    }

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

    public function wirtePost()
    {
        return $this->hasOne('App\MessageBoard');
    }

    public $incrementing = false;
}
