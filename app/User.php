<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Impersonatable, HasCreator, HasMeta;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
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

    private function getDefaultAvatar()
    {
        // @todo: Setting for default avatar
        $defaultAvatar = '/images/avatars/no-avatar.png';

        return $defaultAvatar;
    }

    public function getAvatarAttribute($value)
    {
        return isset($value) ? url('storage/avatars/' . $value) : $this->getDefaultAvatar();
    }

    public function getDisplayNameAttribute($value)
    {
        return isset($value) ? $value : $this->name;
    }

    public function getRoleAttribute($value)
    {
        return $this->groups()->type('role')->first();
    }
    
}
