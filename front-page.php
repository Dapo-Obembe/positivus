<?php
/**
 * The Front-Page template file.
 *
 * This template is for the home page. Arrange the template files
 * to how you want it to show.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package positivus
 * @author Dapo Obembe | https://www.dapoobembe.com
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
	<main id="main" class="site-main mt-0 mb-0" role="main">
		<div class="entry-content ">

		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				the_content();

			endwhile;
		endif;
		?>
				
		</div> <!-- .entry-content -->
	</main>

<?php
get_footer();
