<?php
namespace App;

class Extension 
{
    public $props;

    public function __construct($props)
    {
        $this->props = $props;
        
        return $this;
    }

    public function __get($name)
    {
        return $this->props[$name] ?? null;
    }

    public function __set($name, $value)
    {
        $this->props[$name] = $value;
    }
}