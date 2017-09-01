<?php

namespace Kernl;

class ShortcodePosts
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        add_shortcode('posts', [$this, 'shortcodePosts']);
    }

    public function shortcodePosts($atts)
    {
        extract(
            shortcode_atts(
                [
                    'cat'                   => '',
                    'category'              => '',
                    'category__in'          => '',
                    'category__not_in'      => '',
                    'id'                    => false,
                    'ignore_sticky_posts'   => false,
                    'meta_key'              => '',
                    'meta_value'            => '',
                    'offset'                => 0,
                    'order'                 => 'DESC',
                    'orderby'               => 'date',
                    'post_status'           => 'publish',
                    'post_type'             => 'post',
                    'posts_per_page'        => '1',
                    'tag'                   => '',
                    'tax_operator'          => 'IN',
                    'tax_include_children'  => true,
                    'tax_term'              => false,
                    'taxonomy'              => false,
                    'component'             => '',
                    'columns'               => '',
                ],
            $atts)
        );

        $args = [
            'cat'                   => sanitize_text_field($cat),
            'category_name'         => sanitize_text_field($category),
            'category__in'          => sanitize_text_field($category__in),
            'category__not_in'      => sanitize_text_field($category__not_in),
            'id'                    => sanitize_text_field($id),
            'ignore_sticky_posts'   => sanitize_text_field($ignore_sticky_posts),
            'meta_key'              => sanitize_text_field($meta_key),
            'meta_value'            => sanitize_text_field($meta_value),
            'offset'                => sanitize_text_field($offset),
            'order'                 => sanitize_text_field($order),
            'orderby'               => sanitize_text_field($orderby),
            'post_status'           => sanitize_text_field($post_status),
            'post_type'             => sanitize_text_field($post_type),
            'posts_per_page'        => sanitize_text_field($posts_per_page),
            'tag'                   => sanitize_text_field($tag),
            'tax_operator'          => sanitize_text_field($tax_operator),
            'tax_include_children'  => sanitize_text_field($tax_include_children),
            'tax_term'              => sanitize_text_field($tax_term),
            'taxonomy'              => sanitize_text_field($taxonomy),
            'component'             => sanitize_text_field($component),
            'columns'               => sanitize_text_field($columns),
        ];

        $output = '';
        $results = new \WP_Query($args);

        if ($results->have_posts() && $component) {

            // Open columns in output if specified
            $output .= ($columns ? '<div class="row">' : '');

            // Loop through posts
            while($results->have_posts()) {
                $results->the_post();
                $output .= ($columns ? '
                    <div class="g-12@xs g-'. $columns .'@md">'
                        . $this->loadComponent($component) .
                    '</div>
                ' : $this->loadComponent($component));
            }
            wp_reset_postdata();

            // Close columns in output if specified
            $output .= ($columns ? '</div>' : '');
        }

        return $output;
    }

    /**
     * Loads the component template
     * @param  string $component name of component
     * @return ob_get_contents
     */
    private function loadComponent($component) {
        ob_start();
        include \App\template_path(
            locate_template('components/'. $component .'.blade.php')
        );
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }
}
