<?php
/**
 * Template: Recent PRojects
 */

 // ACF DATA
 $recent_project_title = get_field( 'recent_project_title' );
 $recent_project_subtitle = get_field( 'recent_project_subtitle' );
 ?>
 <section data-animate="fadeInUp" class="recent-projects bg-white py-[35px] lg:py-[70px] px-[1rem] lg:px-[2.5rem]">
    <div class="container">
        <?php if( $recent_project_title ) : ?>
            <h2 class="text-primary uppercase text-sm font-bold"><?php echo esc_html( $recent_project_title ); ?></h2>
        <?php endif; ?>

        <?php if( $recent_project_subtitle ) : ?>
            <h3 class="subtitle text-secondary text-[1.875rem] lg:text-[2.5rem] w-full lg:max-w-[600px]"><?php echo wp_kses_post( $recent_project_subtitle ); ?></h2>
        <?php endif; ?>

        <div class="projects-wrapper mt-8 flex gap-4">
            <?php 
                $args = array(
                    'post_type' => 'work',
                    'posts_per_page' => 3,
                    'order' => 'DESC',
                    'post_status' => 'published'
                );

                $projects = new WP_Query($args);
            ?>
            <?php if( $projects->have_posts() ) : ?>
                <?php while( $projects->have_posts() ) : $projects->the_post();

                    $thumbnail_id = get_post_thumbnail_id();
                    $image_attributes = wp_get_attachment_image_src( $thumbnail_id, 'full' );
                    $width = $image_attributes[1];
                    $height = $image_attributes[2];
                ?>
                    <article class="single-project flex items-center flex-wrap lg:flex-nowrap gap-8">
                        <img 
                            class="basis-[100%] lg:basis-[50%] rounded-lg" 
                            src="<?php echo the_post_thumbnail_url( 'full' ); ?>" 
                            srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( $thumbnail_id, 'full' ) ); ?>" 
                            sizes="(max-width: 1024px) 100vw, 60vw" 
                            alt="<?php echo get_the_title(); ?>" 
                            loading="lazy"
                            width="<?php echo $width; ?>" 
                            height="<?php echo $height; ?>" 
                        >
                        <div class="project-details basis-[100%] lg:basis-[50%] flex flex-col">
                            <h4 class="text-2xl lg:text-3xl mb-4 text-primary"><?php echo the_title( ); ?></h4>
                            <p class="text-xl"><?php echo wp_trim_words(get_the_excerpt(), 25);; ?></p>
                            <a  href="<?php echo esc_url( get_the_permalink( ) ); ?>" role="button" aria-label="View Details" class="secondary-button w-fit flex justify-center mt-8">
                                <?php echo esc_html__( 'View Details', 'alphawebplate-tw'); ?>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>

            <?php endif; wp_reset_postdata(  ); ?>

        </div>

        <a  href="/work" role="button" class="primary-button text-white w-fit flex justify-center mt-8" aria-label="More Projects">
            <?php echo esc_html_e( 'More Projects', 'alphawebplate-tw' ); ?>
        </a>
    </div>
</section>