<?php

namespace Kernl;

class TinyMCE
{

    public $sizes = [
        'XS' => 'xs',
        'SM' => 'sm',
        'LG' => 'lg',
        'XL' => 'xl',
        'XXL' => 'xx'
    ];

    public $positions = [
        'All sides' => 'a',
        'Y axis' => 'y',
        'X axis' => 'x',
        'Top' => 't',
        'Right' => 'r',
        'Bottom' => 'b',
        'Left' => 'l'
    ];

    /**
     * Initialize filters
     */
    public function __construct()
    {
        add_filter('tiny_mce_before_init', [$this, 'customTinymce']);
        add_filter('mce_buttons', [$this, 'customTinymceButtons1']);
        add_filter('mce_buttons_2', [$this, 'customTinymceButtons2']);
    }


    /**
     * Customize the default Wordpress TinyMCE
     * @param  [type] $settings [description]
     * @return [type]           [description]
     */
    public function customTinymce($settings)
    {
        $style_type = [
            'title' => 'Typography',
            'items' => [
                [
                    'title' => 'Alignment',
                    'items' => [
                        [
                            'title' => 'Left',
                            'selector' => '*',
                            'classes' => 'ta--l',
                            'wrapper' => false
                        ],
                        [
                            'title' => 'Right',
                            'selector' => '*',
                            'classes' => 'ta--r',
                            'wrapper' => false
                        ],
                        [
                            'title' => 'Center',
                            'selector' => '*',
                            'classes' => 'ta--c',
                            'wrapper' => false
                        ]
                    ]
                ],
                [
                    'title' => 'Weight',
                    'items' => [
                        [
                            'title' => '100',
                            'selector' => '*',
                            'classes' => 'fw--100',
                            'wrapper' => false
                        ],
                        [
                            'title' => '200',
                            'selector' => '*',
                            'classes' => 'fw--200',
                            'wrapper' => false
                        ],
                        [
                            'title' => '300',
                            'selector' => '*',
                            'classes' => 'fw--300',
                            'wrapper' => false
                        ],
                        [
                            'title' => '400',
                            'selector' => '*',
                            'classes' => 'fw--400',
                            'wrapper' => false
                        ],
                        [
                            'title' => '500',
                            'selector' => '*',
                            'classes' => 'fw--500',
                            'wrapper' => false
                        ],
                        [
                            'title' => '600',
                            'selector' => '*',
                            'classes' => 'fw--600',
                            'wrapper' => false
                        ],
                        [
                            'title' => '700',
                            'selector' => '*',
                            'classes' => 'fw--700',
                            'wrapper' => false
                        ],
                        [
                            'title' => '800',
                            'selector' => '*',
                            'classes' => 'fw--800',
                            'wrapper' => false
                        ],
                        [
                            'title' => '900',
                            'selector' => '*',
                            'classes' => 'fw--900',
                            'wrapper' => false
                        ],
                    ]
                ],
                [
                    'title' => 'Sizing',
                    'items' => [
                        [
                            'title' => 'Lead',
                            'selector' => '*',
                            'classes' => 'fs--lead',
                            'wrapper' => false
                        ],
                        [
                            'title' => 'Display 1',
                            'selector' => '*',
                            'classes' => 'ds--1',
                            'exact' => true,
                            'wrapper' => false
                        ],
                        [
                            'title' => 'Display 2',
                            'selector' => '*',
                            'classes' => 'ds--2',
                            'exact' => true,
                            'wrapper' => false
                        ],
                        [
                            'title' => 'Display 3',
                            'selector' => '*',
                            'classes' => 'ds--3',
                            'exact' => true,
                            'wrapper' => false
                        ],
                        [
                            'title' => 'Display 4',
                            'selector' => '*',
                            'classes' => 'ds--4',
                            'exact' => true,
                            'wrapper' => false
                        ],
                        [
                            'title' => 'Display 5',
                            'selector' => '*',
                            'classes' => 'ds--5',
                            'exact' => true,
                            'wrapper' => false
                        ],
                        [
                            'title' => 'Font Size xs',
                            'selector' => '*',
                            'classes' => 'fs--xs',
                            'exact' => true,
                            'wrapper' => false
                        ],
                        [
                            'title' => 'Font Size sm',
                            'selector' => '*',
                            'classes' => 'fs--sm',
                            'exact' => true,
                            'wrapper' => false
                        ],
                        [
                            'title' => 'Font Size lg',
                            'selector' => '*',
                            'classes' => 'fs--lg',
                            'exact' => true,
                            'wrapper' => false
                        ],
                        [
                            'title' => 'Font Size xl',
                            'selector' => '*',
                            'classes' => 'fs--xl',
                            'exact' => true,
                            'wrapper' => false
                        ]
                    ]
                ]
            ]
        ];

        $style_floats = [
            'title' => 'Floats',
            'items' => [
                [
                    'title' => 'Left (XS & up)',
                    'block' => 'div',
                    'classes' => 'pull-xs-left',
                    'wrapper' => false
                ],
                [
                    'title' => 'Left (SM & up)',
                    'block' => 'div',
                    'classes' => 'pull-sm-left',
                    'wrapper' => false
                ],
                [
                    'title' => 'Left (MD & up)',
                    'block' => 'div',
                    'classes' => 'pull-md-left',
                    'wrapper' => false
                ],
                [
                    'title' => 'Left (LG & up)',
                    'block' => 'div',
                    'classes' => 'pull-lg-left',
                    'wrapper' => false
                ],
                [
                    'title' => 'Left (XL & up)',
                    'block' => 'div',
                    'classes' => 'pull-xl-left',
                    'wrapper' => false
                ],
                [
                    'title' => 'Right (XS & up)',
                    'block' => 'div',
                    'classes' => 'pull-xs-right',
                    'wrapper' => false
                ],
                [
                    'title' => 'Right (SM & up)',
                    'block' => 'div',
                    'classes' => 'pull-sm-right',
                    'wrapper' => false
                ],
                [
                    'title' => 'Right (MD & up)',
                    'block' => 'div',
                    'classes' => 'pull-md-right',
                    'wrapper' => false
                ],
                [
                    'title' => 'Right (LG & up)',
                    'block' => 'div',
                    'classes' => 'pull-lg-right',
                    'wrapper' => false
                ],
                [
                    'title' => 'Right (XL & up)',
                    'block' => 'div',
                    'classes' => 'pull-xl-right',
                    'wrapper' => false
                ]
            ]
        ];

        $style_padding = [
            'title' => 'Padding',
            'items' => $this->spacing('p')
        ];

        $style_margin = [
            'title' => 'Margin',
            'items' => $this->spacing('m')
        ];


        $style_buttons = [
            'title' => 'Buttons',
            'items' => [
                [
                    'title' => 'Colors',
                    'items' => $this->component_colors('btn', null, 'a')
                ],
                [
                   'title' => 'Sizes',
                   'items' => $this->component_sizes('btn', null, 'a')
                ],
                [
                   'title' => 'Misc',
                   'items' => [
                       [
                           'title' => 'Outline',
                           'selector' => 'a',
                           'classes' => 'btn--outline',
                           'wrapper' => false
                       ],
                       [
                           'title' => 'Block',
                           'selector' => 'a',
                           'classes' => 'btn--block',
                           'wrapper' => false
                       ]
                    ]
                ]
            ]
        ];

        $style_listgroups = [
            'title' => 'List Groups',
            'items' => [
                [
                   'title' => 'Colors',
                   'items' => $this->component_colors('list-group', null, 'ul, ol')
                ],
                [
                   'title' => 'Sizes',
                   'items' => $this->component_sizes('list-group', null, 'ul, ol')
                ],
                [
                   'title' => 'Misc',
                   'items' => [
                       [
                           'title' => 'Striped',
                           'selector' => 'ul,ol',
                           'classes' => 'list-group--striped',
                           'wrapper' => true
                       ]
                    ]
                ]

            ]
        ];

        // $style_formats = [$style_type, $style_floats, $style_padding, $style_margin, $style_alerts, $style_blockquotes, $style_buttons, $style_listgroups];

        // removing components
        $style_formats = [$style_type, $style_floats, $style_padding, $style_margin, $style_buttons];

        $settings['style_formats'] = json_encode($style_formats);
        $settings['block_formats'] = 'Paragraph=p;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6';
        return $settings;
    }


