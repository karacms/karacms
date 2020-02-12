<?php
namespace App;

class ExtensionsManager
{
    public static $extensions = [];

    public static function register($extensionProps)
    {
        self::$extensions[$extensionProps['name']] = new Extension($extensionProps);
    }

    public static function all()
    {
        return self::$extensions;
    }

    public static function load()
    {
        $activatedExtensions = Setting::get('activated_extensions', []);

        if ($activatedExtensions === null || empty($activatedExtensions)) {
            return;
        }

        foreach ($activatedExtensions as $extensionName)
        {
            self::$extensions[$extensionName]->status = 'activated';

            require_once self::$extensions[$extensionName]->path . '/index.php';
        }
    }

    public static function activate($extensionName)
    {
        if (is_string($extensionName)) {
            $extensionName = [$extensionName];
        }

        return Setting::merge('activated_extensions', $extensionName);
    }

    public static function deactivate($extensionName)
    {
        if (is_string($extensionName)) {
            $extensionName = [$extensionName];
        }

        return Setting::diff('activated_extensions', $extensionName);
    }
}