<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['author_id', 'title', 'slug', 'content', 'meta', 'status', 'type', 'instance_id'];

    public static $types = [];

    public function types()
    {
        return $this->morphToMany('App\Group', 'groupable');
    }

    public function scopeType($query, $value = null)
    {
        return $value ? $query->where('type', $value) : $query;
    }

    public static function registerType($type)
    {
        self::$types[$type['slug']] = $type;
    }

    public static function getAllTypes()
    {
        $registeredByCode = self::$types;

        $types = new self;
        $types = $types->types()->get();
        
        return $registeredByCode;
    }

    public static function getType($slug)
    {
        $allTypes = self::getAllTypes();

        return $allTypes[$slug];
    }
}
