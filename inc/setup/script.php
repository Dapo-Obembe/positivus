<?php
/**
 * Theme scripts and styles declarations.
 * 
 * @package AlphaWebConsult
 * 
 * @author Dapo Obembe <https://www.dapoobembe.com>
 */

if(!defined('ABSPATH')) exit;

// Theme assets version
define( 'THEME_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * Filters WordPress URLs to point to the webpack-dev-server during development.
 * This ensures that all internal links are proxied, keeping HMR active.
 */
if ( wp_get_environment_type() === 'local' ) {
    $local_site_url = 'http://swiftplate.local'; // Change your wordpress local server URL.
    $proxy_url = 'http://localhost:9000';

    // Disable canonical redirects that might interfere
    add_action('init', function() {
        remove_action('template_redirect', 'redirect_canonical');
    });
    
    // Core URL filters
    add_filter( 'home_url', function( $url ) use ( $local_site_url, $proxy_url ) {
        return str_replace( $local_site_url, $proxy_url, $url );
    }, 100 );

    add_filter( 'site_url', function( $url ) use ( $local_site_url, $proxy_url ) {
        return str_replace( $local_site_url, $proxy_url, $url );
    }, 100 );

    // Additional filters to catch more redirect scenarios
    add_filter( 'wp_redirect', function( $location ) use ( $local_site_url, $proxy_url ) {
        return str_replace( $local_site_url, $proxy_url, $location );
    }, 100 );

    add_filter( 'redirect_canonical', function( $redirect_url ) use ( $local_site_url, $proxy_url ) {
        if ( $redirect_url ) {
            return str_replace( $local_site_url, $proxy_url, $redirect_url );
        }
        return $redirect_url;
    }, 100 );

    // Handle REST API URLs
    add_filter( 'rest_url', function( $url ) use ( $local_site_url, $proxy_url ) {
        return str_replace( $local_site_url, $proxy_url, $url );
    }, 100 );

    // Your existing filters...
    add_filter( 'page_link', function( $link ) use ( $local_site_url, $proxy_url ) {
        return str_replace( $local_site_url, $proxy_url, $link );
    }, 100 );

    add_filter( 'post_link', function( $link ) use ( $local_site_url, $proxy_url ) {
        return str_replace( $local_site_url, $proxy_url, $link );
    }, 100 );

    add_filter( 'template_directory_uri', function( $url ) use ( $local_site_url, $proxy_url ) {
        return str_replace( $local_site_url, $proxy_url, $url );
    }, 100 );
}

if ( ! function_exists( 'alphawebplate_enqueue_scripts' ) ) :
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	function alphawebplate_enqueue_scripts() {
        // Check the environment and set the correct asset paths
        if ( wp_get_environment_type() === 'local' ) {
            // DEVELOPMENT: Load assets from Webpack Dev Server and local paths
            $base_js_url = 'http://localhost:9000/dist/js/';

            wp_enqueue_style( 
                'tailwind-css', 
                get_template_directory_uri() . '/assets/css/output.css',
                [],
                THEME_VERSION
            );

        } else {
            // PRODUCTION: Load assets from the theme's dist folder
            $base_js_url = get_template_directory_uri() . '/dist/js/';

            wp_enqueue_style( 
                'tailwind-css', 
                get_template_directory_uri() . '/dist/css/tailwind.css',
                [],
                THEME_VERSION
            );
        }

        // Register the Inter font
        wp_register_style('inter-font', get_template_directory_uri() . '/src/fonts/inter/inter.css', array(), THEME_VERSION);

        // Enqueue the Inter font
        wp_enqueue_style('inter-font');

        // Enqueue general theme scripts
        wp_enqueue_script('main-js', get_template_directory_uri() . '/dist/js/main.js', array(), THEME_VERSION, true);

        // Enqueue homepage scripts
        if (is_front_page()) {
            wp_enqueue_script('home-js', get_template_directory_uri() . '/dist/js/home.js', array(), THEME_VERSION, true);
        }

        // Enqueue about page scripts
        if ( is_page_template( 'page-about.php' ) ) {
            wp_enqueue_script('about-js', get_template_directory_uri() . '/dist/js/about.js', array(), THEME_VERSION, true);
        }

        // Enqueue contact page scripts
        if ( is_page_template( 'page-contact.php' ) ) {
            wp_enqueue_script('contact-js', get_template_directory_uri() . '/dist/js/contact.js', array('jquery'), THEME_VERSION, true);
        }

    }
endif;
add_action( 'wp_enqueue_scripts', 'alphawebplate_enqueue_scripts' );