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
                    ],
                ],
                'main' => [
                    [
                        'type' => 'tabs',
                        'panes' => [
                            [
                                'title' => 'First Pane',
                                'fields' => [
                                    [
                                        'type' => 'text',
                                        'key' => 'seo_title',
                                        'title' => 'SEO Title',
                                        'placeholder' => 'Enter SEO title...',
                                        'description' => '',
                                        'default' => '',
                                    ],
                                ]
                            ],

                            [
                                'title' => 'Second Pane',
                                'fields' => [
                                    [
                                        'type' => 'text',
                                        'key' => 'seo_title',
                                        'title' => 'SEO Title',
                                        'placeholder' => 'Enter SEO title...',
                                        'description' => '',
                                        'default' => '',
                                    ],
                                ]
                            ]
                        ],
                    ],
                    [
                        'type' => 'card',
                        'title' => 'Card Title',
                        'fields' => 'Fields',
                        'key' => 'card',
                        'fields' => [
                            [
                                    'type' => 'text',
                                    'key' => 'seo_title',
                                    'title' => 'SEO Title',
                                    'placeholder' => 'Enter SEO title...',
                                    'description' => '',
                                    'default' => '',
                            ],

                            [
                                'type' => 'textarea',
                                'key' => 'seo_description',
                                'title' => 'SEO description',
                                'placeholder' => 'Enter SEO description...',
                                'description' => '',
                                'default' => '',
                            ]
                        ]
                    ],
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
                        'placeholder' => 'Enter description',
                        'description' => '',
                        'default' => '',
                        'position' => 'main',
                    ],

                    [
                        'type' => 'editorjs',
                        'key' => 'content',
                        'description' => '',
                        'default' => '',
                        'position' => 'main',
                    ],

                    [
                        'type' => 'quill',
                        'key' => 'excerpt',
                        'description' => 'Excerpt',
                        'placeholder' => 'Enter excerpt',
                        'default' => '',
                        'position' => 'main',
                    ],
                ]
            ]
        ]);
    }
}
