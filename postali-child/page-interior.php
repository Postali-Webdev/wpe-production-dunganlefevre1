<?php
/**
 * Law Category Interior Page
 * Template Name: Interior
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
                    <h1><?php the_field('page_title_h1'); ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="single-content">
        <div class="container thin">            
            <div class="columns">
                <div class="column-full padded block">
                    <?php the_field('intro_section'); ?>
                    
                    <?php if(!is_page(array('50320','50335','50334')) ) { ?>

                    <div class="interior-contact">
                        <div class="col" id="text">
                            <a href=""><p><span>Send us a text</span></p></a>
                        </div>
                        <div class="col" id="call">
                            <a href="tel:<?php the_field('global_phone','options'); ?>"><p><span>Give us a call</span></p></a>
                        </div>
                    </div>

                    <?php } ?>

                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','cta'); ?>
	
<?php get_footer(); ?>