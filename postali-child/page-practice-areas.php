<?php
/**
 * Law Category Interior Page
 * Template Name: Practice Area Landing
 * @package Postali Parent
 * @author Postali LLC
 */

get_header();?>

<div class="body-container">

    <?php get_template_part('blocks/block','interior-breadcrumbs'); ?>

    <section>
        <div class="container">

        <h1><?php the_title(); ?></h1>

            <div class="columns practice-areas">
                <?php
                $pages = get_pages(array(
                    'meta_key' => '_wp_page_template',
                    'meta_value' => 'page-category.php'
                ));
                foreach($pages as $page){
                    $parentID = $page->ID; ?>
                    <div class="column-33 border-hover">
                        <div class="dot-line">
                            <div class="dot">•</div>
                            <div class="line"></div>
                        </div>
                        <h3><a href="<?php echo get_permalink($page); ?>" title="<?php echo $page->post_title; ?>"><?php echo $page->post_title; ?></a></h3>

                        <?php $children = get_pages( array( 'child_of' => $parentID ) ); ?>
                        <?php if( count( $children ) != 0 ){ ?>

                        <div class="accordions">
                            <div class="accordions_title"><p><span class="bullet">•</span> More on <?php echo $page->post_title; ?></p><span></span></div>
                            <div class="accordions_content">
                                <ul class="child-pages">
                                <?php foreach($children as $child) { ?>
                                    <li><a href="<?php echo get_permalink($child); ?>" title="<?php echo $child->post_title; ?>"><?php echo $child->post_title; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
		
<?php get_footer(); ?>