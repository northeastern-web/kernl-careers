<?php

namespace App;

class PostTypes
{
    public function __construct()
    {
        $this->register();
    }


    protected function register()
    {
        add_action('init', function() {
            register_post_type('article', [
                'labels'                => [
                    'name'                => __('Articles'),
                    'singular_name'       => __('Article'),
                    'add_new'             => __('Add Article'),
                    'add_new_item'        => __('Add New Article'),
                    'edit_item'           => __('Edit Article'),
                ],
                'public'                => true,
                'has_archive'           => 'articles',
                'rewrite'               => ['slug' => 'article'],
                'supports'              => ['title', 'editor', 'excerpt'],
                'taxonomies'            => ['post_tag'],
                'hierarchical'          => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-media-document',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post'
            ]);
        });
    }
}
