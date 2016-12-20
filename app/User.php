<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /*use Notifiable;*/

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

    public function hasRole() {
        return $this->belongsToMany('App\Role');
    }

    public function assignRole() {
        return $this->belongsToMany('App\Role');
    }

    public function social() {
        return $this->hasMany('App\Social');
    }

    public function berita() {
        return $this->belongsToMany('App\Berita');
    }
    

}
