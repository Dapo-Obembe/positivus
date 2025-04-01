<?php
/**
 * SOLUTIONS SECTION - ABOUT PAGE
 * 
 * @package alphawebplate-tw
 * 
 * @author Dapo Obembe | https://www.dapoobembe.com
 */

 // ACF DATA for this section.
 $about_solution_heading = get_field( 'about_solution_heading' );
 $about_solution_description = get_field( 'about_solution_description' );
 $about_solution_image = get_field( 'about_solution_image' );
?>

<section data-animate="fadeInUp" class="bg-white w-full py-[35px] lg:py-[75px] px-[1rem] lg:px-[2.5rem] -mb-8">

    <div class="container flex justify-between items-center flex-wrap gap-8 lg:flex-nowrap">
        <div class="left basis-[100%] lg:basis-[50%] flex flex-col gap-4">
            <?php if( $about_solution_heading ) : ?>
                <h2 class="text-primary text-4xl font-bold"><?php echo esc_html( $about_solution_heading ); ?></h2>
            <?php endif; ?>

            <?php if( $about_solution_description ) : ?>
                <div class="description text-secondary text-xl"><?php echo wp_kses_post( $about_solution_description ); ?></div>
            <?php endif; ?>
        </div>
        <img src="<?php echo wp_get_attachment_image_url( $about_solution_image['ID'], 'full' ); ?>" alt="" class="left basis-[100%] lg:basis-[50%] rounded-lg w-full lg:w-[50%]">
    </div>
    
</section>