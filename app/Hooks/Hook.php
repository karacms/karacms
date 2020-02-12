<?php

namespace App\Hooks;

use App\EasyCall;

class Hook
{
    use EasyCall, Singleton;

    private $actions = [];

    private function add($actionName, Callable $callback, $priority = 10, $alias = null)
    {
        if (!isset($this->actions[$actionName])) {
            $this->actions[$actionName] = [];
        }

        if (!isset($this->actions[$actionName][$priority])) {
            $this->actions[$actionName][$priority] = [];
        }

        $this->actions[$actionName][$priority][] = $callback;
    }

    private function process($action)
    {
        $args = [];

        if (is_string($action)) {
            $actionName = $action;
        } else {
            $actionName = $action[0];
            if (count($action) > 1) {
                array_shift($action); // $action now becomes $args;
                $args = $action;
            }
        }

        if (empty($this->actions) || empty($this->actions[$actionName])) {
            return;
        }
        
        $allHooks = $this->actions[$actionName];
    
        foreach ($allHooks as $priority => $callbacks) {
            foreach ($callbacks as $callback) {
                call_user_func_array($callback, $args);
            }
        }
    }
}