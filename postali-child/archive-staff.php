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
        <div class="container">
            <div class="columns">
                <div class="column-full block">
                    <h1>An Excellent Team</h1>
                    <span class="subhead">For exceptional results</span>                    
                </div>
            </div>
            <div class="spacer-90"></div>
            <div class="columns attorneys">
                <div class="column-full centered">
                    <h2>Attorneys</h2>
                </div>
                <div class="spacer-60"></div>
                <?php while ( have_posts() ) : the_post(); ?>
                <?php if (get_field('staff_type') == 'attorney') { ?>
                <div class="column-25 slide block attorney-box">
                    <?php if (get_field('attorney_vcard')) { ?>
                    <div class="vcard">
                        <a href="<?php the_field('attorney_vcard'); ?>"  title="Download <?php the_title(); ?>'s vCard"></a>
                    </div>
                    <?php } ?>
                    <a href="<?php the_permalink(); ?>">
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
                </div>            
                <?php } ?>
                <?php endwhile; wp_reset_postdata(); ?>

                <div class="spacer-60"></div>

                <div class="column-full centered">
                    <h2>Team Members</h2>
                </div>
                <div class="spacer-60"></div>
                <?php while ( have_posts() ) : the_post(); ?>
                <?php if (get_field('staff_type') == 'staff') { ?>
                <div class="column-25 slide block attorney-box">
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
                </div>            
                <?php } ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

        </div><!-- #content -->
    </section>

</div>

<?php get_footer();
