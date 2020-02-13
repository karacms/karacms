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
            
            if (in_array($name, $activatedExtensions)) {
                $extension->status = 'activated';
            }

            $em->onActivate($extension->name, function () use ($extension) {
                if (file_exists($extension->path . '/public')) {
                    $this->publishes([
                        $extension->path . '/public' => public_path('vendor/' . $extension->name)
                    ], $extension->name);
                }

                Artisan::call("vendor:publish --tag={$extension->name} --force");
            });

            // Load extension views
            $this->loadViewsFrom($extension->path . '/views', $extension->name);
            
            $extension->init();
        }
    }
}
