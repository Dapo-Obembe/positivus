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

// Rendering in inserter.
if ( isset( $block['data']['preview_home-page_help'] ) ) :
	echo '<img src="' . $block['data']['preview_home-page_help'] . '" style="width:100%; height:auto;">';

else :

	?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class ); ?> min-h-screen bg-primary">
	
	<div class="container">
		HERO SECTION
	</div>

</section>

<?php endif; ?>
