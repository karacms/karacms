<?php

use App\Hooks\Hook;

function add_event($actionName, $callback, int $priority = 10)
{
    return Hook::add($actionName, $callback, $priority);
}

function fire_event($action)
{
    return Hook::process($action);
}