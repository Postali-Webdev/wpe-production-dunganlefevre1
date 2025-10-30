    <?php if (has_post_thumbnail( $post->ID ) ) { ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
    <section class="banner" style="background-image: url('<?php echo $image[0]; ?>')">
    <?php } else { ?>
    <section class="banner">
    <?php } ?>

        <?php if(is_front_page()) { ?>
        <div class="container thin">
            <div class="spacer-60"></div>
            <div class="columns">
                <div class="column-66">
                    <h1><?php the_field('banner_headline'); ?></h1>
                    <span class="subhead"><?php the_field('banner_subhead'); ?></span>
                    <div class="spacer-30"></div>
                    <div class="cta-block">
                        <p>Give Us a Call Today</p>
                        <div class="spacer-15"></div>
                        <a href="tel:<?php the_field('global_phone','options'); ?>" class="btn"><?php the_field('global_phone','options'); ?></a>
                    </div>
                </div>

                <div class="mobile-banner"  style="background-image: url('<?php echo $image[0]; ?>')"></div>
                
                <div class="column-33">
                    <p><?php the_field('banner_right_column'); ?></p>
                </div>
            </div>
        </div>

        <?php } elseif(is_singular('staff')) { ?>

        <div class="container">
            <p id="breadcrumbs"><span><span><a href="/">Home</a> <span> | </span> <span><a href="/attorney/">Our People</a> <span> | </span> <span class="breadcrumb_last" aria-current="page"><?php the_title(); ?></span></span></span></span></p>
            <div class="spacer-60"></div>
            <div class="columns end">
                <div class="column-66 block">
                    <h1><?php the_title(); ?></h1>
                    <span class="subhead"><?php the_field('staff_title'); ?></span>       
                    <div class="spacer-90"></div>
                    <div class="attorney-contact-block">
                        <a href="tel:<?php the_field('staff_phone_number'); ?>" class="btn"><?php the_field('staff_phone_number'); ?></a>
                        <?php if(get_field('attorney_vcard')) { ?>
                        <a href="<?php the_field('attorney_vcard'); ?>" class="btn">Download Vcard <span class="icon-icon-download"></span></a>
                        <?php } ?>
                        <a href="#" class="email attorney-form" data-lity>Email Me</a>
                    </div>             
                </div>
                <div class="column-33">
                    &nbsp;
                </div>
            </div>
            <div class="spacer-30"></div>
        </div>
        
        <?php } else { ?>

        <div class="container">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="spacer-60"></div>
            <div class="columns end">
                <div class="column-66">
                    <h1><?php the_field('banner_headline'); ?></h1>
                    <span class="subhead"><?php the_field('banner_subhead'); ?></span>                    
                </div>
                <div class="column-33">
                    <div class="cta-block">
                        <p>Give us a Call Today</p>
                        <div class="spacer-15"></div>
                        <a href="tel:<?php the_field('global_phone','options'); ?>" class="btn"><?php the_field('global_phone','options'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        
        <?php } ?>

    </section>

    <?php if(!is_front_page()) { ?>
        <?php if (has_post_thumbnail( $post->ID ) ) { ?>
        <section class="mobile-banner"  style="background-image: url('<?php echo $image[0]; ?>')"></section>
        <?php } ?>
    <?php } ?>