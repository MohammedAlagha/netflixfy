<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $withCount = ['movies'];

    //attribute------------------------

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt('$value');
    }
    // scope----------------------------------------------

    public function scopeWhereRole($query,$role_name)
    {
        return $query->whereHas('roles',function($q) use ($role_name){
            return $q->whereIn('name',(array)($role_name));
        });
    }

    public function scopeWhereRoleNot($query,$role_name)
    {
        return $query->whereHas('roles',function($q) use ($role_name){
            return $q->whereNotIn('name',(array)$role_name);
        });
    }


    //relations--------------------------------------------------------------------------------------------------

    public function movies(){
        return $this->belongsToMany(Movie::class,'users_movies');
    }
}
