<?php
/**
 * Post Archive
 *
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<div class="body-container">

    <?php get_template_part('blocks/block','interior-breadcrumbs'); ?>

    <section>
        <div class="container thin">
            <div class="columns">
                <div class="column-full centered">                
                    <h1>Testimonials</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="single-content">
        <div class="container thin">   
            <div class="columns">
                <div class="column-full padded">
                    <div class="reviews-count">
                        <img src="/wp-content/uploads/2023/04/Google_reviews_DF.svg" alt="Google Reviews logo"><p>4.9 Rating out of 266 Reviews</p>
                    </div>
                    <div class="testimonial-holder">
                    <?php
                        $wp_query = new WP_Query(array(
                            'posts_per_page'    => 5,
                            'post_type'         => 'testimonials', 
                            'order'             => 'DESC',
                            'post_status'       => 'publish',
                        ));
                        
                        while ($wp_query->have_posts()): $wp_query->the_post()?>   
                        
                        <div class="testimonial-block">
                            <p class="author"><?php the_field('testimonial_author'); ?> <span class="stars">★★★★★</span></p>
                            <div class="testimonial"><span class="icon-icon-quote"></span><?php the_content(); ?></div>
                        </div>

                        <?php endwhile; ?>
                    </div>
                    
                    <div class="spacer-30"></div>

                    <?php                    
                    // don't display the button if there are not enough posts
                    if (  $wp_query->max_num_pages > 1 )
                        echo '<a class="btn-load-more btn transparent rounded">Load More Testimonials</a>'; // you can use <a> as well
                    ?>

                    <?php wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','cta'); ?>
	
<?php get_footer(); ?>
