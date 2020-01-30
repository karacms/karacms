<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Kalnoy\Nestedset\NodeTrait;

class Group extends Model
{
    use NodeTrait;
    
    protected $fillable = ['name', 'slug', 'description', 'meta', 'permissions', 'type'];

    protected $casts = [
        'meta' => 'json',
        'permissions' => 'json'
    ];

    public function users()
    {
        return $this->morphedByMany(User::class, 'groupable');
    }

    /**
     * Check if group has specified permission
     *
     * @param String $permission
     *
     * @return bool
     */
    public function hasPermission($permission)
    {
        return (is_array($this->permissions) && isset($this->permissions[$permission]) && $this->permissions[$permission] == true) ||
               (isset($this->permissions['administrator']) && $this->permissions['administrator'] == true);
    }


    public function getSlugAttribute($value)
    {
        return empty($value) ? Str::slug($this->attributes['name']) : $value;
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = empty($value) ? Str::slug($this->attributes['name']) : $value;
    }

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }
}
