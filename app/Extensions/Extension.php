<?php
namespace App\Extensions;

use App\EasyCall;

abstract class BaseExtension
{
    use EasyCall;

    public function __get(string $name)
    {
        return $this->$name ?? null;
    }

    public function __set(string $name, $value)
    {
        $this->$name = $value;

        return $this;
    }

    abstract public function init();

    abstract public function onActivate();

    abstract public function onDeactivate();

    abstract public function onUninstall();
}