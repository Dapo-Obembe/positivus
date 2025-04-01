<?php
/**
 * Element: Floating CTA
 * 
 * Contains the contact buttons (email, WhatsApp and phone)
 * 
 * @package Alpha-Web_Consult
 * 
 * @author Dapo Obembe <https://www.dapoobembe.com>
 * 
 * @since 2025
 */

 // FLOATING ACF CTA DATA
$floating_cta_heading = get_field( 'floating_cta_heading', 'option' );
$floating_cta_description = get_field( 'floating_cta_description', 'option' );
$floating_cta_button = get_field( 'floating_cta_button', 'option' );

?>
<div class="floating-cta fixed right-4 lg:right-8 bottom-16 h-[300px] w-[300px] bg-primary z-[100] p-4 rounded-lg transition-all duration-500 ease-in">
    <div class="close float-right text-white w-8 h-8 flex justify-center items-center cursor-pointer hover:text-secondary/60 transition-colors duration-300 ease-in">X</div>
    <div class="content mt-12 text-secondary bg-white p-4 flex flex-col justify-between rounded-[4px]">
        <?php if( $floating_cta_heading ) : ?>    
            <h2 class="text-2xl mb-4 font-bold"><?php echo esc_html( $floating_cta_heading ); ?></h2>  
        <?php else: ?>
            <h2 class="text-2xl mb-4 font-bold"><?php echo esc_html_e( 'Ask Us Anything', 'alphawebplate-tw' ); ?></h2>
        <?php endif; ?>

        <?php if( $floating_cta_description ) : ?>
            <p class="mb-4"><?php echo esc_html( $floating_cta_description ); ?></p>
            <?php else: ?>   
            <p class="mb-4"><?php echo esc_html_e( 'Update in the backend, if you are the admin.', 'alphawebplate-tw' ); ?></p>
        <?php endif; ?>
        
        <?php
            if ( is_array( $floating_cta_button ) ) :
                $link_url    = $floating_cta_button['url'];
                $link_title  = $floating_cta_button['title'];
                ?>
                <?php echo awc_button( $link_title, $link_url, 'primary', '' ); ?>
            <?php endif; 
        ?>
       
    </div>
</div>