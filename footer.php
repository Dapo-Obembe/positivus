<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the main div.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Alpha-Web-Consult
 */

?>
      </div> <!-- .entry-content -->
    </main>
    <footer data-animate="fadeInUp" class="text-secondary mt-0">

        <div class="w-full">
            <div class="footer-bottom min-h-[300px] container px-[1rem] lg:px-[2.5rem] pt-[35px] lg:pb-[1rem]">
                <div class="left site-logo mb-8 flex flex-col gap-8 justify-between items-center">
                    <?php if ( has_custom_logo() ) : ?>
                        <?php the_custom_logo(); ?>
                    <?php endif; ?>

                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'container'      => false,
                                'menu_class'     => 'header__menu flex justify-between flex-wrap gap-4 text-sm uppercase',
                                'fallback_cb'    => false,
                            )
                        );
                    ?>

                    <p class="text-sm text-center"><?php print_copyright_text(); ?></p>
                </div>
            </div>
        </div>
      
    </footer>
    <?php wp_footer(); ?>
    <script src="//instant.page/5.2.0" type="module" integrity="sha384-jnZyxPjiipYXnSU0ygqeac2q7CVYMbh84q0uHVRRxEtvFPiQYbXWUorga2aqZJ0z"></script>
</body>
</html>