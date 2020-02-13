<?php

namespace App\Hooks;

use App\EasyCall;

class Hook
{
    use EasyCall, Singleton;

    /**
     * All listeners
     * 
     * @var array
     */
    private $actions = [];

    /**
     * Add Event Listener
     * 
     * @param String $actionName Listener name
     * @param String/callable $callback Callback
     * @param int $priority
     * 
     * @return void
     */
    private function add(string $actionName, $callback, $priority = 10, $alias = null)
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
                if (is_callable($callback)) {
                    call_user_func_array($callback, $args);
                    continue;
                }

                if ($callback instanceof \Illuminate\View\View) {
                    echo $callback->render();
                }

                if (is_string($callback)) {
                    echo $callback;
                }
            }
        }
    }
}