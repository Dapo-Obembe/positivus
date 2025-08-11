<?php
/**
 * Block: Hero Section Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int|string $post_id The post ID this block is saved to.
 * @package AlphaWebConsult
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'hero-section-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$block_class = 'hero-section';
if ( ! empty( $block['className'] ) ) {
	$block_class .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$block_class .= ' align' . $block['align'];
}

// ACF DATA.
$hero_section_title       = get_field( 'hero_section_title' );
$hero_section_description = get_field( 'hero_section_description' );
$hero_section_button      = get_field( 'hero_section_button' );
$hero_section_image       = get_field( 'hero_section_image' );

// Rendering in inserter.
if ( isset( $block['data']['preview_home-page_help'] ) ) :
	echo '<img src="' . $block['data']['preview_home-page_help'] . '" style="width:100%; height:auto;">';

else :

	?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class ); ?> min-h-screen bg-primary">
	
	<div class="container flex flex-wrap lg:flex-nowrap justify-between gap-10">
		<div class="basis-[100%] lg:basis-[50%]">
			<?php if ( ! empty( $hero_section_title ) ) : ?>
				<h1><?php echo esc_html( $hero_section_title ); ?></h1>
				<?php else : ?>
					<h1><?php echo esc_html__( 'This is the title for this section', 'positivus' ); ?></h1>
			<?php endif; ?>

			<?php if ( ! empty( $hero_section_description ) ) : ?>
				<p><?php echo esc_html( $hero_section_description ); ?></p>
				<?php else : ?>
					<p><?php echo esc_html__( 'Edit the description in the backend', 'positivus' ); ?></p>
			<?php endif; ?>

			<?php
			if ( ! empty( $hero_section_button ) ) :
				$button_title = $hero_section_button['title'];
				$button_url   = $hero_section_button['url'];

				echo awc_button( $button_title, $button_url, 'primary' ); // phpcs:ignore
			endif;
			?>

		</div>

		<?php
		if ( ! empty( $hero_section_image ) ) :
			echo wp_get_attachment_image(
				$hero_section_image['ID'],
				'large',
				false,
				array(
					'class'   => 'basis-[100%] lg:basis-[50%] object-cover object-center',
					'loading' => 'eager',
				)
			);
			endif;
		?>

	</div>

</section>

<?php endif; ?>
