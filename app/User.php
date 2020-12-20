<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password', 'phone', 'kecamatan', 'address'
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
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    public function hasAnyRoles()
    {
        return null != $this->roles()->whereIn('name', $roles)->first();
    }
    public function hasAnyRole($role)
    {
        return null != $this->roles()->where('name', $role)->first();
    }
    
    
    public function order()
    {
        return $this->hasMany('App\Order', 'user_id');
    }
    public function role_user()
    {
        return $this->hasMany('App\Role_User', 'user_id');
    }
    public function product()
    {
        return $this->hasMany('App\Product', 'user_id');
    }
}
