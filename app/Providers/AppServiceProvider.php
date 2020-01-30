<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Content;

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
        Content::registerType([
            'slug' => 'post',
            'name' => 'Post',
            'description' => 'Built in Post',
            'fields' => [
                [
                    'type' => 'text',
                    'key' => 'title',
                    'title' => 'Title',
                    'description' => '',
                    'default' => '',
                    'position' => 'main',
                ],
                [
                    'type' => 'url',
                    'key' => 'redirect',
                    'title' => 'Redirection',
                    'description' => '',
                    'default' => '',
                    'position' => 'sidebar'
                ]
            ]
        ]);
    }
}
