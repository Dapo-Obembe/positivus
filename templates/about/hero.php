<?php
/**
 * HERO SECTION - ABOUT PAGE
 * 
 * @package alphawebplate-tw
 * 
 * @author Dapo Obembe | https://www.dapoobembe.com
 */

if(!defined('ABSPATH')) exit;

 // ACF DATA for this section.
 $about_hero_title = get_field( 'about_hero_title' );
 $about_hero_subtitle = get_field( 'about_hero_subtitle' );
 
?>

<section class="w-full py-[35px] lg:py-[75px] px-[1rem] lg:px-[2.5rem]">
    <div class="container">
        <?php if( $about_hero_title ) : ?>
            <h1 class="text-primary uppercase text-[1rem] font-bold"><?php echo esc_html( $about_hero_title ); ?></h1>
        <?php endif; ?>

        <?php if( $about_hero_subtitle ) : ?>
            <h2 class="subtitle text-secondary text-[2rem] lg:text-[3rem] w-full lg:max-w-[600px]"><?php echo wp_kses_post( $about_hero_subtitle ); ?></h2>
        <?php endif; ?>
        
    </div>
    
</section>