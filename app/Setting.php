<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'options', 'instance_id'];

    /**
     * @todo: Support $instance_id
     */
    public static function get($name, $default = null, $instance_id = null)
    {
        $setting = self::where(self::getScope($name, $instance_id))->first();
  
        if ( ! is_null($setting)) {
            
            $options = $setting->options;
            
            // Convert to array if it's json
            if (is_string($options) && is_array(json_decode($options, true)) && (json_last_error() == JSON_ERROR_NONE)) {
                $options = json_decode($options, true);
            }
            
            return $options ?? $default;
        }

        if ( ! is_null(config('kara.default_settings.' . $name))) {
            return config('kara.default_settings.' . $name);
        }
        
        if ( ! is_null(config($name))) {
            return config($name);
        }
        
        return $default;
    }


    public static function set($name, $options, $instance_id = null)
    {
        if (is_array($options)) {
            $options = json_encode($options);
        }
        
        $update = compact('name', 'options', 'instance_id');
        
        return self::updateOrCreate(
            self::getScope($name, $instance_id),
            $update
        );
    }

    public static function merge($name, $options, $instance_id = null)
    {
        $old = self::get($name, [], $instance_id);
        $new = array_unique(array_merge($old, $options));

        return self::set($name, $new, $instance_id);
    }

    public static function diff($name, $options, $instance_id = null)
    {
        $old = self::get($name, [], $instance_id);
        $new = array_unique(array_diff($old, $options));
        return self::set($name, $new, $instance_id);
    }

    public static function remove($name, $instance_id)
    {
        $setting = self::where(self::getScope($name, $instance_id))->first();

        return $setting->delete();
    }

     /**
     * Helper to build ->where()
     *
     * @param      $name
     * @param integer $instance
     *
     * @return array
     */
    private static function getScope($name, $instance_id = null)
    {
        $where = compact('name');
        
        if ( ! is_null($instance_id)) {
            $where['instance_id'] = $instance_id;
        }
        
        return $where;
    }
}