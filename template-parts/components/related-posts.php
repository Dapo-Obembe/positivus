<?php
/**
 * Related Posts Template.
 *
 * @package awc-boilerplate
 */
if(!defined('ABSPATH')) exit;

$post_id = get_the_ID();
$current_post_type = get_post_type($post_id);

// Get categories or tags if no categories exist
$categories = get_the_category($post_id);
$cat_ids = !empty($categories) ? wp_list_pluck($categories, 'term_id') : [];

// Fallback image URL
$fallback_url = 'https://www.alphawebtips.com/wp-content/uploads/2025/02/no-thumbnail.webp';

// Query arguments
$query_args = [
    'post_type' => $current_post_type,
    'post__not_in' => [$post_id],
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'orderby' => 'rand',
    'ignore_sticky_posts' => true,
];

// Only add category filter if we have categories
if (!empty($cat_ids)) {
    $query_args['category__in'] = $cat_ids;
} else {
    // Fallback to tags if no categories
    $tags = get_the_tags($post_id);
    if ($tags) {
        $query_args['tag__in'] = wp_list_pluck($tags, 'term_id');
    }
}

$related_posts = new WP_Query($query_args);

if ($related_posts->have_posts()) : ?>
    <section class="related-posts w-full bg-secondary py-16 px-[1rem] lg:px-[2.5rem]">
        <div class="container">
            <?php 
            $title = ($current_post_type === 'work') 
                ? __('Related Works', 'positivus') 
                : __('Related Posts', 'positivus');
            ?>
            <h2 class="related-posts__title text-white text-2xl lg:text-4xl font-bold mb-6"><?php echo esc_html($title); ?></h2>
            
            <div data-animate="fadeInUp" class="w-full flex flex-nowrap gap-4 overflow-auto">
                <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                    <div class="related-post shrink-0 grow w-[300px]">
                        <a href="<?php the_permalink(); ?>" class="block group">
                            <div class="aspect-w-16 aspect-h-9 mb-4 overflow-hidden rounded-lg">
                                <img 
                                    src="<?php echo esc_url(get_the_post_thumbnail_url() ?: $fallback_url); ?>" 
                                    alt="<?php the_title_attribute(); ?>" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
                                    loading="lazy"
                                >
                            </div>
                            <h3 class="text-white text-xl group-hover:text-primary transition">
                                <?php the_title(); ?>
                            </h3>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>