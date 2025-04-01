<?php
/**
 * HERO SECTION - ABOUT PAGE
 * 
 * @package alphawebplate-tw
 * 
 * @author Dapo Obembe | https://www.dapoobembe.com
 */

 // ACF DATA for this section.
 $about_hero_title = get_field( 'about_hero_title' );
 $about_hero_subtitle = get_field( 'about_hero_subtitle' );
 $about_hero_image = get_field( 'about_hero_image' );

 $about_hero_description = get_field( 'about_hero_description' );
 $about_hero_button = get_field( 'about_hero_button' );

 $about_hero_box_image = get_field( 'about_hero_box_image' );
 $about_hero_box_text = get_field( 'about_hero_box_text' );
?>

<section class="w-full py-[35px] lg:py-[75px] px-[1rem] lg:px-[2.5rem]">
    <div class="container">
        <?php if( $about_hero_title ) : ?>
            <h1 class="text-primary uppercase text-[1rem] font-bold"><?php echo esc_html( $about_hero_title ); ?></h1>
        <?php endif; ?>

        <?php if( $about_hero_subtitle ) : ?>
            <h2 class="subtitle text-secondary text-[2rem] lg:text-[3rem] w-full lg:max-w-[600px]"><?php echo wp_kses_post( $about_hero_subtitle ); ?></h2>
        <?php endif; ?>
        <div class="hero-contents flex items-stretch  justify-between flex-wrap gap-8 lg:flex-nowrap p- mt-4">
            <img src="<?php echo wp_get_attachment_image_url( $about_hero_image['ID'], 'full' ); ?>" alt="" class="left basis-[100%] lg:basis-[50%] rounded-lg w-full lg:w-[50%] ">
            <div class="left basis-[100%] lg:basis-[50%]">
                <?php if( $about_hero_description ) : ?>
                    <div class="description text-xl mb-8"><?php echo wp_kses_post( $about_hero_description ); ?></div>
                <?php endif; ?>
                <?php if( $about_hero_button ) : ?>
                    <a href="<?php echo esc_url( $about_hero_button['url'] ); ?>" role="button" class="primary-button w-fit mt-8">
                        <?php echo esc_html( $about_hero_button['title'] ); ?>
                    </a>
                <?php endif; ?>

               <div data-animate="fadeInUp" class='basis-[100%] min-h-[200px] bg-white text-secondary rounded-lg border-border border p-4 mt-8'>
                    <?php if( $about_hero_box_text ) : ?>
                        <p class="text-xl"><?php echo wp_kses_post( $about_hero_box_text ); ?></p>
                    <?php endif; ?>
                </div>
        
            </div>
            
        </div>
    </div>
    
</section>