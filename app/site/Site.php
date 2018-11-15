<?php

namespace App;

class Site
{
    public function __construct()
    {
        $this->init();
    }

    protected function init()
    {
        new PostTypes;
        new Taxonomies;

        // Add trending articles options page
        add_action('admin_menu', function () {
            acf_add_options_page([
                'page_title'  => 'Trending Articles',
                'menu_title'  => 'Trending',
                'capability'  => 'edit_posts',
                'position'    => '2.3',
                'icon_url'    => 'dashicons-chart-line'
            ]);
        }, 12);

        // Adjust taxonomy archive query
        add_action('pre_get_posts', function ($query) {
            global $wp_the_query;
            if (is_archive('taxonomy')) {
                if ($wp_the_query === $query) {
                    $query->set('posts_per_page', 50);
                    $query->set('order', 'ASC');
                    $query->set('orderby', 'menu_order title');
                }
                return $query;
            }
        });
    }

    public static function getTaxHierarchy($post_id, $taxonomy)
    {
        $terms = [];
        $child = wp_get_post_terms($post_id, $taxonomy)[0];
        $parent = get_term(get_ancestors($child->term_id, $taxonomy, 'taxonomy')[0], $taxonomy);
        if ($parent) {
            $terms[] = $parent;
        }
        $terms[] = $child;
        return $terms;
    }

    public static function getMenu($menu)
    {
        return wp_get_nav_menu_items($menu);
    }

    public static function isActiveMenu($menu, $item)
    {
        $menu_items = wp_get_nav_menu_items($menu);
        $current_item = current(wp_filter_object_list($menu_items, ['object_id' => get_queried_object_id()]));

        return ($current_item && $current_item->title == $item->title ? true : false);
    }
}
