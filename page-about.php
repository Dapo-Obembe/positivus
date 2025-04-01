<?php
/**
 * The ABOUT PAGE template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package alphawebplate-tw
 */

get_header();
?>
    <!-- Hero section -->
    <?php get_template_part( 'templates/about/hero' ); ?>

    <!-- Solutions Section -->
    <?php get_template_part( 'templates/about/solutions' ); ?>

    <!-- Vision & Mission Section -->
    <?php get_template_part( 'templates/about/vision-mission' ); ?>

<?php
get_footer();
