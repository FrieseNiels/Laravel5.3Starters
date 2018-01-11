<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'is_subscribed', 'is_admin', 'status_id', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function widgets()
    {
        return $this->hasMany('App\Widget');
    }

    public function isAdmin(){
        return Auth::user()->is_admin == 1;
    }

    public function isActiveStatus(){
        return Auth::user()->status_id == 10;
    }
}
