<?php

namespace app\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
class User extends  Model implements AuthenticatableContract, CanResetPasswordContract
{
//
    use Authenticatable, CanResetPassword;
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'username', 'email', 'password', 'image_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles()
    {
        return $this->hasMany('app\Article', 'user_id');//duza litera?
    }

    public function comments()
    {
        return $this->hasMany('App\Comments', 'user_id');
    }

    public function Profile()
    {
        return $this->hasOne('app\Profile');
    }

    public function Image()
    {
        return $this->hasOne('app\Image', 'user_id');
    }
//    public function roles(){
//        return $this->belongsToMany('App\Models\Role');
//    }
}
