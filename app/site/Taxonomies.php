<?php

namespace App;

class Taxonomies
{
    public function __construct()
    {
        $this->register();
    }

    /**
     * Register custom taxonomies
     * @return void
     */
    public function register()
    {
        add_action('init', function() {
            register_taxonomy('group', 'article', [
                'meta_box_cb'     => false,
                'show_ui'         => true,
                'query_var'       => true,
                'public'          => true,
                'has_archive'     => true,
                'hierarchical'    => true,
                'rewrite'         => [
                    'slug'          => 'group',
                    'with_front'    => true,
                    'heirarchical'  => true
                ],
                'labels' => [
                    'name'                       => _x('Groups', 'taxonomy general name'),
                    'singular_name'              => _x('Group', 'taxonomy singular name'),
                    'search_items'               => __('Search Groups'),
                    'popular_items'              => __('Popular Groups'),
                    'all_items'                  => __('All Groups'),
                    'parent_item'                => null,
                    'parent_item_colon'          => null,
                    'edit_item'                  => __('Edit Group'),
                    'update_item'                => __('Update Group'),
                    'add_new_item'               => __('Add New Group'),
                    'new_item_name'              => __('New Group'),
                    'separate_items_with_commas' => __('Separate gallery tags with commas'),
                    'add_or_remove_items'        => __('Add or remove gallery tags'),
                    'choose_from_most_used'      => __('Choose from the most used gallery tags'),
                    'menu_name'                  => __('Groups'),
                ]
            ]);
        });
    }
}
