<?php
/**
 * Block: Mycountry Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int|string $post_id The post ID this block is saved to.
 * @package AlphaWebConsult
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'mycountry-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

$block_class = 'mycountry';

// ACF DATA.
$page_title       = get_field( 'country_page_title' );
$page_description = get_field( 'country_page_description' );
?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $block_class ); ?> flex items-center bg-[#191970] min-h-screen flex-col justify-center py-10 gap-10">
	<div class="container text-white text-center">
		<div class="w-full max-w-3xl mx-auto">
			<?php if ( ! empty( $page_title ) ) : ?>
				<h1><?php echo wp_kses_post( $page_title ); ?></h1>
			<?php else : ?>
				<h1>Country Information Finder</h1>
			<?php endif; ?>

			<?php if ( ! empty( $page_description ) ) : ?>
				<p class="text-xl"><?php echo esc_html( $page_description ); ?></p>
			<?php else : ?>
				<p class="text-xl">Use the search box below to get details about any country.</p>
			<?php endif; ?>
		</div>
	</div>

	<div class="w-full max-w-3xl mx-auto mt-10 bg-[#44444480] backdrop-blur rounded-[10px] p-4">
		<div class="search-wrapper flex items-center gap-2">
			<input type="search" id="country-inp" placeholder="Enter country name here" autocomplete="off" class="flex-1 p-4 bg-transparent rounded-[10px] font-bold text-base text-white border-b border-b-[#fff599] focus:outline-none focus:ring-2 focus:ring-blue-500">
			<button type="submit" id="search-btn" class="shrink-0 rounded-full bg-blue-700 hover:bg-blue-800 transition-colors p-4 text-white">Search</button>
		</div>
		<div id="search-result" class="text-white mt-6 hidden p-4"></div>
	</div>
</section>
