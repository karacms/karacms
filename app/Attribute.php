<?php
namespace App;

use Illuminate\Support\Facades\Blade;

class Attribute
{
    public static function renderAll($fields)
    {
        $template = '';

        foreach ($fields as $field) {
            $template .= self::render($field);
        }

        return $template;
    }

    public static function render($field)
    {
        $fieldType = $field['type'] ?? 'text';
     
        return view('attributes/fields/' . $fieldType, compact('field'));
    }
}