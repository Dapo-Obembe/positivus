<?php
/**
 * The main blog archive template file.
 * Edit to match your design.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AlphaWebConsult
 */
// ACF DATA for this section.
$blog_hero_title    = get_field( 'blog_hero_title', 'option' );
$blog_hero_subtitle = get_field( 'blog_hero_subtitle', 'option' );

get_header();
?>
	
		<section class="py-20">
			<div class="container">

			<h1><?php echo $blog_hero_title; ?></h1>

			<?php
				$post_args = array(
					'post-type'          => 'work',
					'posts_per_page'     => 4,
					'post_status'        => 'publish',
					'order'              => 'DESC',
					'ignore_sticky_post' => true,
				)

				$archive_query = new WP_Query( $post_args );

				if ( $archive_query->have_posts() ) :
					?>
				<div class="posts-wrapper grid grid-cols-1 lg:grid-cols-3">
						<?php
						while ( $archive_query->have_posts() ) :
							$archive_query->the_post();

							$post_title = get_the_title();

							$work_id = get_the_ID();

							$feature = get_field( 'is_featured', $work_id );

							?>
						<article class="bg-primary text-white rounded-lg">
							<figure>
								<?php echo awc_post_thumbnail(); ?>
							</figure>
							<h2><a href="<?php echo esc_url( the_permalink() ); ?>"><?php echo esc_html( $post_title ); ?></a></h2>
						</article>

						<?php endwhile; ?>
				</div>
					<?php
			endif;
				wp_reset_postdata();
				?>


			</div>
		</section>
		
<?php
get_footer();
