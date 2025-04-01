<?php
/**
 * The Front-Page template file.
 *
 * This template is for the home page. Arrange the template files
 * to how you want it to show.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package alphawebplate-tw
 * @author Dapo Obembe | https://www.dapoobembe.com
 */

get_header();
?>
    <!-- Hero section -->
    <?php get_template_part( 'templates/frontpage/hero' ); ?>

    <!-- Recent Posts -->
    <?php get_template_part( 'templates/frontpage/recent-posts' ); ?>  

<?php
get_footer();