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
$blog_hero_title        = get_field( 'blog_hero_title', 'option' );
$blog_hero_subtitle     = get_field( 'blog_hero_subtitle', 'option' );

get_header();
?>
<!--HERO SECTION -->
<section class="w-full py-[35px] lg:pt-[75px] lg:pb-[30px] px-[1rem] lg:px-[2.5rem]">
    <div class="container">
        <?php if( $blog_hero_title ) : ?>
            <h1 class="text-primary uppercase text-[1rem] font-bold"><?php echo esc_html( $blog_hero_title ); ?></h1>
        <?php endif; ?>

        <?php if( $blog_hero_subtitle ) : ?>
            <h2 class="subtitle text-secondary text-[2rem] lg:text-[3rem] w-full lg:max-w-[600px]"><?php echo wp_kses_post( $blog_hero_subtitle ); ?></h2>
        <?php endif; ?>

    </div>
    
</section>

<!-- BLOG LISTS -->
<section data-animate="fadeInUp" class="blog-lists w-full py-[35px] lg:pt-[35px] lg:pb-[75px] px-[1rem] lg:px-[2.5rem]">
	<div class="container">
		<?php
		if ( have_posts() ) : ?>
			<div class="blog-lists-wrapper grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
				<?php while ( have_posts() ) : 
					the_post();

					$thumbnail_id = get_post_thumbnail_id();
					$image_attributes = $thumbnail_id ? wp_get_attachment_image_src( $thumbnail_id, 'full' ) : false;
					$width = $image_attributes ? $image_attributes[1] : 800; 
					$height = $image_attributes ? $image_attributes[2] : 450; 

					// Determine if image is above the fold - first 3 on desktop, first 1 on mobile
					$is_above_fold = wp_is_mobile() 
						? ($wp_query->current_post < 1) 
						: ($wp_query->current_post < 3);
					?>

					<article class="min-h-[300px] p-4 rounded-lg bg-white border-1 border-secondary/50 group">
						<a href="<?php echo esc_url( get_the_permalink() ); ?>">
							<figure class="mb-4 h-[240px] rounded-lg overflow-hidden bg-gray-300">
								<?php 
								$thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
								$fallback_url = 'https://www.alphawebtips.com/wp-content/uploads/2025/02/no-thumbnail.webp';
								?>
								<img 
									class="aspect-video w-full h-full group-hover:scale-110 transition-transform duration-300 ease-in"
									src="<?php echo esc_url( $thumbnail_url ? $thumbnail_url : $fallback_url ); ?>" 
									srcset="<?php echo $thumbnail_id ? esc_attr( wp_get_attachment_image_srcset( $thumbnail_id, 'full' ) ) : ''; ?>" 
									sizes="(max-width: 1024px) 100vw, 60vw" 
									alt="<?php echo esc_attr( get_the_title() ); ?>" 
									loading="<?php echo $is_above_fold ? 'eager' : 'lazy'; ?>"
									width="<?php echo $width; ?>" 
									height="<?php echo $height; ?>" 
								>
							</figure>
						</a>
						<h3 class="text-2xl">
							<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="group-hover:text-primary transition-all duration-300 ease-in">
								<?php echo esc_html( get_the_title() ); ?>
							</a>
						</h3>
					</article>

				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
		<?php print_numeric_pagination();?>
	</div>
</section>	

<?php
get_footer();
