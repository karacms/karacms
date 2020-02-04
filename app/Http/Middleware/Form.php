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
                                    'default' => $request->user()->id
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
                                    'type' => 'card',
                                    'id' => 'publishing',
                                    'title' => 'Publishing',
                                    'fields' => [
                                        [
                                            'type' => 'select',
                                            'key' => 'status',
                                            'id' => 'status',
                                            'title' => 'Status',
                                            'options' => [
                                                'draft' => 'Draft',
                                                'live' => 'Live'
                                            ],
                                            'default' => 'live'
                                        ],
                                        [
                                            'type' => 'datetime',
                                            'key' => 'created_at',
                                            'id' => 'created-at',
                                            'title' => 'Date Created',
                                            'default' => Carbon::now()->format('Y-m-d\TH:i')
                                        ],
                                        [
                                            'type' => 'datetime',
                                            'key' => 'updated_at',
                                            'id' => 'updated-at',
                                            'title' => 'Last Updated',
                                            'default' => Carbon::now()->format('Y-m-d\TH:i')
                                        ],
                                        [
                                            'type' => 'submit',
                                            'class' => 'p-2 rounded-sm bg-blue-500 text-white hover:bg-blue-700',
                                            'id' => 'submit',
                                            'title' => 'Save Changes'
                                        ]
                                    ]
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
