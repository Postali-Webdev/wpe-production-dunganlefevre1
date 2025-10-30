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
                    <h1>Our Results</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="single-content">
        <div class="container thin">   
            <div class="columns">
                <div class="column-full padded">
                    <div class="results-holder">
                    <?php
                        $wp_query = new WP_Query(array(
                            'posts_per_page'    => 5,
                            'post_type'         => 'results', 
                            'order'             => 'DESC',
                            'post_status'       => 'publish',
                        ));
                        
                        while ($wp_query->have_posts()): $wp_query->the_post()?>   
                        
                        <div class="results-block">
                            <h2><?php the_title(); ?></h2>
                            <?php the_content(); ?>
                        </div>

                        <?php endwhile; ?>
                    </div>
                    
                    <div class="spacer-30"></div>

                    <?php                    
                    // don't display the button if there are not enough posts
                    if (  $wp_query->max_num_pages > 1 )
                        echo '<a class="btn-load-more btn transparent rounded">Load More Case Results</a>'; // you can use <a> as well
                    ?>

                    <?php wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','cta'); ?>
	
<?php get_footer(); ?>
