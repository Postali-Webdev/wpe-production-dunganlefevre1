<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/
get_header();?>

<div class="body-container">

    <?php get_template_part('blocks/block','banner'); ?>

    <section class="hp-who-we-are">
        <div class="container thin">
            <div class="columns">
                <div class="column-full padded block">
                    <p class="block-title"><?php the_field('hp_who_section_title'); ?></p>
                    <h2><?php the_field('hp_who_section_h2'); ?></h2>
                    <?php the_field('hp_who_section_copy'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-block">
        <div class="container">
            <div class="columns">
                <div class="column-66 dots reversed">
                    <div class="column-content">
                        <?php if (get_field('block_title')) { ?>
                        <p class="block-title"><?php the_field('block_title'); ?></p>
                        <?php } ?>
                        <div class="spacer-30"></div>
                        <h2><?php the_field('block_headline'); ?></h2>
                        <div class="spacer-30"></div>
                        <p class="block-copy"><?php the_field('block_copy'); ?></p>
                        <?php if(get_field('add_contact_block')) { ?>
                            <div class="contact-block">
                                <div class="text-link"></div>
                                <div class="call-link"></div>
                            </div>
                        <?php } ?>
                        <div class="spacer-60"></div>
                    </div>
                </div>
                <?php 
                $image = get_field('right_photo');
                if( !empty( $image ) ): ?>
                <div class="column-33 photo" style="background-image:url('<?php echo esc_url($image['url']); ?>');">
                <?php else: ?>
                <div class="column-33 photo">
                <?php endif; ?>    
                    &nbsp;
                </div>
            </div>
        </div>
    </section>

    <section class="hp-practice-areas">
        <div class="container">
            <div class="columns">
            <?php if( have_rows('practice_area') ): ?>
            <?php while( have_rows('practice_area') ): the_row(); ?>  
                <a class="column-33 border-hover" href="<?php the_sub_field('page_link'); ?>" title="Learn more about <?php the_sub_field('title'); ?>">
                    <div class="dot-line">
                        <div class="dot">•</div>
                        <div class="line"></div>
                    </div>
                    <h3><?php the_sub_field('title'); ?></h3>
                    <div class="spacer-15"></div>
                    <p><?php the_sub_field('copy'); ?></p>
                </a>
            <?php endwhile; ?>
            <?php endif; ?> 
            <a class="column-33 pa-all block" href="/practice-areas/" title="View all practice areas">
                <span class="headline">Not Finding What You Need?</span>
                <div class="spacer-15"></div>
                <p>See All Practice Areas &nbsp; <span class="icon-right-arrow"></span></p>
            </a>                
            </div>
        </div>
    </section>

    <section class="hp-practice-areas-separator" style="background-image:url('<?php the_field('separator_panel_background'); ?>');">
        &nbsp;
    </section>

    <section class="hp-meet-the-team">
        <div class="container">
            <div class="columns">
                <p class="block-title"><?php the_field('hp_team_section_title'); ?></p>
                <div class="spacer-break"></div>
                <div class="column-50">
                    <h2><?php the_field('hp_team_section_h2'); ?></h2>
                </div>
                <div class="column-50">
                    <?php the_field('hp_team_section_copy'); ?>
                </div>
            </div>
            <div class="spacer-60"></div>
            <div class="columns">
                <div id="attorney-slider">
                <?php $attorneys = new WP_Query( array( 
                    'post_type' => 'staff',
                    'posts_per_page' => -1, 

                ) ); ?>

                <?php while( $attorneys->have_posts() ) : $attorneys->the_post(); ?>     
                <?php if (get_field('staff_type') == 'attorney') { ?>           
                    <a class="column-25 slide block"  href="<?php the_permalink(); ?>">
                        <?php 
                            $headshot = get_field('staff_headshot');
                            if( !empty( $headshot ) ): ?>
                            <div class="slide-title-image">
                                <div class="slide-image" style="background-image:url('<?php echo esc_url($headshot['url']); ?>');"></div>
                                <div class="background-color"></div>
                            </div>
                        <?php endif; ?>
                        <div class="slide-title-block">
                            <div class="attorney-name"><?php the_title(); ?></div>
                            <div class="attorney-title"><?php the_field('staff_title'); ?></div>
                        </div>
                    </a>
                    <?php } ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

            <div class="next-button-container">
                <div class="next-button-slick">Next Attorney <span class="icon-right-arrow"></span></div>
            </div>

        </div>
    </section>

    <?php get_template_part('blocks/block','awards'); ?>

    <?php get_template_part('blocks/block','reviews-footer'); ?>

</div><!-- #front-page -->

<?php get_footer();?>