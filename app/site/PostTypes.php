<?php

namespace App;

class PostTypes
{
    public function __construct()
    {
        add_action('init', [$this, 'registerPostTypes']);
    }

    /**
     * Register custom post types
     * @return void
     */
    public function registerPostTypes()
    {
        register_post_type('article', [
            'labels'                => [
                'name'                => __('Articles'),
                'singular_name'       => __('Article'),
                'add_new'             => __('Add Article'),
                'add_new_item'        => __('Add New Article'),
                'edit_item'           => __('Edit Article'),
            ],
            'public'                => true,
            'has_archive'           => true,
            'rewrite'               => ['slug' => 'article'],
            'supports'              => ['title', 'excerpt'],
            'taxonomies'            => [],
            'hierarchical'          => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-media-document',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'exclude_from_search'   => true,
            'publicly_queryable'    => true,
            'capability_type'       => 'post'
        ]);

        register_post_type('action', [
            'labels'                => [
                'name'                => __('Actions'),
                'singular_name'       => __('Action'),
                'add_new'             => __('Add Action'),
                'add_new_item'        => __('Add New Action'),
                'edit_item'           => __('Edit Action'),
            ],
            'public'                => true,
            'has_archive'           => true,
            'rewrite'               => ['slug' => 'action'],
            'supports'              => ['title'],
            'taxonomies'            => [],
            'hierarchical'          => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-media-document',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'exclude_from_search'   => true,
            'publicly_queryable'    => true,
            'capability_type'       => 'post'
        ]);
    }
}
