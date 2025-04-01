<?php
/**
 * The CONTACT Form wrapper
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package alphawebplate-tw
 */
// ACF DATA
$contact_form_shortcode = get_field( 'contact_form_shortcode' );
$contact_email = get_field( 'contact_email' );
$contact_phone = get_field( 'contact_phone' );
$contact_address = get_field( 'contact_address' );

$phone_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-telephone-forward-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877zm10.761.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708"/>
</svg>';

$map_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
</svg>';


get_header();
?>

    <section data-animate="fadeInUp" class="contact-form-wrapper w-full pb-[35px] lg:pb-[75px] px-[1rem] lg:px-[2.5rem]">
        <div class="container flex flex-wrap lg:flex-nowrap gap-10 py-4">

            <div class="left basis-[100%] lg:basis-[60%] mx-auto">
                <h2 class="text-xl lg:text-2xl font-light" fetchpriority="high">Do you have an idea in mind? Let's work on it</h2>
                <?php if( $contact_form_shortcode ) : ?>
                <div class="contact-form mt-4 mx-auto px-4 w-full max-w-[90%] md:max-w-none"><?php echo do_shortcode( $contact_form_shortcode ); ?></div>
            <?php endif; ?>
            </div>

            <div class="right basis-[100%] lg:basis-[40%] bg-secondary rounded-lg p-4 flex flex-col justify-between">
                <div class="contact-details text-white flex flex-col gap-8 mb-8">
                    <a href="mailto:<?php echo esc_html( $contact_email ); ?>" class="email flex flex-nowrap items-center gap-4 decoration-0">
                        <?php the_svg(
                            array(
                                'icon' => 'envelope',
                                'title' => 'Send an email',
                                'width' => 32,
                                'height' => 32
                            )
                            ); 
                        ?>
                        <?php if( $contact_email ) : ?>
                            <p class="text-sm lg:text-xl"><?php echo esc_html( $contact_email ); ?></p>
                        <?php endif; ?>
                    </a>
                    <a href="tel:<?php echo $contact_phone; ?>" class="phone text-white flex flex-nowrap items-center gap-4">
                        <?php echo $phone_icon; ?>
                        <?php if( $contact_phone ) : ?>
                            <p class="text-sm lg:text-xl"><?php echo esc_html( $contact_phone ); ?></p>
                        <?php endif; ?>
                    </a>
                    <div class="address flex flex-nowrap items-center gap-4">
                        <?php echo $map_icon; ?>
                        <?php if( $contact_address ) : ?>
                            <p class="text-sm lg:text-xl"><?php echo esc_html( $contact_address ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
               <!-- Social Icons --> 
              <?php get_template_part( 'templates/components/social-icons' ); ?>
            </div>
            
        </div>
    </section>


<?php
get_footer();
