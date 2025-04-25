<?php
/**
 * Cache Assets
 * 
 * Doing this, no need to manually edit the .htaccess file.
 * 
 * @package AlphaWebConsult
 */

function awc_add_cache_headers() {
    // For JavaScript files
    if (endsWith($_SERVER['REQUEST_URI'], '.js')) {
        header('Cache-Control: public, max-age=2592000'); // 30 days
        header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 2592000) . ' GMT');
    }
    // For CSS files
    else if (endsWith($_SERVER['REQUEST_URI'], '.css')) {
        header('Cache-Control: public, max-age=2592000'); // 30 days
        header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 2592000) . ' GMT');
    }
    // For image files
    else if (preg_match('/\.(jpg|jpeg|png|gif|avif|webp|svg|ico)$/i', $_SERVER['REQUEST_URI'])) {
        header('Cache-Control: public, max-age=31536000'); // 1 year
        header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
    }
    // For font files
    else if (preg_match('/\.(ttf|woff|woff2|eot|otf)$/i', $_SERVER['REQUEST_URI'])) {
        header('Cache-Control: public, max-age=31536000'); // 1 year
        header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
    }
}

// Helper function to check if string ends with a specific substring
function endsWith($haystack, $needle) {
    return substr_compare($haystack, $needle, -strlen($needle)) === 0;
}

// Hook the function to WordPress init
add_action('init', 'awc_add_cache_headers');