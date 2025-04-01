<?php
/**
 * Element: Floating Contact Buttons
 * 
 * Contains the contact buttons (email, WhatsApp and phone)
 * 
 * @package Alpha-Web_Consult
 * 
 * @author Dapo Obembe <https://www.dapoobembe.com>
 * 
 * @since 2025
 */

 if(!defined('ABSPATH')) exit;

 // FLOATING CONTACT BUTTON DATA
$floating_contact_heading = get_field( 'floating_heading', 'option' );
$send_an_email = get_field( 'send_an_email', 'option' ) ?: 'Send an Email';
$call_us = get_field( 'call_us', 'option' );
$chat_on_whatsapp = get_field( 'chat_on_whatsapp', 'option' );

?>

<!-- Floating Contact Selections -->
<div class="floating-contact fixed right-4 lg:right-8 bottom-16 h-[300px] w-[300px] bg-secondary z-[100] p-4 rounded-lg transform translate-x-[150%] transition-all duration-300 [&.active]:translate-x-[0]">
    <div class="close float-right text-white w-8 h-8 flex justify-center items-center cursor-pointer hover:text-secondary/60 transition-colors duration-300 ease-in">X</div>
    <div class="content mt-12 text-secondary bg-white p-4 flex flex-col justify-between rounded-[4px]">
        <?php if( $floating_contact_heading ) : ?>    
            <h2 class="text-2xl mb-4 font-bold"><?php echo esc_html( $floating_contact_heading ); ?></h2>  
        <?php else: ?>
            <h2 class="text-2xl mb-4 font-bold">Get In Touch:</h2>
        <?php endif ?>
        <div class="contact-button flex flex-col gap-4">
            <?php
                if ( is_array( $send_an_email ) ) :
                    $link_url    = $send_an_email['url'];
                    $link_title  = $send_an_email['title'];
                    ?>
                    <?php echo awc_button( $link_title, $link_url, 'primary', 'w-fit' ); ?>
                <?php endif; 
            ?>
            <?php
                if ( is_array( $call_us ) ) :
                    $link_url    = $call_us['url'];
                    $link_title  = $call_us['title'];
                    ?>
                    <?php echo awc_button( $link_title, $link_url, 'secondary', 'w-fit bg-secondary' ); ?>
                <?php endif; 
            ?>
            <?php
                if ( is_array( $chat_on_whatsapp ) ) :
                    $link_url    = $chat_on_whatsapp['url'];
                    $link_title  = $chat_on_whatsapp['title'];
                    ?>
                    <?php echo awc_button( $link_title, $link_url, 'custom', 'w-fit text-secondary bg-whatsapp hover:bg-whatsapp/80' ); ?>
                <?php endif; 
            ?>
            
        </div>
    </div>
</div>
<div class="lets-chat fixed right-8 bottom-8 z-[900]">
    <?php echo awc_button( 'Let\'s Chat', "#", 'custom', 'w-fit text-white bg-secondary hover:bg-secondary/80' ); ?>
</div>
<!-- .floating-contact ends here -->