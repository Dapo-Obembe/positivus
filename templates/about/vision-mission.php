<?php
/**
 * VISION & MISSION SECTION - ABOUT PAGE
 * 
 * @package alphawebplate-tw
 * 
 * @author Dapo Obembe | https://www.dapoobembe.com
 */

 // ACF DATA for this section.
 $about_vision_heading = get_field( 'about_vision_heading' );
 $about_vision_description = get_field( 'about_vision_description' );
 $about_vision_image = get_field( 'about_vision_image' );
?>

<section data-animate="fadeInUp" class="w-full py-[35px] lg:py-[75px] px-[1rem] lg:px-[2.5rem]">

    <div class="container flex justify-between items-center flex-wrap gap-8 lg:flex-nowrap">
        <img src="<?php echo wp_get_attachment_image_url( $about_vision_image['ID'], 'full' ); ?>" alt="" class="left basis-[100%] lg:basis-[50%] rounded-lg w-full lg:w-[50%]">
        <div class="right basis-[100%] lg:basis-[50%] flex flex-col gap-4">
            <?php if( $about_vision_heading ) : ?>
                <h2 class="text-2xl lg:text-4xl font-bold"><?php echo esc_html( $about_vision_heading ); ?></h2>
            <?php endif; ?>

            <?php if( $about_vision_description ) : ?>
                <div class="description text-secondary text-xl"><?php echo wp_kses_post( $about_vision_description ); ?></div>
            <?php endif; ?>
        </div>
        
    </div>
    
</section>