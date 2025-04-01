<?php
/**
 * Theme scripts and styles declarations.
 */

// Enqueues style.css on the front.
if ( ! function_exists( 'awc_tw_plate_scripts' ) ) :
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	function awc_tw_plate_scripts() {
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

    // SWIPER JS.
    if( is_front_page(  ) ) {
        wp_enqueue_style( 'swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), null, 'all' );
        wp_enqueue_script( 'swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array( 'jquery' ), null, true );
    }

    // Enqueue general theme scripts
    wp_enqueue_script('theme-js', get_template_directory_uri() . '/src/js/theme.js', array('jquery'), null, true);
    wp_enqueue_script('mobile-nav', get_template_directory_uri() . '/src/js/mobile-nav.js', array(), null, true);

    // Enqueue homepage scripts
    if (is_front_page()) {
        wp_enqueue_script('home-js', get_template_directory_uri() . '/src/js/home.js', array('jquery'), null, true);
       
    }

    // Enqueue about page scripts
    if (is_page('about')) {
        wp_enqueue_script('about-js', get_template_directory_uri() . '/src/js/about.js', array(), null, true);
    }

    // Enqueue contact page scripts
    if (is_page('contact')) {
        wp_enqueue_script('contact-js', get_template_directory_uri() . '/src/js/contact.js', array('jquery'), null, true);
        wp_enqueue_style('sweetalert2-css', 'https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css');
		wp_enqueue_script('sweetalert2-js', 'https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js', array('jquery'), '10.16.6', true);
    }

}
endif;
add_action( 'wp_enqueue_scripts', 'awc_tw_plate_scripts' );

/**
 * Defer some scripts.
 */
function defer_scripts( $tag, $handle, $src ) {
    // Add defer attribute to specific scripts
    $defer_scripts = array( 'swiper-script' );
    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . $src . '" defer></script>';
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'defer_scripts', 10, 3 );

function disable_block_library_css_on_specific_pages() {
    if ( !is_single() ) {
        // Dequeue the block library CSS
        wp_dequeue_style( 'wp-block-library' );
    }
}
add_action( 'wp_enqueue_scripts', 'disable_block_library_css_on_specific_pages', 100 );