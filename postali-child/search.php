<?php
/**
 * Search results template.
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
                    <h1>Search Results</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="single-content">
        <div class="container thin">            
            <div class="columns">
                <div class="column-full padded block">
                <div class="searched-for">
                    <span class="icon-icon-search"></span> <p>You searched for <strong><?php printf( esc_html__( '"%s"', 'postali' ), get_search_query() ); ?></strong></p>
                </div>
                <div class="spacer-60"></div>
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <a class="result-block" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <h2><?php the_title(); ?></h2>
                        <?php the_excerpt(); ?>
                    </a>
                    <?php endwhile; ?>
                    <?php the_posts_pagination(); ?>
                <?php else : ?>
                    <p><?php printf( esc_html__( 'Our apologies but there\'s nothing that matches your search for "%s"', 'postali' ), get_search_query() ); ?></p>
                    <?php get_search_form(); ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','cta'); ?>

</div>

<?php get_footer();
