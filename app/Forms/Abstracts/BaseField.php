<?php

namespace App\Forms\Abstracts;

use App\Forms\Form;
use Illuminate\Support\Str;

abstract class BaseField
{
    public $form;

    public $props = [];

    public function __construct($props = [], $form = null)
    {
        $this->props = $props;
        $this->form = $form;
    }

    public function setForm(Form $form)
    {
        $this->form = $form;
    }

    public function getForm()
    {
        return $this->form;
    }

    public function getProps()
    {
        return $this->props;
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

    public function getDefault()
    {
        $key = $this->getProp('key');
        $default = $this->props['default'] ?? null;

        return $this->form->getFieldData($key, $default);
    }

    public function getViewPath()
    {
        if (isset($this->viewPath)) {
            return $this->viewPath;
        }

        $viewName = $this->getProp('type');

        return 'attributes/fields/' . $viewName;
    }

    public function __get($prop)
    {
        return $this->getProp($prop);
    }

    public function __set($prop, $value)
    {
        $this->$prop = $value;
    }

    public function renderFields($fields = null)
    {
        $fields = $fields ?? $this->getProp('fields');

        return $this->form->renderFields($fields);
    }

    public function render()
    {
        return view($this->getViewPath(), [
            'field' => $this
        ]);
    }
}