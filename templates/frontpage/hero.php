<?php
/**
 * HERO SECTION - HOME PAGE
 * 
 * @package Alpha-Web-Consult
 * 
 * @author Dapo Obembe <https://www.dapoobembe.com>
 */

 // ACF DATA for this section.
 $home_hero_title = get_field( 'hero_title' );
 $home_hero_description = get_field( 'hero_description' );
 $home_hero_image = get_field( 'hero_image' );

 $home_hero_button_one = get_field( 'button_one' );
 $home_hero_button_two = get_field( 'button_two' );

 $home_hero_box_image = get_field( 'hero_box_image' );
 $home_hero_box_text = get_field( 'hero_box_text' );
?>

<section class="home-hero w-full px-[1rem] lg:px-[2.5rem] py-8.5 lg:pt-[65px] lg:pb-[75px] -mb-[40px]">
    <div class="container flex items-stretch  justify-between flex-wrap gap-10 lg:flex-nowrap p-0">
        <div class="left basis-[100%] lg:basis-[50%]">

            <?php if( $home_hero_title ) : ?>
                <h1 class="title text-[2.25rem] lg:text-[3.75rem] leading-tight mb-4" fetchpriority="high"><?php echo wp_kses_post( $home_hero_title ); ?></h1>
            <?php endif; ?>
            <?php if( $home_hero_description ) : ?>
                <p class="description text-xl" fetchpriority="high"><?php echo wp_kses_post( $home_hero_description ); ?></p>
            <?php endif; ?>

            <div class="hero-buttons flex flex-wrap lg:flex-nowrap gap-4 items-center mt-4">
                <?php if( $home_hero_button_one ) : ?>
                    <a href="<?php echo esc_url( $home_hero_button_one['url'] ); ?>" role="button" class="primary-button">
                        <?php echo esc_html( $home_hero_button_one['title'] ); ?>
                    </a>
                <?php endif; ?>
                <?php if( $home_hero_button_two ) : ?>
                    <a href="<?php echo esc_url( $home_hero_button_two['url'] ); ?>" role="button" class="secondary-button" aria-label="<?php echo esc_attr( $home_hero_button_two['title'] ); ?>">
                        <?php echo esc_html( $home_hero_button_two['title'] ); ?>
                    </a>
                <?php endif; ?>
            </div>

            <div data-animate="fadeInUp" class="hero-cta-boxes  flex justify-center flex-wrap md:flex-nowrap gap-4 mt-12">
              <div class='left hidden sm:block basis-[100%] lg:basis-[50%] w-full h-[200px] rounded-lg overflow-hidden aspect-auto'>
                <?php if (  $home_hero_box_image ) : ?>
                    <?php echo wp_get_attachment_image( $home_hero_box_image['ID'], 'large' ); ?>
                <?php endif; ?>
              </div>
              <div class='basis-[100%] lg:basis-[50%] h-[200px] bg-white text-secondary rounded-lg border-border border p-4'>
                <?php if( $home_hero_box_text ) : ?>
                    <p class="text-xl"><?php echo wp_kses_post( $home_hero_box_text ); ?></p>
                <?php endif; ?>
              </div>
            </div>
    
        </div>
        <?php if(!wp_is_mobile()) : ?>
            <div class="right basis-[100%] lg:basis-[50%] hidden lg:block">
                <?php echo wp_get_attachment_image( $home_hero_image['ID'], 'large' ); ?>
            </div>
        <?php endif; ?>
    </div>
</section>