    /**
     * Customize TinyMCE button row 1
     * @param  array $buttons default buttons in row 1
     * @return array          buttons to be displayed in row 1
     */
    public function customTinymceButtons1($buttons)
    {
        // $buttons contains all current buttons
        // instead, return specific buttons to add to tiny mce
        return ['undo','redo','|','bold','italic','underline','strikethrough','bullist','numlist','hr','justifyleft','justifycenter','justifyright','|','link','unlink','removeformat','|','formatselect','styleselect'];
    }


    /**
     * Customize TinyMCE button row 2
     * @param  array $buttons default buttons in row 2
     * @return array          buttons to be displayed in row 2
     */
    public function customTinymceButtons2($buttons)
    {
        // same as customTinymceButtons1()
        return []; // clearing out row 2
    }


    private function component_colors($item, $block = 'div', $selector = null)
    {
        $colors = [
            'Base' => $item,
            'Dark' => $item .' '. $item .'--dark',
            'Light' => $item .' '. $item .'--light',
            'Primary' => $item .' '. $item .'--primary',
            'Secondary' => $item .' '. $item .'--secondary',
            'Tertiary' => $item .' '. $item .'--tertiary'
        ];

        if ($item == 'btn' || $item == 'btn-outline') {
            $colors['Transparent'] = $item .' '. $item .'--transparent';
            $colors['Transparent Light'] = $item .' '. $item .'--transparent-light';
        }

        $component_format = [];

        foreach ($colors as $color => $value) {
            $component_format[] = [
                'title' => $color,
                'block' => $block,
                'selector' => $selector,
                'classes' => $value,
                'wrapper' => false
            ];
        }

        return $component_format;
    }


    private function component_sizes($item, $block = 'div', $selector = null)
    {
        $component_format = [];

        foreach ($this->sizes as $size => $value) {
            $component_format[] = [
                'title' => $size,
                'block' => $block,
                'selector' => $selector,
                'classes' => $item .'--'. $value,
                'wrapper' => false
            ];
        }

        return $component_format;
    }


    private function spacing($item)
    {

        $spacing_format = [];

        foreach ($this->positions as $position_label => $position) {
            $positions_format = [];

            foreach ($this->sizes as $size => $breakpoint) {
                $i = 10;
                while ($i >= 0) {
                    $positions_format[] = [
                        'title' => $i .' ('. $breakpoint .' and up)',
                        'selector' => '*',
                        'classes' => $item .'--'. $position .'-'. $i .'@'. $breakpoint,
                        'wrapper' => false
                    ];
                    $i--;
                }
            }

            $spacing_format[] = [
                'title' => $position_label,
                'items' => $positions_format
            ];
        }

        return $spacing_format;
    }
}
