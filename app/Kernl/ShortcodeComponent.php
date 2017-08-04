<?php

namespace Kernl;

class ShortcodeComponent
{
    public function __construct()
    {
        add_shortcode('component', [$this, 'shortcodeComponent']);
    }

    /**
     * Shortcode to craft a component
     * @param  array    $atts
     * @param  string   $content
     * @return string   card component
     */
    public function shortcodeComponent($atts, $content = null)
    {
        extract(
            shortcode_atts(
                [
                    'type' => 'card',
                    'class' => '',
                    'link' => '',
                    'header' => '',
                    'footer' => '',
                    'footer_link' => '',
                    'pretitle' => '',
                    'title' => '',
                    'subtitle' => '',
                    'icon' => '',
                    'image' => ''
                ],
                $atts,
                'component'
            )
        );

        return '
        <article class="'. $type . ($class ? ' '. $class : '') . '">'
            . ($link ? '<a href="'. $link .'" class="'. $type .'__link">' : '')

                . ($header ?
                    '<header class="'. $type .'__header">'
                        . $this->parseShortcodeArray($type, $header) .
                    '</header>' : '')

                . ($image ?
                    '<div class="'. $type .'__graphic">
                        <img class="'. $type .'__graphic__img" src="'. $image .'" />
                    </div>' : '')

                . '<div class="'. $type .'__body">'
                    . ($icon ? '<div class="'. $type .'__icon"><i class="'. $icon .'"></i></div>' : '')
                    . ($pretitle ? '<div class="'. $type .'__pretitle">'. $pretitle .'</div>' : '')
                    . ($title ? '<h2 class="'. $type .'__title">'. $title .'</h2>' : '')
                    . ($subtitle ? '<div class="'. $type .'__subtitle">'. $subtitle .'</div>' : '')
                    . '<div class="'. $type .'__excerpt">' . do_shortcode($this->removeEmptyParagraphs($content)) . '</div>
                </div>'

                . ($footer ?
                    '<footer class="'. $type .'__footer">' .
                        ($footer_link && empty($link) ? '<a href="'. $footer_link .'" class="'. $type .'__footer__link">' : '')
                        . $this->parseShortcodeArray($type, $footer)
                        . ($footer_link && empty($link) ? '</a>' : '')
                    . '</footer>'
                : '')

            . ($link ? '</a>' : '')
        . '</article>
        ';
    }

    /**
     * Remove empty paragraoh tags
     * @param  string   $content
     * @return string
     */
    public function removeEmptyParagraphs($content)
    {
        $content = force_balance_tags($content);
        $content = preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
        $content = preg_replace('~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content);
        return $content;
    }

    /**
     * Parse array(s) in component shortcode
     * @param  string   $type
     * @param  string   $content
     * @return string
     */

    private function parseShortcodeArray($type, $array, $delimiter_1 = ',', $delimiter_2 = '|')
    {
        $return_string = '';
        $array_outer = explode($delimiter_1, $array);
        $array_inner = [];

        foreach ($array_outer as $key => $value) {
            $item = explode($delimiter_2, $value);
            $return_string .= '
                <div class="' . $type . '__column">'
                    . (isset($item[1]) ?
                        '<div class="' . $item[1] . '">'
                    : '')
                    . $item[0]
                    . (isset($item[1]) ?
                        '</div>'
                    : '') .
                '</div>
            ';
        }

        return $return_string;
    }
}
