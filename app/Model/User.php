<?php

namespace App\Model;

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
        'username', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }

    public function provider()
    {
        return $this->hasOne(Partner::class,'user_id', 'id');
    }

    public function getAvatarAttribute()
    {
        $hash = md5(strtolower(trim($this->email))) . '.jpeg' . '?s=106&d=mm&r=g';
        return "https://secure.gravatar.com/avatar/$hash";
    }

    public function isPartner()
    {
        return $this->provider()->exists();
    }
}
