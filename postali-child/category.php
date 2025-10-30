<?php
/**
 * Post archive template.
 *
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<?php // dynamic breadcrumb based on topic category
    $category = get_the_terms( $id, 'category' );
    $firstCategory = $category[0];
    $category_link = get_category_link($firstCategory->term_id);
    $category_name = $firstCategory->name;
?>

<div class="body-container">

    <section class="interior-breadcrumbs">
        <div class="container">
            <p id="breadcrumbs"><span><span><a href="/">Home</a> <span> | </span> <a href="/blog/">Legal Blog</a> <span> | </span> <span class="breadcrumb_last" aria-current="page"><?php echo $category_name; ?></span></span></span></p>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="columns filter-sort">
                <div class="column-75">
                    <h1><?php echo $category_name; ?></h1>
                </div>
                <div class="column-25">
                <?php
                $args = array(
                    'post_type' => 'post'
                );

                $categories = get_categories( $args ); 
                $category_link ='';
                ?>
                    <div class="accordions">
                        <div class="accordions_title">
                            Filter: <?php echo $category_name; ?> <span class="icon-filter-icon"></span>
                        </div>
                        <div class="accordions_content">
                            <ul>
                            <?php foreach ( $categories as $category ) { ?>
                                <?php $category_link = get_category_link($category->term_id); ?>
                                <li><a href="<?php echo $category_link; ?>" title=""><?php echo $category->name; ?></a></li>

                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns blog-posts">
                <?php while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                <div class="column-33 border-hover">
                    <div class="dot-line">
                        <div class="dot">•</div>
                        <div class="line"></div>
                    </div>
                    <div class="date-category">
                        <?php echo get_the_date('m.d.y'); ?> | 
                        <?php 
                            $id = get_the_ID();
                            $cats = get_the_category($id);
                        ?>
                        <?php foreach ( $cats as $cat ): ?>
                            <a href="<?php echo get_category_link($cat->cat_ID); ?>" class="blog-category"><?php echo $cat->name; ?></a><span>, </span>
                        <?php endforeach; ?>
                    </div>
                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                    <div class="spacer-30"></div>
                    <?php the_excerpt(); ?>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
                <div class="column-full centered">
                    <?php the_posts_pagination(); ?>
                </div>
            </div>
        </div><!-- #content -->
    </section>

</div>

<?php get_footer();
