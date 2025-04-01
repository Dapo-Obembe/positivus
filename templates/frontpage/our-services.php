<?php
/**
 * Template: Our Services
 */

 // ACF DATA
 $service_section_title = get_field( 'service_section_title' );
 $service_section_subtitle = get_field( 'service_section_subtitle' );

?>
<section data-animate="fadeInUp" class="our-service py-[35px] lg:py-[70px] px-[1rem] lg:px-[2.5rem]">
    <div class="container">
        <?php if( $service_section_title ) : ?>
            <h2 class="text-primary uppercase text-sm font-bold"><?php echo esc_html( $service_section_title ); ?></h2>
        <?php endif; ?>

        <?php if( $service_section_subtitle ) : ?>
            <h3 class="subtitle text-secondary text-[1.875rem] lg:text-[2.5rem] w-full lg:max-w-[600px]"><?php echo wp_kses_post( $service_section_subtitle ); ?></h2>
        <?php endif; ?>

        <!-- Services Lists -->
        <?php get_template_part( 'templates/components/service-lists' ); ?>
    </div>
</section>