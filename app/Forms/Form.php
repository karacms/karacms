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

        if (array_key_exists($key, $this->data['meta'])) {
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

    /**
     * Patch the form before saving the data, this is good for sanitizer
     */
    public function patch($data)
    {
        foreach ($data as $key => $value) {
            $field = $this->searchField($this->getFields(), $key);

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

    public function replaceField($fields, $key, $newData)
    {
        foreach ($fields as $index => $field) {
            if (isset($field['key']) && $field['key'] === $key) {
                $fields[$index] = $newData;
            }

            if (isset($field['fields'])) {
                $fields[$index]['fields'] = $this->replaceField($field['fields'], $key, $newData);
            }
        }

        return $fields;
    }

    public function getProp($name)
    {
        if (method_exists($this, 'get' . strtoupper($name))) {
            return call_user_func([$this, 'get' . strtoupper($name)]);
        }

        if (isset($this->props[$name])) {
            $value = $this->props[$name];
            return $value;
        }

        if (isset($this->$name)) {
            return $this->$name;
        }

        return null;
    }

    public function getFields()
    {
        if (isset($this->props['fields'])) {
            $fields = $this->props['fields'];
        }

        if (isset($this->fields)) {
            $fields = $this->fields;
        }

        $publishingFields = Publishing::getFields();
        $fields = $this->replaceField($fields, 'publishing', $publishingFields);

        return $fields;
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
        $fields = !is_null($fields) ? $fields : $this->getFields();
        
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