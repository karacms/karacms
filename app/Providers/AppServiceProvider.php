<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Content;
use App\Extensions\ExtensionsManager;
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
        Blade::directive('fire', function ($expression) {
            return "<?php \App\Hooks\Hook::process($expression); ?>";
        });
    }
}
