<?php
/**
 * Block: Services Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int|string $post_id The post ID this block is saved to.
 * @package AlphaWebConsult
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'services-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$block_class = 'services';
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
		<?php
		if ( have_rows( 'services' ) ) :
			while ( have_rows( 'services' ) ) :
				the_row();
				// Fetch the subfield data.
				$service_title    = get_sub_field( 'service_title' );
				$service_link     = get_sub_field( 'service_link' );
				$service_image    = get_sub_field( 'service_image' );
				$service_bg_color = get_sub_field( 'service_bg_color' );
				?>
				<div class="service-card <?php echo esc_attr( $service_bg_color ); ?> ">
					<div class="service-text-link flex flex-col items-stretch justify-between">
						<h3><?php echo esc_html( $service_title ); ?></h3>
						<div class="flex items-center gap-4">
							<?php
								echo the_svg(
									'arrow-up-right-circle',
									array(
										'width'  => 32,
										'height' => 32,
										'class'  => '!bg-primary rounded-full ',
									)
								);
							?>
							<a href="<?php echo esc_url( $service_link['url'] ); ?>"><?php echo esc_html__( 'Learn More', 'positivus' ); ?></a>
						</div>
					</div>
					<?php
					if ( ! empty( $service_image ) ) :
						?>
							<?php
							echo wp_get_attachment_image(
								$service_image['ID'],
								'medium',
								false,
								array(
									'class'   => 'object-contain  w-[210px] h-[166.05px]',
									'loading' => 'lazy',
									'alt'     => $service_title,
								)
							);
							?>
						<?php
						endif;
					?>
				</div>
				
				<?php
			endwhile;
		endif;
		?>
	</div>

</section>
	
