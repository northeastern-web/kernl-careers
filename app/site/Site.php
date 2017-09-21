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
        add_action('pre_get_posts' , [$this, 'orderAdminPostTypes']);
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
                    . ($title ? '<h2 class="__title">'. $title .'</h2>' : '')
                    . '<div class="__excerpt">' .
                        \Kernl\Utility::removeEmptyParagraphs($content)
                    . '</div>
                </div>'

            . ($link ? '</a>' : '')
        . '</div>
        ';
    }

    /**
     * Order post types on admin screens
     * @param  WP_Query $query current WP query
     * @return void
     */
    public function orderAdminPostTypes($query)
    {
        $post_types = ['article','action'];
        $current_post_type = get_query_var('post_type');

        if (is_admin() && in_array($current_post_type, $post_types)) {
            $query->set('orderby', [
                'title' => 'ASC'
            ]);
        }
    }
}
