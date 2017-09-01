<?php

namespace Kernl;

class PostFormats
{
    public function __construct()
    {
        add_theme_support('post-formats', ['gallery', 'link', 'video']);
        add_action('init', [$this, 'defineFields'], 20);
    }

    /**
     * Define fields for custom post types.
     *
     * @return void
     */
    public function defineFields()
    {
        if (function_exists('acf_add_local_field_group')) {

            acf_add_local_field_group(array (
                'key' => 'group_58a7683b0e0bb',
                'title' => '[template] Post Gallery',
                'fields' => array (
                    array (
                        'library' => 'all',
                        'min' => '',
                        'max' => '',
                        'min_width' => '',
                        'min_height' => 600,
                        'min_size' => '',
                        'max_width' => 1600,
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                        'insert' => 'append',
                        'key' => 'field_58a768428ed2c',
                        'label' => 'Gallery',
                        'name' => 'gallery',
                        'type' => 'gallery',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'post_format',
                            'operator' => '==',
                            'value' => 'gallery',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => 1,
                'description' => '',
            ));

            acf_add_local_field_group(array (
                'key' => 'group_58a7688832bff',
                'title' => '[template] Post Link',
                'fields' => array (
                    array (
                        'default_value' => 1,
                        'message' => '',
                        'ui' => 1,
                        'ui_on_text' => '',
                        'ui_off_text' => '',
                        'key' => 'field_58a7693629d9c',
                        'label' => 'Is News@Northeastern article?',
                        'name' => 'bool_nunews',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                    ),
                    array (
                        'default_value' => '',
                        'placeholder' => '',
                        'key' => 'field_58a7688f29d9a',
                        'label' => 'External Link',
                        'name' => 'url_external',
                        'type' => 'url',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                    ),
                    array (
                        'default_value' => '',
                        'maxlength' => '',
                        'placeholder' => 'eg. Boston Globe, USA Today, etc.',
                        'prepend' => '',
                        'append' => '',
                        'key' => 'field_58a76a4f30efe',
                        'label' => 'Author',
                        'name' => 'text_author',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                    ),
                    array (
                        'default_value' => '',
                        'maxlength' => '',
                        'placeholder' => 'eg. Boston Globe, USA Today, etc.',
                        'prepend' => '',
                        'append' => '',
                        'key' => 'field_58a768e029d9b',
                        'label' => 'Source',
                        'name' => 'text_source',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_58a7693629d9c',
                                    'operator' => '!=',
                                    'value' => '1',
                                ),
                            ),
                        ),
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'post_format',
                            'operator' => '==',
                            'value' => 'link',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => 1,
                'description' => '',
            ));

            acf_add_local_field_group(array (
                'key' => 'group_58a76ecf392cc',
                'title' => '[template] Post Video',
                'fields' => array (
                    array (
                        'default_value' => '',
                        'placeholder' => 'eg. //www.youtube.com/embed/gA5oI_sbLkg',
                        'key' => 'field_58a76ed89a93d',
                        'label' => 'Video embed',
                        'name' => 'url_video',
                        'type' => 'url',
                        'instructions' => 'Add full embed URL',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                    ),
                    array (
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                        'default_value' => '',
                        'delay' => 0,
                        'key' => 'field_58a7727422cbe',
                        'label' => 'Description',
                        'name' => 'wys_description',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'post_format',
                            'operator' => '==',
                            'value' => 'video',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => 1,
                'description' => '',
            ));

        }
    }
}
