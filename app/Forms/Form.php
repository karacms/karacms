<?php
namespace App\Forms;

use App\EasyCall;
use App\Forms\Fields\Publishing;
use Illuminate\Support\Str;

class Form
{
    use EasyCall;

    protected $props = [];

    public function __construct($props = [])
    {
        $this->props = $props;
    }

    public function getFieldData($key, $default = null)
    {

        if (isset($this->data->$key)) {
            return $this->data->$key;
        }

        if (isset($this->data[$key])) {
            return $this->data[$key];
        }

        if (isset($this->data['meta'][$key])) {
            return $this->data['meta'][$key];
        }

        if (is_object($this->data) && method_exists($this->data, 'data')) {
            $data = $this->data->data($key);

            return $data ?? $default;
        }    
    

        return $default;
    }

    private function render($props = [])
    {
        if (!empty($props)) {
            $this->props = $props;
        }

        return view('attributes/form', [
            'form' => $this
        ]);
    }

    public function patch($data)
    {
        foreach ($data as $key => $value)
        {
            $field = $this->searchField($this->fields, $key);
            
            if ($field === false) { continue; }
            
            $fieldType = $field['type'] ?? 'text';
            $className = str_replace('-', '', Str::title($fieldType));
            $className = "App\\Forms\\Fields\\$className";
            $class = new $className($field, $this);
            
            if (method_exists($class, 'patch')) {
                $data[$key] = $class->patch($value);
            }
        }

        return $data;
    }

    public function searchField($fields, $key)
    {   
        foreach ($fields as $field) {
        
            if (isset($field['key']) && $field['key'] === $key) {
                return $field;
            }

            if (isset($field['fields'])) {
                $recursive = $this->searchField($field['fields'], $key);
                if ($recursive !== false) {
                    return $recursive;
                }
            }
        }

        return false;
    }

    public function getProp($name)
    {
        if (method_exists($this, 'get' . strtoupper($name))) {
            return call_user_func([$this, 'get' . strtoupper($name)]);
        }

        if (isset($this->props[$name])) {
            $value = $this->props[$name];

            if (isset($this->$name)) {
                $value = str_replace(':inherit', $this->$name, $value);
            }

            return $value;
        }

        if (isset($this->$name)) {
            return $this->$name;
        }

        return null;
    }

    
    public function __get($prop)
    {
        return $this->getProp($prop);
    }

    public function __set($key, $value)
    {
        $this->$key = $value;
    }


    public function renderFields($fields = null)
    {
        $fields = $fields ?? $this->fields;

        $output = '';
       
        foreach ($fields as $field) {
            $output .= $this->renderField($field);
        }

        return $output;
    }

    protected function renderField($field)
    {
        $fieldType = $field['type'] ?? 'text';
        $className = str_replace('-', '', Str::title($fieldType));

        $className = "App\\Forms\\Fields\\$className";
        $class = new $className($field, $this);

        return $class->render();
    }
}