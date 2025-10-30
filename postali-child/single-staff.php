<?php
/**
 * Single template
 *
 * @package Postali Parent
 * @author Postali LLC
 */

$blogDefault = get_field('default_blog_image', 'options');

get_header();?>

<div class="body-container">

    <?php get_template_part('blocks/block','banner'); ?>

    <section class="body-content">
        <div class="container">
            <div class="columns">
                <div class="column-75 block">
                    <?php the_content(); ?>
                    <div class="spacer-30"></div>
                    <div class="signature">
                        <?php the_title(); ?>
                    </div>
                </div>
                <div class="column-25">
                    <div class="spacer-90"></div>
                    <?php 
                        $firstName = get_the_title();
                        $arr = explode(' ',trim($firstName));
                    ?>
                    <?php if(is_single('189')) { ?>
                    <h3>Bill's Practice Areas</h3>
                    <?php } elseif(is_single('188')) { ?>
                    <h3>Steve's Practice Areas</h3>
                    <?php } elseif(is_single('183')) { ?>
                    <h3>Jack's Practice Areas</h3>
                    <?php } else { ?>
                    <h3><?php echo $arr[0]; ?>'s Practice Areas</h3>
                    <?php } ?>
                    <div class="spacer-30"></div>
                    <?php if( have_rows('attorney_practice_areas') ): ?>
                    <ul class="sidebar-practice-areas">
                    <?php while( have_rows('attorney_practice_areas') ): the_row(); ?>  
                        <?php if (get_sub_field('practice_area_page')) { ?>
                            <li><a href="<?php the_sub_field('practice_area_page'); ?>" title="<?php the_sub_field('practice_area_title'); ?>"><?php the_sub_field('practice_area_title'); ?></a></li>
                        <?php } else { ?>
                            <li class="not-linked"><?php the_sub_field('practice_area_title'); ?></li>
                        <?php } ?>
                    <?php endwhile; ?>
                    </ul>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','awards'); ?>

    <section class="more-about">
        <div class="container">
            <div class="columns pa-desktop">
                <div class="column-33">
                    <?php if(is_single('189')) { ?>
                    <h2>More about Bill</h2>
                    <?php } elseif(is_single('188')) { ?>
                    <h2>More about Steve</h2>
                    <?php } elseif(is_single('183')) { ?>
                    <h2>More about Jack</h2>
                    <?php } else { ?>
                    <h2>More about <?php echo $arr[0]; ?></h2>
                    <?php } ?>
                    <div class="spacer-30"></div>
                    <ul class="tabs">
                        <?php $n = 1; ?>
                        <?php if( have_rows('more_about') ): ?>
                        <?php while( have_rows('more_about') ): the_row(); ?>  
                            <li rel="tab<?php echo $n; ?>" <?php if ($n == 1) { ?> class="active"<?php } ?>><?php the_sub_field('tab_title'); ?></li>
                            <?php $n++; ?>
                        <?php endwhile; ?>
                        <?php endif; ?> 
                    </ul>
                </div>
                <div class="column-66">
                    <div class="tab_container">
                        <?php $i = 1; ?>
                        <?php if( have_rows('more_about') ): ?>
                        <?php while( have_rows('more_about') ): the_row(); ?>
                            <div id="tab<?php echo $i; ?>" class="tab_content tab<?php echo $i; ?>">
                                <h3><?php the_sub_field('tab_title'); ?></h3>
                                <?php the_sub_field('tab_content'); ?>
                            </div>
                            <?php $i++; ?>
                        <?php endwhile; ?>
                        <?php endif; ?> 
                    </div>
                </div>
            </div>

            <div class="columns pa-mobile">
                
                <?php if( have_rows('more_about') ): ?>
                <div class="accordions">
                <?php while( have_rows('more_about') ): the_row(); ?>  
                    <div class="accordions_title">
                        <p><?php the_sub_field('tab_title'); ?></p>
                    </div>
                    <div class="accordions_content">
                        <?php the_sub_field('tab_content'); ?>
                    </div>
                <?php endwhile; ?>
                </div>
                <?php endif; ?> 
                    
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','cta'); ?>

</div>

<?php get_footer(); ?>