<?php
/**
 * The CONTACT PAGE template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package alphawebplate-tw
 */
if(!defined('ABSPATH')) exit;

get_header();
?>
    <!-- Hero section -->
    <?php get_template_part( 'template-parts/contact/hero' ); ?>

    <!-- Form Wrapper -->
    <?php get_template_part( 'template-parts/contact/form-wrapper' ); ?>


<?php
get_footer();
