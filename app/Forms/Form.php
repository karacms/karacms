<?php
namespace App\Forms;

use App\EasyCall;
use Illuminate\Support\Str;

class Form
{
    use EasyCall;

    public $props = [];

    public function __construct($props = [])
    {
        $this->props = $props;    
    }

    public function setProps($props)
    {
        $this->props = $props;
    }

    public function setProp($key, $value = null)
    {
        $this->props[$key] = $value;
    }

    public function getProps()
    {
        return $this->props;
    }

    public function getProp($key, $default = null)
    {
        return $this->props[$key] ?? $default;
    }

    public function getFields()
    {
        return $this->getProp('fields');
    }

    public function getFieldData($key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }

    private function render($props)
    {
        $this->data = $props['data'];

        return $this->renderFields($props['fields']);
    }

    public function renderFields($fields)
    {
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