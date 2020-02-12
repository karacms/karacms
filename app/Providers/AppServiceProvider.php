<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Content;
use App\ExtensionsManager;
use App\Setting;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('hook', function ($expression) {
            return "<?php \App\Hooks\Hook::process($expression); ?>";
        });

        // Load extensions
        $extensionDirectories = array_filter(glob(base_path('extensions/*')), 'is_dir');

        foreach ($extensionDirectories as $extensionPath) {
            // Check if extension definition file path exists
            $extensionDefinitionFilePath = $extensionPath . '/extension.json';
            if (!file_exists($extensionDefinitionFilePath)) {
                continue;
            }

            // Check if the format is json, and can be parsed
            $extensionDefinition = json_decode(file_get_contents($extensionDefinitionFilePath), true);
            if (!is_array($extensionDefinition)) {
                continue;
            }

            $extensionDefinition['path'] = $extensionPath;
            $extensionDefinition['status'] = 'installed';

            ExtensionsManager::register($extensionDefinition);
            
            // @todo: Only load views from activated extensions
            $this->loadViewsFrom($extensionPath . '/views', str_replace('/', '-', $extensionDefinition['name']));
        }

        ExtensionsManager::load();
    }
}
