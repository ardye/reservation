<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'idUser';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','nama', 'password', 'telepon','status','gambar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function menu() {
        return $this->belongsToMany('App\Menu', 'review', 'idUser', 'idMenu');
    }

    public function booking() {
        return $this->hasMany('App\Booking', 'idUser');
    }
}
