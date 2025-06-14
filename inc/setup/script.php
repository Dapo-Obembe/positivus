<?php
/**
 * Theme scripts and styles declarations.
 * 
 * @package AlphaWebConsult
 * 
 * @author Dapo Obembe <https://www.dapoobembe.com>
 */
if(!defined('ABSPATH')) exit;


if ( ! function_exists( 'alphawebplate_scripts' ) ) :
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	function alphawebplate_scripts() {
        // Enqueue Tailwind CSS (development or production)
        if ( wp_get_environment_type() === 'local' ) {
                wp_enqueue_style( 
                    'tailwind-css', 
                    get_template_directory_uri() . '/src/css/output.css' 
                );
            } else {
                // Use production path (minified, from dist/css/tailwind.css)
                wp_enqueue_style( 
                    'tailwind-css', 
                    get_template_directory_uri() . '/dist/css/tailwind.css' 
                );
        }

        // Register the Inter font
        wp_register_style('inter-font', get_template_directory_uri() . '/src/fonts/inter/inter.css', array(), null);

        // Enqueue the Inter font
        wp_enqueue_style('inter-font');

        // Enqueue general theme scripts
        wp_enqueue_script('main-js', get_template_directory_uri() . '/dist/js/main.js', array(), null, true);

        // Enqueue homepage scripts
        if (is_front_page()) {
            wp_enqueue_script('home-js', get_template_directory_uri() . '/dist/js/home.js', array(), null, true);
        }

        // Enqueue about page scripts
        if (is_page('about')) {
            wp_enqueue_script('about-js', get_template_directory_uri() . '/dist/js/about.js', array(), null, true);
        }

        // Enqueue contact page scripts
        if (is_page('contact')) {
            wp_enqueue_script('contact-js', get_template_directory_uri() . '/dist/js/contact.js', array('jquery'), null, true);
        }

    }
endif;
add_action( 'wp_enqueue_scripts', 'alphawebplate_scripts' );