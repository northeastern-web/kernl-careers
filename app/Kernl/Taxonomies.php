<?php

namespace Kernl;

class Taxonomies
{
    public function __construct()
    {
        add_action('init', [$this, 'registerTaxonomies']);
    }

    /**
     * Register custom taxonomies
     * @return void
     */
    public function registerTaxonomies()
    {
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

        register_taxonomy('audience', 'article', [
            'meta_box_cb'     => false,
            'show_ui'         => true,
            'query_var'       => true,
            'public'          => true,
            'has_archive'     => true,
            'hierarchical'    => true,
            'rewrite'         => [
                'slug'          => 'audience',
                'with_front'    => true,
                'heirarchical'  => true
            ],
            'labels' => [
                'name'                       => _x('Audiences', 'taxonomy general name'),
                'singular_name'              => _x('Audience', 'taxonomy singular name'),
                'search_items'               => __('Search Audiences'),
                'popular_items'              => __('Popular Audiences'),
                'all_items'                  => __('All Audiences'),
                'parent_item'                => null,
                'parent_item_colon'          => null,
                'edit_item'                  => __('Edit Audience'),
                'update_item'                => __('Update Audience'),
                'add_new_item'               => __('Add New Audience'),
                'new_item_name'              => __('New Audience'),
                'separate_items_with_commas' => __('Separate gallery tags with commas'),
                'add_or_remove_items'        => __('Add or remove gallery tags'),
                'choose_from_most_used'      => __('Choose from the most used gallery tags'),
                'menu_name'                  => __('Audiences'),
            ]
        ]);

        register_taxonomy('type', 'article', [
            'meta_box_cb'     => false,
            'show_ui'         => true,
            'query_var'       => true,
            'public'          => true,
            'has_archive'     => true,
            'hierarchical'    => true,
            'rewrite'         => [
                'slug'          => 'type',
                'with_front'    => true,
                'heirarchical'  => true
            ],
            'labels' => [
                'name'                       => _x('Types', 'taxonomy general name'),
                'singular_name'              => _x('Type', 'taxonomy singular name'),
                'search_items'               => __('Search Types'),
                'popular_items'              => __('Popular Types'),
                'all_items'                  => __('All Types'),
                'parent_item'                => null,
                'parent_item_colon'          => null,
                'edit_item'                  => __('Edit Type'),
                'update_item'                => __('Update Type'),
                'add_new_item'               => __('Add New Type'),
                'new_item_name'              => __('New Type'),
                'separate_items_with_commas' => __('Separate gallery tags with commas'),
                'add_or_remove_items'        => __('Add or remove gallery tags'),
                'choose_from_most_used'      => __('Choose from the most used gallery tags'),
                'menu_name'                  => __('Types'),
            ]
        ]);

        register_taxonomy('misc', 'article', [
            'meta_box_cb'     => false,
            'show_ui'         => true,
            'query_var'       => true,
            'public'          => true,
            'has_archive'     => true,
            'hierarchical'    => true,
            'rewrite'         => [
                'slug'          => 'misc',
                'with_front'    => true,
                'heirarchical'  => true
            ],
            'labels' => [
                'name'                       => _x('Miscellaneous', 'taxonomy general name'),
                'singular_name'              => _x('Miscellaneous', 'taxonomy singular name'),
                'search_items'               => __('Search Miscellaneous'),
                'popular_items'              => __('Popular Miscellaneous'),
                'all_items'                  => __('All Miscellaneous'),
                'parent_item'                => null,
                'parent_item_colon'          => null,
                'edit_item'                  => __('Edit Miscellaneous'),
                'update_item'                => __('Update Miscellaneous'),
                'add_new_item'               => __('Add New Miscellaneous'),
                'new_item_name'              => __('New Miscellaneous'),
                'separate_items_with_commas' => __('Separate gallery tags with commas'),
                'add_or_remove_items'        => __('Add or remove gallery tags'),
                'choose_from_most_used'      => __('Choose from the most used gallery tags'),
                'menu_name'                  => __('Miscellaneous'),
            ]
        ]);
    }
}
