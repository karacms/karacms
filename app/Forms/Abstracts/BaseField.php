<?php

namespace App\Forms\Abstracts;

use App\Forms\Form;

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
        return $this->props[$name] ?? null;
    }

    protected function getDefaultValue()
    {
        return $this->getProp('default');
    }

    public function getComputedData()
    {
        $key = $this->getProp('key');

        return $this->form->getFieldData($key, $this->getDefaultValue());
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

    public function renderFields($fields = null)
    {
        $fields = $fields ?? $this->getProp('fields');

        return $this->form->renderFields($this->getProp('fields'));
    }

    public function render()
    {
        $computedData = $this->getComputedData();
        
        $field = $this->getProps();
        $field['default'] = $computedData ?? $field['default'] ?? null;

        return view($this->getViewPath(), [
            'field' => $this
        ]);
    }
}