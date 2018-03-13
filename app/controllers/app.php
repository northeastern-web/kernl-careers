<?php

namespace App;

use Sober\Controller\Controller;

class App extends Controller
{
    public static function pretitle()
    {
        if (is_archive()) {
            // return get_the_archive_title();
        }
        if (is_single()) {
            return get_the_category()[0]->name;
        }
    }

    public static function subtitle()
    {
        if (is_archive()) {
            // return get_the_archive_title();
        }
        if (is_single()) {
            return get_the_author();
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
                return single_cat_title('', false);
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
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }

        return get_the_title();
    }
}
