<?php

namespace App\Http\Middleware;

use Closure;
use App\Content;
use Illuminate\Support\Carbon;

class Form
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Content::registerType([
            'slug' => 'page',
            'name' => 'Page',
            'description' => 'Page',
            'fields' => [
                [
                    'type' => 'row',
                    'fields' => [
                        [
                            'type' => 'column',
                            'class' => 'flex-1',
                            'fields' => [
                                [
                                    'type' => 'text',
                                    'key' => 'title',
                                    'title' => 'Title',
                                    'class' => ':inherit mr-3',
                                    'placeholder' => 'Please enter title...'
                                ],
                            ]
                            ],
                            [
                                'type' => 'column',
                                'class' => 'ml-3',
                                'fields' => [
                                    [
                                        'type' => 'submit',
                                        'class' => ':inherit',
                                        'title' => 'Save Changes'
                                    ]
                                ]
                            ]
                    ] 
                ]

            ]
        ]);

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
                            'class' => 'mr-6',
                            'fields' => [
                                [
                                    'type' => 'hidden',
                                    'key' => 'creator_id',
                                    'default' => 1
                                ],
                                [
                                    'type' => 'hidden',
                                    'key' => 'type',
                                    'default' => 'post'
                                ],
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
                                ],
            
                                [
                                    'type' => 'text',
                                    'key' => 'description',
                                    'title' => 'Description',
                                    'placeholder' => 'Enter description',
                                    'description' => '',
                                    'default' => '',
                                ],
            
                                [
                                    'type' => 'block-editor',
                                    'key' => 'content',
                                    'description' => '',
                                    'default' => '{}',
                                ],
            
                                [
                                    'type' => 'rich-text',
                                    'key' => 'excerpt',
                                    'description' => 'Excerpt',
                                    'placeholder' => 'Enter excerpt',
                                    'default' => '',
                                ],
                            
                            ]
                            ],
                        [
                            'type' => 'column',
                            'id' => 'sidebar',
                            'fields' => [
                                [
                                    'type' => 'publishing',
                                    'key' => 'publishing',
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

        return $next($request);
    }
}
