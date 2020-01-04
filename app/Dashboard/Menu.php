<?php
namespace App\Dashboard;

class Menu {
    public static $items;

    public static function add($item)
    {
        self::$items = array_push(self::$items, $item);
    }

    public static function get($items)
    {

    }

    public static function all()
    {
        return self::$items;
    }
}