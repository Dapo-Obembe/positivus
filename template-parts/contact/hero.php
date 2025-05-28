<?php
/**
 * HERO SECTION - CONTACT PAGE
 * 
 * @package alphawebplate-tw
 * @author Dapo Obembe | https://www.dapoobembe.com
 */
if(!defined('ABSPATH')) exit;

// ACF DATA for this section.
$contact_hero_title        = get_field( 'contact_hero_title' );
$contact_hero_subtitle     = get_field( 'contact_hero_subtitle' );
?>
<section class="w-full pt-[35px] lg:pt-[75px] px-[1rem] lg:px-[2.5rem]">
    <div class="container">
        <?php if( $contact_hero_title ) : ?>
            <h1 class="text-primary uppercase text-sm font-bold"><?php echo esc_html( $contact_hero_title ); ?></h1>
        <?php endif; ?>

        <?php if( $contact_hero_subtitle ) : ?>
            <h2 class="subtitle text-secondary text-[2rem] lg:text-[3rem] w-full lg:max-w-[600px]"><?php echo wp_kses_post( $contact_hero_subtitle ); ?></h2>
        <?php endif; ?>
        
    </div>
    
</section>