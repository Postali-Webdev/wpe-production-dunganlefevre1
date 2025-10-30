<?php
/**
 * Law Category Practice Parent
 * Template Name: Category
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<div class="body-container">

    <?php get_template_part('blocks/block','banner'); ?>

    <section class="body-content">
        <div class="container banner-bottom">
            <p><?php the_field('sub_banner_intro_cta_block'); ?></p>
            <div class="banner-sub-contact">
                <div class="col" id="call">
                    <a href="tel:<?php the_field('global_phone','options'); ?>"><p><span>Give us a call</span></p></a>
                </div>
                <div class="col" id="form">
                    <a href="/contact/"><p><span>Use our online form</span></p></a>
                </div>
            </div>
        </div>

        <div class="container wide" id="category-top">
            <p class="block-title"><?php the_field('upper_section_title'); ?></p>
            <div class="columns">
                <div class="column-50">
                    <h2><?php the_field('upper_section_h2'); ?></h2>
                </div>
                <div class="column-50">
                    <p><?php the_field('upper_section_intro_copy'); ?></p>
                </div>
            </div>
        </div>

        <div class="spacer-60"></div>
        
        <div class="container wide" id="category-top-blocks">
            <div class="columns">
            <?php if( have_rows('h3_content_blocks') ): ?>
            <?php while( have_rows('h3_content_blocks') ): the_row(); ?>  
                <div class="column-50 padded white">
                    <h3><?php the_sub_field('content_block_title'); ?></h3>
                    <?php the_sub_field('content_block_copy'); ?>
                </div>
            <?php endwhile; ?>
            <?php endif; ?> 
            </div>
        </div>
    </section>

    <?php if(get_field('separator_background')) { ?>
    <section class="separator" style="background-image:url(<?php the_field('separator_background'); ?>"></section>
    <?php } else { ?>
    <section class="separator" style="background-image:url(<?php the_field('pa_separator_background','options'); ?>"></section>
    <?php } ?>

    <section id="category-middle">
        <div class="container wide">
            <div class="columns">
                <div class="column-50 block">
                    <p class="block-title"><?php the_field('middle_section_title'); ?></p>
                    <h2><?php the_field('middle_section_h2'); ?></h2>
                    <div class="spacer-30"></div>
                    <?php the_field('middle_section_copy'); ?>
                </div>

                <?php if(!is_page('123')) { ?>
                <div class="column-50 attorney-list">
                    <h3>Our Lawyers Focusing In <?php the_field('practice_area_name'); ?></h3>
                    <div class="spacer-60"></div>
                    <div class="linked-attorneys">
                    <?php 
                    while (have_rows('practice_area_attorneys')) { the_row();
                            
                        $post_object = get_sub_field('attorney');
                        if($post_object){
                            //Fetch the image field from the carsandtrucks post
                            $name  = get_the_title($post_object->ID);
                            $link  = get_the_permalink($post_object->ID);
                            $title = get_field('staff_title', $post_object->ID);
                            $headshot = get_field('staff_headshot', $post_object->ID);
                        } ?>     
                        
                        <a href="<?php echo $link; ?>" title="Learn more about <?php echo $name; ?>">
                            <?php 
                            if( !empty( $headshot ) ): ?>
                                <div class="headshot" style="background:url('<?php echo esc_url($headshot['url']); ?>);"></div>
                            <?php endif; ?>
                            <div class="name-title">
                                <h4><?php echo $name; ?> <span class="icon-right-arrow"></span></h4>
                                <p><?php echo $title; ?></p>
                            </div>
                        </a>
                            
                    <?php } ?>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','awards'); ?>

    <section id="faqs">
        <div class="container wide">
        <p class="block-title"><?php the_field('faq_section_title'); ?></p>
            <div class="columns">
                <div class="column-50">
                    <h2><?php the_field('faq_section_h2'); ?></h2>
                </div>
                <div class="column-50">
                <?php if( have_rows('faqs') ): ?>
                <?php while( have_rows('faqs') ): the_row(); ?>  
                <div class="accordions">
                    <div class="accordions_title">
                        <p><span class="bullet">•</span><?php the_sub_field('title'); ?></p><span></span>
                    </div>
                    <div class="accordions_content">
                        <?php the_sub_field('content'); ?>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?> 
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','reviews-footer'); ?>

</div>

<?php get_footer(); ?>