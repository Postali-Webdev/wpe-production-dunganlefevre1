<?php
/**
 * Law Category Contact Page
 * Template Name: Contact
 * @package Postali Parent
 * @author Postali LLC
 */

get_header();?>

<div class="body-container">

    <?php get_template_part('blocks/block','interior-breadcrumbs'); ?>

    <section class="main-content">
        <div class="container wide">
            <div class="columns">
                <div class="column-66">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                    <div class="banner-contact">
                        <div class="col" id="call">
                            <a href="tel:<?php the_field('global_phone','options'); ?>"><p><span>Give us a call</span></p></a>
                        </div>
                    </div>
                    <div class="contact-img"></div>
                </div>
                <div class="column-33 form">
                    <div class="form-container">
                        <?php echo do_shortcode(get_field('form_embed')); ?>
                    </div>
                </div>
            </div>
            <div class="columns locations">
                <div class="column-66 block">

                    <div class="mobile-locations">
                        <?php if( have_rows('locations') ): ?>
                        <div class="accordions mobile-tabs">
                        <?php while( have_rows('locations') ): the_row(); ?>  
                            <div class="accordions_title">
                                <p><?php the_sub_field('location_name'); ?></p>
                            </div>
                            <div class="accordions_content">
                                <div class="locations-address-mobile">
                                    <p><?php the_sub_field('location_address'); ?></p>
                                    <a href="<?php the_sub_field('location_directions'); ?>" class="btn" target="blank">Google Directions <span class="icon-right-arrow"></span></a>
                                </div>
                                <div class="locations-map-mobile">
                                    <iframe src="<?php the_sub_field('location_map_embed'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        </div>
                        <?php endif; ?> 
                    </div>

                    <div class="locations-address">
                        <div class="locations">
                            <h2>Our Locations</h2>
                            <ul class="tabs">
                                <?php $n = 1; ?>
                                <?php if( have_rows('locations') ): ?>
                                <?php while( have_rows('locations') ): the_row(); ?>  
                                    <li rel="tab<?php echo $n; ?>" <?php if ($n == 1) { ?> class="active"<?php } ?>><?php the_sub_field('location_name'); ?></li>
                                    <?php $n++; ?>
                                <?php endwhile; ?>
                                <?php endif; ?> 
                            </ul>
                        </div>
                        <div class="address">
                            <?php $a = 1; ?>
                            <?php if( have_rows('locations') ): ?>
                            <?php while( have_rows('locations') ): the_row(); ?>  
                                <div id="tab<?php echo $a; ?>" class="tab_content tab<?php echo $a; ?>">
                                    <h3><?php the_sub_field('location_name'); ?></h3>
                                    <div class="spacer-15"></div>
                                    <p><?php the_sub_field('location_address'); ?></p>
                                    <a href="<?php the_sub_field('location_directions'); ?>" class="btn" target="blank">Google Directions <span class="icon-right-arrow"></span></a>
                                </div>
                                <?php $a++; ?>
                            <?php endwhile; ?>
                            <?php endif; ?> 
                        </div>
                    </div>
                </div>
                <div class="column-33 map">
                    <?php $i = 1; ?>
                    <?php if( have_rows('locations') ): ?>
                    <?php while( have_rows('locations') ): the_row(); ?>
                        <div id="tab<?php echo $i; ?>" class="tab_content tab<?php echo $i; ?>">
                            <div class="locations-map">
                                <iframe src="<?php the_sub_field('location_map_embed'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </section>
	
<?php get_footer(); ?>