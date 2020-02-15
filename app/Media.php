<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Media extends Model
{
    use HasCreator, HasMeta;

    protected $fillable = ['title', 'description', 'data', 'url', 'type', 'meta', 'creator_id'];

    protected $casts = [
        'meta' => 'json',
        'creator_id' => 'integer'
    ];

    public function tags()
    {
        return $this->morphToMany('App\Group', 'groupable');
    }

    public function original()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function variants()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
    
    public function getAvailableSizes()
    {
        //
    }

    public function resize()
    {
        //
    }

    public function isType(string $type)
    {
        return Str::startsWith($this->type, $type . '/');
    }

    public function isImage()
    {
        return $this->isType('image');
    }

    public static function allAvailableTags()
    {
        return Group::where('type', 'media-tag')->get();
    }
}
