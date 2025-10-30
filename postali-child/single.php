<?php
/**
 * Single template
 *
 * @package Postali Parent
 * @author Postali LLC
 */


get_header();?>

<div class="body-container">

    <?php get_template_part('blocks/block','interior-breadcrumbs'); ?>

    <section>
        <div class="container thin">
            <div class="columns">
                <div class="column-full centered">
                    <div class="date-category">
                        <?php echo get_the_date('m.d.y'); ?> | 
                        <?php 
                            $id = get_the_ID();
                            $cats = get_the_category($id);
                        ?>
                        <?php foreach ( $cats as $cat ): ?>
                            <a href="<?php echo get_category_link($cat->cat_ID); ?>" class="blog-category">
                                <?php echo $cat->name; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>


    <section class="single-content">
        <div class="container thin">            
            <div class="columns">
                <div class="column-full padded">
                    <article>
                        <?php the_content(); ?>
                    </article>				
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','cta'); ?>

</div>

<?php get_footer(); ?>