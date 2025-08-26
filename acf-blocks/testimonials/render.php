<?php
/**
 * Block: Testimonials Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int|string $post_id The post ID this block is saved to.
 * @package AlphaWebConsult
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'testimonials-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$block_class = 'testimonials';
if ( ! empty( $block['className'] ) ) {
	$block_class .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$block_class .= ' align' . $block['align'];
}

// ACF DATA.
$section_title       = get_field( 'section_title' );
$section_description = get_field( 'section_description' );
?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class ); ?> mt-[70px] flex items-center">
	
	<div class="container">
		<div class="flex items-center mb-[85px]">
			<?php if ( ! empty( $section_title ) ) : ?>
				<h2><?php echo esc_html( $section_title ); ?></h2>
			<?php endif; ?>

			<?php if ( ! empty( $section_description ) ) : ?>
				<p class="max-w-[580px] ml-[47px]"><?php echo esc_html( $section_description ); ?></p>
			<?php endif; ?>
		</div>
		
		<div class="swiper testimonials-container bg-secondary rounded-[45px] min-h-[625px] py-[84px] px-0 overflow-hidden">
			<div class="swiper-wrapper justify-center">
				<?php
				if ( have_rows( 'testimonials' ) ) :
					while ( have_rows( 'testimonials' ) ) :
						the_row();

						$testimonial_note    = get_sub_field( 'testimonial_note' );
						$testimonial_name    = get_sub_field( 'testimonial_name' );
						$testimonial_company = get_sub_field( 'testimonial_company' );
						?>
							<div class="swiper-slide shrink-0 w-full max-w-[606px] text-white">
								<?php if ( ! empty( $testimonial_note ) ) : ?>
									<p class="min-h-[266px] py-12 px-[52px] rounded-[45px] border border-primary"><?php echo esc_html( $testimonial_note ); ?></p>
								<?php endif; ?>

								<div class="name max-w-[526px] ml-auto mt-12">
									<?php if ( ! empty( $testimonial_name ) ) : ?>
										<p class="text-primary font-bold"><?php echo esc_html( $testimonial_name ); ?></p>
									<?php endif; ?>
									<?php if ( ! empty( $testimonial_company ) ) : ?>
										<p><?php echo esc_html( $testimonial_company ); ?></p>
									<?php endif; ?>
								</div>
							</div>
						<?php
					endwhile;
					?>
					<?php elseif ( $is_preview ) : ?>
						<?php // This message shows ONLY in the editor preview when no images are selected. ?>
						<p style="font-style: italic; color: #666;">Please add testimonils from the block settings.</p>
						<?php
				endif;
					?>

			</div>
			
			<div class="navigators flex justify-between items-center max-w-[564px] mx-auto mt-[124px]">
				<?php
				echo the_svg(
					'arrow-left',
					array(
						'class'  => 'testimonial-prev text-white',
						'width'  => 20,
						'height' => 20,
					)
				);
				?>
				<?php
				echo the_svg(
					'arrow-right',
					array(
						'class'  => 'testimonial-next text-white',
						'width'  => 20,
						'height' => 20,
					)
				);
				?>
			</div>
		</div>
		
	</div>

</section>
	
