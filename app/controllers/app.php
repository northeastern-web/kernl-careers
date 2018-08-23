<?php

namespace App;

use Sober\Controller\Controller;

class App extends Controller
{
    public static function title()
    {
        if (is_post_type_archive('tribe_events')) {
            return (get_field('txt_events_title', 'option') ? get_field('txt_events_title', 'option') : 'Events');
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
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }

        if (is_404()) {
            return __('Page Not Found', 'sage');
        }

        return get_the_title();
    }

    public static function pretitle()
    {
        if (is_post_type_archive('tribe_events')) {
            return (get_field('txt_events_pretitle', 'option') ? get_field('txt_events_pretitle', 'option') : '');
        }

        if (is_singular('tribe_events')) {
            return (get_field('txt_events_title', 'option') ?
                '<a href="'. tribe_get_events_link() .'">'. get_field('txt_events_title', 'option') .'</a>'
            : '');
        }

        if (is_category()) {
            // return get_the_archive_title();
        }

        if (is_single()) {
            return (get_the_category() ?
                '<a href="'. get_category_link(get_the_category()[0]) .'">'. get_the_category()[0]->name .'</a>'
            : '');
        }
    }

    public static function subtitle()
    {
        if (is_singular('tribe_events')) {
            $events_label_singular = tribe_get_event_label_singular();
            $events_label_plural = tribe_get_event_label_plural();

            $start_date = tribe_get_start_date(get_the_id(), false, 'M j');
            $start_time = tribe_get_start_date(get_the_id(), false, 'g:i a');
            $end_date = tribe_get_end_date(get_the_id(), false, 'M j');
            $end_time = tribe_get_end_date(get_the_id(), false, 'g:i a');

            if (tribe_event_is_multiday()) {
                $event_date = '<i data-feather="clock" class="tc--red --thin pos--relative" style="top: 2px"></i> ' . $start_date .' &mdash; '. $end_date;
            } elseif (tribe_event_is_all_day()) {
                $event_date = '<i data-feather="clock" class="tc--red --thin pos--relative" style="top: 2px"></i> ' . $start_date .' &bull; All Day';
            } else {
                $event_date = '<i data-feather="clock" class="tc--red --thin pos--relative" style="top: 2px"></i> ' . $start_date .' &bull; '. $start_time .' - '. $end_time;
            }

            return $event_date;
        }

        if (is_post_type_archive('tribe_events')) {
            return (get_field('txt_events_subtitle', 'option') ? get_field('txt_events_subtitle', 'option') : '');
        }

        if (is_category()) {
            $current = get_category(get_query_var('cat'));
            $parent = get_category($current->category_parent);
            $current_top = (!is_wp_error($parent) ? $parent : $current);
            return get_field('txt_subtitle', $current_top);
        }

        if (is_single()) {
            $output = '';

            if (! get_field('bool_hide_author')) {
                $output .= '
                <div class="tt--caps fw--700 fs--sm pt--0h">by '
                    . (get_field('bool_override_author') ? get_field('txt_author') : get_the_author()) .
                '</div>';
            }

            if (get_field('bool_date')) {
                $output .= '<div class="tt--caps fw--400 fs--sm pt--0h">'. get_the_date() .'</div>';
            }

            return $output;
        }
    }
}
