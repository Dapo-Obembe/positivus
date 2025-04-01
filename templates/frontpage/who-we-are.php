<?php
/**
 * Template: Who We Are
 */

 // ACF DATA
 $section_title = get_field( 'section_title' );
 $section_subtitle = get_field( 'section_subtitle' );
 $about_image = get_field( 'about_image' );
 $before_description = get_field( 'before_description' );
 $about_description = get_field( 'about_description' );
 $about_more = get_field( 'about_more' );

?>
<section data-animate="fadeInUp" class="about-us bg-white py-[35px] lg:py-[70px] px-[1rem] lg:px-[2.5rem]">
    <div class="container">
        <?php if( $section_title ) : ?>
            <h2 class="text-primary uppercase text-sm font-bold"><?php echo esc_html( $section_title ); ?></h2>
        <?php endif; ?>

        <?php if( $section_subtitle ) : ?>
            <h3 class="subtitle text-secondary text-[1.875rem] lg:text-[2.5rem] w-full lg:max-w-[600px]"><?php echo wp_kses_post( $section_subtitle ); ?></h2>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-8">
            <div class="left flex flex-col justify-between gap-8">
                <?php if( have_rows( 'about_stats' )) : ?>
                    <?php while( have_rows( 'about_stats' )) : the_row(); 
                        $stat_figure = get_sub_field( 'stat_figure' );
                        $stat_title = get_sub_field( 'stat_title' );
                    ?>
                    <div class="flex justify-between items-center flex-nowrap gap-4">
                        <?php if( $stat_figure ) : ?>
                            <p class="text-primary text-3xl lg:text-5xl font-bold italic"><?php echo esc_html( $stat_figure ); ?></p>
                        <?php endif; ?>
                            <hr class="w-[50%] border-2 bg-primary-light" />
                        <?php if( $stat_title ) : ?>
                            <p class="text-xl whitespace-nowrap"><?php echo esc_html( $stat_title ); ?></p>
                        <?php endif; ?>
                        
                    </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="middle ">
                <img src="<?php echo wp_get_attachment_image_url( $about_image['ID'], 'full' ); ?>" alt="<?php echo esc_attr($about_image['alt']); ?>" loading="lazy" width="100%' height="auto" class="rounded-lg h-full">
            </div>
            <div class="right flex flex-col gap-8">
                <?php if( $before_description ) : ?>
                    <p class="text-2xl lg:text-3xl font-bold"><?php echo esc_html( $before_description ); ?></p>
                <?php endif; ?>
                <?php if( $about_description ) : ?>
                    <p class="text-xl"><?php echo esc_html( $about_description ); ?></p>
                <?php endif; ?>
                 <?php
                    if ( $about_more ) :
                    	$link_url    = $about_more['url'];
                    	$link_title  = $about_more['title'];
                    	$link_target = $about_more['target'] ? $about_more['target'] : '_self';
                        ?>
                        <a  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" role="button" class="primary-button w-fit">
                        <?php echo esc_html( $link_title ); ?>
                        </a>
                    <?php endif; ?>
            </div>
        </div>
    </div>
</section>