<?php

namespace App\Extensions;

interface ExtensionInterface
{
    public function init(): void;
    
    public function onActivate(): void;

    public function onDeactivate(): void;

    public function onUninstall(): void;
}