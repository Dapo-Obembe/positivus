<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package AlphaWebConsult
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
	<div class="search-result">

		<div class="search-result__container container">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'carecode' ), '<span><strong>' . get_search_query() . '</strong></span>' );
						?>
					</h1>
				</header>
				<div class="search-result-posts">

				<?php
				while ( have_posts() ) { ?>
					<?php the_post(); 

					get_template_part( 'templates/content', 'search' ); ?>

				<?php }?>
				</div>

				<?php print_numeric_pagination();
				?>

				<?php else : ?>

					<?php get_template_part( 'templates/content', 'none' ); ?>

				<?php endif; ?>

		</div>

	</div>
</main>

<?php
get_footer();
