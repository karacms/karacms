<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
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

    public function groups()
    {
        return $this->morphToMany('App\Group', 'groupable');
    }

    public function getAvatar()
    {
        return isset($this->avatar) ? $this->avatar : $this->getDefaultAvatar();        
    }

    private function getDefaultAvatar()
    {
        // @todo: Setting for default avatar
        $defaultAvatar = '/images/avatars/no-avatar.png';

        return $defaultAvatar;
    }

    public function getAvatarAttribute($value)
    {
        return isset($value) ? $value : $this->getDefaultAvatar();
    }

    public function getDisplayNameAttribute($value)
    {
        return $this->name;
    }
}
