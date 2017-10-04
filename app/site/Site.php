<?php

namespace App;

use App\PostTypes;
use App\Taxonomies;

class Site
{
    public function __construct()
    {
        new PostTypes;
        new Taxonomies;

        add_shortcode('alert', [$this, 'shortcodeAlert']);

        //
        // order certain post types by title
        add_action('pre_get_posts' , function ($query) {
            $post_types = ['article'];
            $current_post_type = get_query_var('post_type');
            if (is_admin() && in_array($current_post_type, $post_types)) {
                $query->set('orderby', [
                    'title' => 'ASC'
                ]);
            }
        });

        //
        // Filter to add articles to archives (taxonomies)
        add_filter('pre_get_posts', function ($query) {
            $post_types = ['post', 'nav_menu_item', 'article'];
            if (is_archive() && !is_admin()) {
                $query->set('post_type', $post_types);
                return $query;
            }
        });
    }

    /**
     * Shortcode to craft an alert
     * @param  array    $atts
     * @param  string   $content
     * @return string   html string
     */
    public function shortcodeAlert($atts, $content = null)
    {
        extract(
            shortcode_atts(
                [
                    'type' => 'alert',
                    'class' => '--outline',
                    'link' => '',
                    'title' => ''
                ],
                $atts,
                'alert'
            )
        );

        return '
        <div class="'. $type . ($class ? ' '. $class : '') . '">'
            . ($link ? '<a href="'. $link .'" class="__link">' : '')

                . '<div class="__body">'
                    . ($title ? '<div class="__title">'. $title .'</div>' : '')
                    . '<div class="__excerpt">' .
                        \Kernl\Utility::removeEmptyParagraphs($content)
                    . '</div>
                </div>'

            . ($link ? '</a>' : '')
        . '</div>
        ';
    }
}
