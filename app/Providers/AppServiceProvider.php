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
                    'type' => 'row',
                    'class' => 'mt-3',
                    'fields' => [
                        [
                            'type' => 'column',
                            'id' => 'main-section',
                            'class' => 'mr-3',
                            'fields' => [
                                [
                                    'type' => 'tabs',
                                    'position' => 'top',
                                    'fields' => [
                                        [
                                            'type' => 'pane',
                                            'id' => 'basics',
                                            'title' => 'Basics',
                                            'fields' => [
                                                [
                                                    'type' => 'tel',
                                                    'key' => 'basics',
                                                    'title' => 'Phone number',
                                                    'placeholder' => '',
                                                    'description' => '',
                                                    'default' => '',
                                                ],
                                            ]
                                        ],
                                        [
                                            'type' => 'pane',
                                            'title' => 'Advanced',
                                            'fields' => [
                                                [
                                                    'type' => 'textarea',
                                                    'key' => 'address',
                                                    'title' => 'Address',
                                                    'placeholder' => 'Australia',
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
                                    'type' => 'block-editor',
                                    'key' => 'content',
                                    'description' => '',
                                    'default' => '',
                                    'position' => 'main',
                                ],
            
                                [
                                    'type' => 'rich-text',
                                    'key' => 'excerpt',
                                    'description' => 'Excerpt',
                                    'placeholder' => 'Enter excerpt',
                                    'default' => '',
                                    'position' => 'main',
                                ],
                            
                            ]
                            ],
                        [
                            'type' => 'column',
                            'id' => 'sidebar',
                            'fields' => [
                                [
                                    'type' => 'publishing',
                                    'id' => 'publishing'
                                ],
                                [
                                    'type' => 'url',
                                    'key' => 'redirect',
                                    'title' => 'Redirection',
                                    'description' => '',
                                    'default' => '',
                                ],
                            ]
                        ]
                    ]
                ],
            ]
        ]);
    }
}
