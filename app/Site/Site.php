<?php

namespace Kernl;

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

    public static function getTaxTerms($post_id, $taxonomy)
    {
        $output = [];
        $terms = wp_get_post_terms($post_id, $taxonomy);
        $i = 0;
        foreach ($terms as $term) {
            $output[$i]['item'] = $term;
            if ($term->parent) {
                $ancestors = get_ancestors($term->term_id, $taxonomy, 'taxonomy');
                foreach ($ancestors as $ancestor) {
                    $output[$i]['ancestors'][] = get_term($ancestor);
                }
            }
            $i++;
        }
        return $output;
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
