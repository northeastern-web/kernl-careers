<?php

namespace Kernl;

class Navigation
{
   /**
    * Constructor
    *
    * @return void
    */
    public function __construct()
    {
        add_filter('wp_list_pages', [$this, 'editListPages'], 20, 3);
    }


    /**
     * Display the navigation
     * @param  string  $level   value determining level of pages to display
     * @param  int $depth       depth of the menu
     * @param  int $child_of    depth of the menu
     * @return string           reformatted wp_list_pages
     */
    public static function display($level = 'top', $depth = 1, $child_of = 0)
    {
        global $post;
        $parents = get_post_ancestors($post->ID);

        if ($level == 'top') {
            if ($parents) {
                $child_of = (count($parents) == 1 ? current($parents) : end($parents));
            } else {
                $child_of = $post->ID;
            }

        } elseif (count($parents) > 1) {
            $child_of = current($parents);

        } else {
            $child_of = $post->ID;
        }

        return wp_list_pages('title_li=&child_of='. $child_of .'&depth='. $depth .'&echo=0');
    }


    /**
     * Edit wp_list_pages output
     * @param  string $output actual output of wp_list_pages
     * @param  array $r      not sure exactly
     * @param  array $pages  WP Post array
     * @return string         new output for wp_list_pages
     */
    public function editListPages($output, $r, $pages) {
        $depth = $r['depth'];
        $list = '';
        foreach ($pages as $page) {
            if (count($page->ancestors) < ($depth+1)) {
                $list .= '
                    <li class="nav__item '
                        . $this->isActive($page->ID) .' '. $this->hasChildren($page->ID) .'">
                        <a class="nav__link" href="'. get_permalink($page->ID) .'">'
                            . $page->post_title .
                        '</a>'
                        . $this->getChildren($page->ID) .
                    '</li>
                ';
            }
        }
        return $list;
    }


    /**
     * Check to see if current page is active
     * @param  int  $id current post ID
     * @return string     active class name
     */
    private function isActive($id) {
        global $post;

        return ($post->ID == $id || in_array($id, $post->ancestors)  ? 'nav__item--active' : '');
    }


    /**
     * Check to see if page has children
     * @param  int  $id current post ID
     * @return string     class name for has children
     */
    private function hasChildren($id) {
        global $post;
        $pages = get_children(['post_parent' => $id, 'post_type' => 'page']);

        return ($pages ? 'nav__item--parent' : '');
    }


    /**
     * Gets the child pages of parent
     * @param  int $id      current post Id
     * @return string       output for list of child pages
     */
    private function getChildren($id) {
        $list = '';
        $pages = get_children(['post_parent' => $id, 'post_type' => 'page']);

        if ($pages) {
            $list .= '<ul class="nav__child-list">';
            foreach ($pages as $page) {
                $list .= '
                    <li class="nav__child-item '. $this->isActive($page->ID) .'">
                        <a class="nav__child-link" href="'. get_permalink($page->ID) .'">'
                            . $page->post_title .
                        '</a>
                    </li>
                ';
            }
            $list .= '</ul>';
        }
        return $list;
    }
}
