<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Kernl setup
 */

if (class_exists('Kernl\\Lib\\Config')) {
    new \Kernl\Lib\Config(); // kernl(lib)
    new \Kernl\Site(); // kernl(wp)
}

/**
 * ACF JSON paths
 * saves/loads from app/site/acf-json
 */

// ACF Save path
add_filter('acf/settings/save_json', function ($path) {
    return dirname(__FILE__) . '/site/acf-json';
});

// ACF Load path
add_filter('acf/settings/load_json', function ($paths) {
    unset($paths[0]);
    $paths[] = dirname(__FILE__) . '/site/acf-json';
    return $paths;
});


/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    // Add stylesheet for TinyMCE
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

add_action( 'http_api_curl', function ( $handle, $parsed_args, $url ) {
    if ( strpos( $url, 'https://coopstatus.neu.edu/nu_api/calendar_event/?cal=nuworks' ) !== false ) {
		$headers = array();
        $headers[] = 'Content-Type: : application/json';
		$headers[] = 'Token: 0f52a76e-d3cf-46c8-b3d5-de9dd4ea1865';
		curl_setopt( $handle, CURLOPT_HTTPHEADER, $headers );    				
	}
}, 10, 3 );
