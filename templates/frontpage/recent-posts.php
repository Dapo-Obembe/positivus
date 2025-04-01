<?php
/**
 * Template: Recent Posts
 */

// ACF DATA
$post_section_title        = get_field( 'post_section_title' );
$post_section_subtitle     = get_field( 'post_section_subtitle' );

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 6,
    'order' => 'DESC',
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
<section data-animate="fadeInUp" class="home-posts relative bg-primary/70 min-h-[600px] flex items-center py-[35px] lg:py-[70px] px-[1rem] lg:px-[2.5rem]">
    <div class="swiper-container container overflow-hidden">
        <?php if( $post_section_title ) : ?>
            <h2 class="text-white uppercase text-sm font-bold"><?php echo esc_html( $post_section_title ); ?></h2>
        <?php endif; ?>

        <?php if( $post_section_subtitle ) : ?>
            <h3 class="subtitle text-secondary text-[1.875rem] lg:text-[2.5rem] w-full lg:max-w-[600px]"><?php echo wp_kses_post( $post_section_subtitle ); ?></h2>
        <?php endif; ?>
        <div class="swiper-wrapper flex transition-all mt-8">
            <?php
                if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) :
                        $query->the_post();

                        // Get the featured image URL
                        $thumbnail_url = get_the_post_thumbnail_url() ?: 'https://fellownurses.com/wp-content/uploads/2025/01/no-thumbnail.webp';
                        ?>
                        <article 
                            class="swiper-slide rounded-lg min-h-[300px] pb-8 px-4 grid justify-end group bg-cover bg-center
                            " 
                            style="background-image: linear-gradient(180deg, rgba(0,0,0,0), rgba(0,0,0,0.85) 60%), url(<?php echo esc_url( $thumbnail_url ); ?>);" 
                            title="<?php echo esc_attr( get_the_title() ); ?>">
                                <h3 class="text-white text-3xl font-bold h-[300px] flex items-end group-hover:text-primary-light transition-all">
                                    <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
                                </h3>
                        </article>
                    <?php endwhile; ?>
                <?php endif; 

                wp_reset_postdata();
            ?>
        </div>

        <a  href="/blog" role="button" class="primary-button text-white w-fit flex justify-center mt-8">
            <?php echo esc_html_e( 'See More Posts', 'alphawebplate-tw' ); ?>
        </a>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 28 28" fill="none" class="arrow-left swiper-button-prev w-[60px] h-[60px]" aria-label="previous slide icon">
        <rect width="28" height="28" rx="14" transform="matrix(4.37114e-08 -1 -1 -4.37114e-08 28 28)" fill="#000"/>
        <path d="M16.4869 8C16.4869 8.689 15.8009 9.71786 15.1065 10.5814C14.2137 11.6957 13.1468 12.6679 11.9236 13.4099C11.0065 13.9661 9.89469 14.5 9 14.5C9.89469 14.5 11.0074 15.0339 11.9236 15.5901C13.1468 16.333 14.2137 17.3052 15.1065 18.4176C15.8009 19.2821 16.4869 20.3129 16.4869 21" stroke="white" stroke-width="1.2"/>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 28 28" fill="none" class="arrow-right swiper-button-next absolute right-0" aria-label="next slide icon">
        <rect y="28" width="28" height="28" rx="14" transform="rotate(-90 0 28)" fill="#000"/>
        <path d="M11.5131 8C11.5131 8.689 12.1991 9.71786 12.8935 10.5814C13.7863 11.6957 14.8532 12.6679 16.0764 13.4099C16.9935 13.9661 18.1053 14.5 19 14.5C18.1053 14.5 16.9926 15.0339 16.0764 15.5901C14.8532 16.333 13.7863 17.3052 12.8935 18.4176C12.1991 19.2821 11.5131 20.3129 11.5131 21" stroke="white" stroke-width="1.2"/>
    </svg>
</section>
<?php endif; ?>