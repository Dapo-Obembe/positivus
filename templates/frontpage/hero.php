<?php
/**
 * HERO SECTION - HOME PAGE
 * 
 * @package Alpha-Web-Consult
 * 
 * @author Dapo Obembe <https://www.dapoobembe.com>
 */
if(!defined('ABSPATH')) exit;

 // ACF DATA for this section.
 $home_hero_title = get_field( 'hero_title' );
 $home_hero_description = get_field( 'hero_description' );
 
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
    
        </div>
    </div>
</section>