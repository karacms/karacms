<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Media extends Model
{
    use HasCreator, HasMeta;

    protected $fillable = [
        'title',
        'description',
        'data',
        'url',
        'meta',
        'type',
        'size',
        'creator_id',
        'instance_id',
        'parent_id',
        'created_at',
        'updated_at'
    ];

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

    public function scopeOfTag($query, $value)
    {
        if (empty($value)) {
            return $query;
        }

        return $query->whereHas('tags', function ($query) use ($value) {
            return $query->where('groups.id', $value);
        });
    }

    public function scopeOfType($query, $value)
    {
        if (!empty($value)) {
            return $query->where('type', 'LIKE', '%' . $value . '/%');
        }

        return $query;
    }

    public function isType(string $type)
    {
        return Str::startsWith($this->type, $type . '/');
    }

    public function isImage()
    {
        return $this->isType('image');
    }

    public function isAudio()
    {
        return $this->isType('audio');
    }

    public function isVideo()
    {
        return $this->isType('video');
    }

    public static function allAvailableTags()
    {
        return Group::where('type', 'media-tag')->get();
    }
}
