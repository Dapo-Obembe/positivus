<?php
/**
 * Block: Faqs Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int|string $post_id The post ID this block is saved to.
 * @package AlphaWebConsult
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'faqs-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$block_class = 'faqs';
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
		if ( have_rows( 'faq_items' ) ) :
			$counter = 1;
			while ( have_rows( 'faq_items' ) ) :
				the_row();
				$faq_question = get_sub_field( 'question' );
				$faq_answer   = get_sub_field( 'answer' );
				?>
				<ol class="faq-items w-full">
					<li class="faq-list w-full text-3xl bg-primary rounded-[45px] py-[41px] px-[57px] border border-b-4 border-secondary">
					<?php if ( ! empty( $faq_question ) ) : ?>
						<button class="w-full flex justify-between items-center">
							<span class="flex justify-start items-center">
								<span class="text-[60px] mr-[24px]"><?php printf( '%02d', $counter ); ?></span>
								<?php echo esc_html( $faq_question ); ?>
							</span>
							<?php
							echo the_svg(
								'plus',
								array(
									'width'  => 58,
									'height' => 58,
									'title'  => 'Open this question',
									'class'  => 'faq-open text-accent bg-secondary rounded-full border-secondary',
								)
							);
							?>
							<?php
							echo the_svg(
								'minus',
								array(
									'width'  => 58,
									'height' => 58,
									'title'  => 'Close this question',
									'class'  => 'faq-close hidden text-accent bg-secondary rounded-full border-secondary',
								)
							);
							?>
						</button>
					<?php endif; ?>

					<?php if ( $faq_answer ) : ?>
						<div class="answer !text-lg pt-[30px] hidden border-t-2 border-secondary">
							<?php echo wp_kses_post( $faq_answer ); ?>
						</div>
					<?php endif; ?>
					</li>
				</ol>
				<?php
			endwhile;
		endif;
		?>
	</div>

</section>
	
