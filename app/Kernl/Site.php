<?php

namespace Kernl;

class Site
{
    public function __construct()
    {
        new PostTypes;
        new PostFormats;
        new Layout;
        new Navigation;
        new ShortcodePosts;
        new ShortcodeComponent;
        new TinyMCE;

        add_action('after_setup_theme', [$this, 'setThemeSupports'], 100);
        add_action('admin_menu',  [$this, 'acfOptionsMenu'], 12);
        add_filter('admin_bar_menu', [$this, 'replace_howdy'], 25);
        add_filter('admin_footer_text', [$this, 'editLeftAdminFooterText'], 1, 2);
        add_filter('update_footer', [$this, 'editRightAdminFooterText'], 11);
        add_action('set_current_user', [$this, 'removeAdminBar']);
        add_action('admin_enqueue_scripts', [$this, 'addAdminStyles']);
        add_action('login_enqueue_scripts', [$this, 'addAdminStyles']);
        add_action('dashboard_glance_items',  [$this, 'editDashboardGlanceItems']);
        add_action('admin_init',  [$this, 'removeDashboardMetadata']);

        // ACF
        add_filter('acf/settings/save_json', [$this, 'acfJsonSavePoint']);
        add_filter('acf/settings/load_json', [$this, 'acfJsonLoadPoint']);

        // SEO framwork plugin
        add_filter('the_seo_framework_metabox_priority', function() { return 'low';});
        add_filter('the_seo_framework_indicator', '__return_false');
        add_filter('the_seo_framework_seo_bar_pill', '__return_true');
        add_filter('the_seo_framework_show_seo_column', '__return_false');
    }

    /**
     * Sets default theme support options
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/
     * @link https://developer.wordpress.org/themes/functionality/post-formats/
     * @return void
     */
    public function setThemeSupports()
    {
        add_theme_support('post-formats', ['gallery', 'link', 'video']);
        add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);
    }

    /**
     * Edit "Howdy" text in admin bar
     *
     * @return void
     */
    public function replace_howdy($wp_admin_bar)
    {
      $my_account=$wp_admin_bar->get_node('my-account');
      $newtitle = str_replace( 'Howdy,', 'Account: ', $my_account->title );
      $wp_admin_bar->add_node([
          'id' => 'my-account',
          'title' => $newtitle,
      ]);
    }


    /**
     * Edit left footer text
     *
     * @return string
     */
    public function editLeftAdminFooterText($text)
    {
        $text = '<a href="mailto:provost-digital@neu.edu">Provost Digital Strategy</a>';
        return $text;
    }


    /**
     * Edit right footer text
     *
     * @return string
     */
    public function editRightAdminFooterText($text)
    {
        return 'WP ' . $text;
    }


    /**
     * Remove the Toolbar, but keep available in the Dashboard
     *
     * @return void
     */
    public function removeAdminBar()
    {
        add_filter('show_admin_bar', '__return_false');
    }


    /**
     * Customize admin CSS to admin and login
     *
     * @return void
     */
    public function addAdminStyles()
    {
        wp_enqueue_style('my-admin-theme', get_stylesheet_directory_uri() . '/app/Kernl/assets/styles/wp-admin.css');
    }


    /**
     * Add Custom Post Type to WP-ADMIN At a Glance Widget
     *
     * @return void
     */
    public function editDashboardGlanceItems()
    {
        $args = array(
          'public' => true ,
          '_builtin' => false
        );
        $output = 'object';
        $operator = 'and';
        $post_types = get_post_types( $args , $output , $operator );
        foreach( $post_types as $post_type) {
          $num_posts = wp_count_posts( $post_type->name );
          $num = number_format_i18n( $num_posts->publish );
          $text = _n( $post_type->labels->name, $post_type->labels->name , intval( $num_posts->publish ) );
          if (current_user_can( 'edit_posts' )) {
              $cpt_name = $post_type->name;
          }
          echo '<li class="post-count"><tr><a href="edit.php?post_type='.$cpt_name.'"><td class="first b b-' . $post_type->name . '"></td>' . $num . '&nbsp;<td class="t ' . $post_type->name . '">' . $text . '</td></a></tr></li>';
        }

        $taxonomies = get_taxonomies( $args , $output , $operator );
        foreach ($taxonomies as $taxonomy) {
          $num_terms  = wp_count_terms( $taxonomy->name );
          $num = number_format_i18n( $num_terms );
          $text = _n( $taxonomy->labels->name, $taxonomy->labels->name , intval( $num_terms ));
          if (current_user_can( 'manage_categories' )) {
              $cpt_tax = $taxonomy->name;
          }
          echo '<li class="post-count"><tr><a href="edit-tags.php?taxonomy='.$cpt_tax.'"><td class="first b b-' . $taxonomy->name . '"></td>' . $num . '&nbsp;<td class="t ' . $taxonomy->name . '">' . $text . '</td></a></tr></li>';
        }
    }


    /**
     * Remove unnecessary dashboard meta boxes
     *
     * @return void
     */
    public function removeDashboardMetadata()
    {
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );
    }


    /**
     * Advanced Custom Fields options menu
     * @return void
     */
    public function acfOptionsMenu()
    {
        if (function_exists('acf_add_options_page') && function_exists('acf_add_options_sub_page')) {
            $options = acf_add_options_page([
                'page_title'  => 'Theme Options',
                'menu_title'  => 'Theme Options',
                'menu_slug'   => 'theme-options',
                'capability'  => 'edit_posts',
                'redirect'    => true
            ]);

            $options_settings = acf_add_options_sub_page([
                'title' => 'Settings',
                'parent' => 'theme-options',
                'capability' => 'edit_posts'
            ]);

            $options_homepage = acf_add_options_sub_page([
                'title' => 'Homepage',
                'parent' => 'theme-options',
                'capability' => 'edit_posts'
            ]);
        }
    }

    /**
     * Custom ACF save point destination
     * @param  string $path
     * @return string path to acf-json
     */
    public function acfJsonSavePoint($path)
    {
        $path = dirname(__FILE__) . '/assets/acf-json';
        return $path;
    }

    /**
     * Custom ACF loading point
     * @param  string $paths
     * @return array  local path to load acf-json
     */
    public function acfJsonLoadPoint($paths)
    {
        unset($paths[0]);
        $paths[] = dirname(__FILE__) . '/assets/acf-json';
        return $paths;
    }
}
