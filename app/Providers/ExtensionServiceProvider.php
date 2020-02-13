<?php

namespace App\Providers;

use App\Extensions\ExtensionsManager;
use Illuminate\Support\ServiceProvider;
use App\Setting;
use Illuminate\Support\Facades\Artisan;

class ExtensionServiceProvider extends ServiceProvider
{
    public $singletons = [
        ExtensionsManager::class => ExtensionsManager::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function boot(ExtensionsManager $em)
    {
        $allExtensions = $em->all();
        $activatedExtensions = Setting::get('activated_extensions', []);

        foreach ($allExtensions as $name => $extension) {
            
            $em->onActivate($extension->name, function () use ($extension) {
                if (file_exists($extension->path . '/public')) {
                    $this->publishes([
                        $extension->path . '/public' => public_path('vendor/' . $extension->name)
                    ], $extension->name);

                    Artisan::call("vendor:publish --tag={$extension->name} --force");
                }

                if (file_exists($extension->path . '/migrations')) {
                    $this->loadMigrationsFrom($extension->path . '/migrations');
                    $migrationsRelativePath = "extensions/{$extension->name}/migrations";
                    Artisan::call('migrate --path="' . $migrationsRelativePath . '" --force');
                }
            });

            // $em->onDeactivate($extension->name, function () use ($extension) {
            //     // 
            // });

            // $em->onUninstall($extension->name, function () use ($extension) {
            //     // Migrate down
            // });

            if (in_array($name, $activatedExtensions)) {
                $extension->status = 'activated';
            
                if (file_exists($extension->path . '/config.php')) {
                    $this->mergeConfigFrom($extension->path . '/config.php', $extension->name);
                }

                // Load extension views
                if (file_exists($extension->path . '/views')) {
                    $this->loadViewsFrom($extension->path . '/views', $extension->name);
                }

                if (file_exists($extension->path . '/factories')) {
                    $this->loadFactoriesFrom($extension->path . '/factories');
                }
                
                if (file_exists($extension->path . '/routes.php')) {
                    $this->loadRoutesFrom($extension->path . '/routes.php');
                }

                if (file_exists($extension->path . '/translations')) {
                    $this->loadTranslationsFrom($extension->path . '/translations', $extension->name);
                }
                
                $extension->init();
            }
        }
    }
}
