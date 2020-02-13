<?php
namespace App\Extensions;

use App\Hooks\Hook;
use App\Hooks\Singleton;
use Illuminate\Support\Str;
use App\Setting;

class ExtensionsManager
{
    /**
     * All installed extensions. As name => extension instance
     * 
     * @var array
     */
    public $extensions = [];

    /**
     * Load all installed extensions in extensions directory and register
     * 
     * @since 0.1
     */
    public function __construct()
    {
        // Load extensions
        $extensionDirectories = array_filter(glob(base_path('extensions/*')), 'is_dir');

        foreach ($extensionDirectories as $extensionPath) {
   
            $extensionNamespace = Str::afterLast($extensionPath, '/');
            $extensionNamespace = Str::studly($extensionNamespace);
            
            $extensionClass = "\\KaraCMS\\Extensions\\{$extensionNamespace}\\Extension";
            $extension = new $extensionClass;
            $extension->path = $extensionPath;
            
            $this->register($extension);
        }
    }

    /**
     * Register an extension
     * 
     * @param $extensionProps Properties of an extension
     */
    public function register($extension): void
    {
        $this->extensions[$extension->name] = $extension;
    }

    /**
     * Load all installed extensions
     * 
     * @return array
     */
    public function all(): array
    {
        return $this->extensions;
    }

    /**
     * Activate an extension, or an array of extensions name
     */
    public function activate($extensionsName)
    {
        // If it's an extension name, convert to array format
        if (is_string($extensionsName)) {
            $extensionsName = [$extensionsName];
        }

        foreach ($extensionsName as $extensionName) {
            $extension = $this->extensions[$extensionName];

            // Fire @onActivate:extensionName event so other code can access and mofidy the data
            Hook::process(['onActivate:' . $extensionName, $extension]);
            
            // Also fire @onActivate event of the extension class
            $extension->onActivate();
        }

        return Setting::merge('activated_extensions', $extensionsName);
    }

    public function onActivate($extensionName, callable $callback)
    {
        Hook::add('onActivate:' . $extensionName, $callback);
    }

    public function deactivate($extensionsName)
    {
        if (is_string($extensionsName)) {
            $extensionsName = [$extensionsName];
        }

        foreach ($extensionsName as $extensionName) {
            $extension = $this->extensions[$extensionName];

            // Fire @onDeactivate:extensionName event so other code can access and mofidy the data
            Hook::process(['onActivate:' . $extensionName, $extension]);

            $extension->onDeactivate();
        }

        // @todo: Fire Extension::onDeactivate event
        return Setting::diff('activated_extensions', $extensionsName);
    }

    public function onDeactivate($extensionName, callable $callback)
    {
        Hook::add('onDeactivate:' . $extensionName, $callback);
    }

    public function uninstall($extensionName)
    {
        // User have to manually deactivate first
        $activatedExtensions = Setting::get('activated_extensions');

        if (in_array($extensionName, $activatedExtensions)) {
            throw new \Exception('You must have to deactivate the extension first');
        }

        $extension = $this->extensions[$extensionName];
        $extension->onUninstall();

        return \File::deleteDirectory($extension->path);
    }

    public function getExtension($name)
    {
        return $this->extensions[$name] ?? null;
    }
}