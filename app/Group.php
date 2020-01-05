<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Group extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'meta', 'permissions', 'type'];

    protected $casts = [
        'meta' => 'json',
        'permissions' => 'json'
    ];

    public function users()
    {
        return $this->morphedByMany('App\User', 'groupable');
    }

    public function getSlugAttribute($value)
    {
        return empty($value) ? Str::slug($this->attributes['name']) : $value;
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = empty($value) ? Str::slug($this->attributes['name']) : $value;
    }
}
