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
            'positions' => [
                'main' => ['title', 'content'],
                'sidebar' => ['redirect', 'category']
            ],
            'fields' => [
                'sidebar' => [
                    [
                        'type' => 'url',
                        'key' => 'redirect',
                        'title' => 'Redirection',
                        'description' => '',
                        'default' => '',
                    ],
                    [
                        'type' => 'group',
                        'key' => 'category',
                        'title' => 'Categories',
                        'description' => 'Select categories',
                    ]
                ],
                'main' => [
                    [
                        'type' => 'text',
                        'key' => 'title',
                        'title' => 'Title',
                        'placeholder' => 'Enter title...',
                        'description' => '',
                        'default' => '',
                        'position' => 'main',
                    ],

                    [
                        'type' => 'text',
                        'key' => 'description',
                        'title' => 'Description',
                        'description' => '',
                        'default' => '',
                        'position' => 'main',
                    ],

                    [
                        'type' => 'textarea',
                        'key' => 'content',
                        'title' => 'Content',
                        'description' => '',
                        'default' => '',
                        'position' => 'main',
                        'rows' => 15
                    ],
                ]
            ]
        ]);
    }
}
