<?php
namespace App;

trait HasCreator
{
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function owns($object)
    {
         // Administrator owns everything and users owns null object
         if ($this->isAdmin() || $object === null) {
            return true;
        }

        // If current user is the reference
        if ($this->is($object)) {
            return true;
        }
        
        if (isset($object->creator_id)) {
            return $this->id === $object->creator_id;
        }
    }

    /**
     * Check if current user has permission
     *
     * @param $permission
     *
     * @return mixed
     */
    public function hasPermission($permission)
    {
        return $this->groups->contains(function ($group) use ($permission) {
            return $group->hasPermission($permission);
        });
    }

    public function isAdmin()
    {
        return $this->hasPermission('administrator');
    }

    /**
     * Check if current user in group by id or slug
     *
     * @param Integer/String $slug
     *
     * @return bool
     */
    public function inGroup($slug)
    {
        return $this->groups->contains(function ($group) use ($slug) {
            return $group->slug === $slug || $group->id === $slug;
        });
    }
}