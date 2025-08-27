<?php
/**
 * Block: Contact Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int|string $post_id The post ID this block is saved to.
 * @package AlphaWebConsult
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'contact-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$block_class = 'contact';
if ( ! empty( $block['className'] ) ) {
	$block_class .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$block_class .= ' align' . $block['align'];
}

// ACF DATA.
$section_title       = get_field( 'section_title' );
$section_description = get_field( 'section_description' );

$say_hi_form      = get_field( 'say_hi_form' );
$get_a_quote_form = get_field( 'get_a_quote_form' );
$contact_image    = get_field( 'contact_image' );

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

		<div class="contact-wrapper !bg-accent rounded-[45px] flex flex-wrap lg:flex-nowrap justify-between items-center gap-10">
			<div class="left basis-[100%] lg:basis-[50%]">
				<?php if ( ! empty( $get_a_quote_form ) ) : ?>
					<div class="psv-form"><?php echo do_shortcode( $get_a_quote_form ); ?></div>
				<?php endif; ?>
			</div>
			<div class="right basis-[100%] lg:basis-[50%] flex justify-end items-center">
				<?php
				if ( ! empty( $contact_image ) ) :
					echo wp_get_attachment_image(
						$contact_image['ID'],
						'large',
						false,
						array(
							'class'   => 'object-cover mr-[-50px]',
							'alt'     => 'Contact image',
							'loading' => 'lazy',
						)
					);

				endif;
				?>
			</div>
		</div>
	</div>

</section>
	
