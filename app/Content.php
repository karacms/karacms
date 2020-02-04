<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasMeta, HasCreator;
    
    protected $fillable = ['creator_id', 'title', 'description', 'slug', 'content', 'meta', 'status', 'type', 'instance_id', 'created_at', 'updated_at'];

    protected $guaded = ['_token', '_method'];

    protected $casts = [
        'meta' => 'json'
    ];

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
