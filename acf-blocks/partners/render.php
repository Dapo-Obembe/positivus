<?php
/**
 * Block: Partners Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int|string $post_id The post ID this block is saved to.
 * @package AlphaWebConsult
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'partners-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$block_class = 'partners';
if ( ! empty( $block['className'] ) ) {
	$block_class .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$block_class .= ' align' . $block['align'];
}

?>
<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class ); ?> mt-[70px] flex items-center">
	
	<div class="container flex flex-nowrap justify-center gap-10">
		<?php
		if ( have_rows( 'partners' ) ) :
			while ( have_rows( 'partners' ) ) :
				the_row();
				// Fetch the subfield data.
				$partner_image = get_sub_field( 'partner_image' );
				?>
				<?php
				if ( ! empty( $partner_image ) ) :
					?>
					<?php
					echo wp_get_attachment_image(
						$partner_image['ID'],
						'large',
						false,
						array(
							'class'   => 'object-cover object-center w-full h-full',
							'loading' => 'eager',
						)
					);
					?>
					<?php
				endif;
				?>
				<?php
			endwhile;
		endif;
		?>
	</div>

</section>
	
