<?php

namespace App;

use Sober\Controller\Controller;

class App extends Controller
{
    public static function pretitle()
    {
        if (is_category()) {
            // return get_the_archive_title();
        }
        if (is_single()) {
            $category_link = get_category_link( get_the_category()[0] );
            $category_name = get_the_category()[0]->name;
            return '<a href="' . esc_url( $category_link ) . '" title="' . $category_name . '">' . $category_name . '</a>';
        }
    }

    public static function subtitle()
    {
        if (is_category()) {
            $current = get_category(get_query_var('cat'));
            $parent = get_category($current->category_parent);
            $current_top = (!is_wp_error($parent) ? $parent : $current);
            // var_dump(get_field('txt_subtitle', $current_top));
            return get_field('txt_subtitle', $current_top);
        }
        if (is_single()) {
            return '<i class="ff--sans">by</i> ' . get_the_author() . ' <span class="fw--300 px--0h@xs">|</span> ' . get_the_date();
        }
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            if (is_category()) {
                $current = get_category(get_query_var('cat'));
                $parent = get_category($current->category_parent);
                $current_top = (!is_wp_error($parent) ? $parent : $current);
                // var_dump($current_top->name);
                return $current_top->name;
            }
            if (is_tag()) {
                return single_tag_title('', false);
            }
            if (is_author()) {
                return get_the_author();
            }
            if (is_post_type_archive()) {
                return post_type_archive_title('', false);
            }
            if (is_tax()) {
                return single_term_title('', false);
            }
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for <i>%s</i>', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Page Not Found', 'sage');
        }
        if (is_singular('tribe_events') || is_post_type_archive('tribe_events')) {
            return __('Events', 'sage');
        }

        return get_the_title();
    }
}
