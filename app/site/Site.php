<?php

namespace App;

use App\PostTypes;
use App\Taxonomies;

class Site
{
    public function __construct()
    {
        add_shortcode('alert', [$this, 'shortcodeAlert']);

        // Site level classes
        new PostTypes;
        new Taxonomies;

        // ACF Save path
        add_filter('acf/settings/save_json', function($path) {
            return dirname(__FILE__) . '/acf-json';
        });

        // ACF Load path
        add_filter('acf/settings/load_json', function($paths) {
            unset($paths[0]);
            $paths[] = dirname(__FILE__) . '/acf-json';
            return $paths;
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
                    . ($title ? '<h2 class="__title">'. $title .'</h2>' : '')
                    . '<div class="__excerpt">' .
                        \Kernl\Utility::removeEmptyParagraphs($content)
                    . '</div>
                </div>'

            . ($link ? '</a>' : '')
        . '</div>
        ';
    }
}
