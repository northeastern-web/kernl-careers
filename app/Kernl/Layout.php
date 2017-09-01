<?php

namespace Kernl;

class Layout
{
   /**
    * Constructor
    *
    * @return void
    */
    public function __construct()
    {
        // add_action('acf/input/admin_head', [$this, 'acfStyles'], 20);
    }


    /**
     * Structure of the layout
     * @param  string $content  the WP content
     * @return string           concatenated string of content & layout
     */
    public static function structure($type = '', $args = [], $getfield = 'get_sub_field')
    {
        $option = '';

        if (is_singular()) {
            global $post;
            $post_object = get_post($post->ID);
            setup_postdata($post_object);
            $option = $post->ID;
        }
        if (is_home()) {
            $option = 'option';
        }
        if (is_archive()) {
            $option = get_queried_object();
        }

        // Set up items array to hold attributes
        $item = [];

        if (isset($args['class']))
            $item['class'][] = $args['class'];

        // If type is section
        if ($type == 'section') {
            if ($getfield('opt_container', $option))
                $item['class'][] = '';
            if ($getfield('txt_class', $option))
                $item['class'][] = $getfield('txt_class', $option) .' ';
        }

        // If type is banner
        if ($type == 'banner') {
            if ($getfield('opt_banner', $option)) {
                $item['class'][] = '--banner';
                $item['class'][] = self::format($getfield('opt_banner', $option), '--');
            }

            if ($getfield('txt_banner_class', $option)) {
                $item['class'][] = ' '. $getfield('txt_banner_class', $option);
            }

            if ($getfield('med_banner', $option)) {
                $item['class'][] = '+bgimg';
                $item['style'][] = 'background-image:url(\''. $getfield('med_banner', $option)['url'] .'\');';
            }
        }

        // Loop through each array item
        foreach ($item as $key => $value) {
            echo ' '. $key .'="'. (is_array($value) ? implode(' ', $value) : $value) .'"';
        }
    }

    /**
     * Format an HTML attribute friendly string from array
     * @param  array $field  ACF array
     * @param  string $prefix text prefix
     * @return string         formatted string
     */
    public static function format($field, $prefix = '')
    {
        $format = [];
        foreach ($field as $item) {
            $format[] = $prefix . $item;
        }
        return implode(' ', $format);
    }

}
