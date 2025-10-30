    <section class="cta-block">
        <div class="container">
            <div class="columns">
                <div class="column-66 dots reversed">
                    <div class="column-content">
                        <div class="spacer-30"></div>
                        <?php if (get_field('block_headline')) { ?>
                        <h2><?php the_field('block_headline'); ?></h2>
                        <?php } else { ?>
                        <h2><?php the_field('pre_footer_headline','options'); ?></h2>
                        <?php } ?>
                        <div class="spacer-30"></div>
                        <?php if (get_field('block_copy')) { ?>
                        <p class="block-copy"><?php the_field('block_copy'); ?></p>
                        <?php } else { ?>
                        <p class="block-copy"><?php the_field('pre_footer_copy','options'); ?></p>
                        <?php } ?>
                        <div class="cta-contact-block">
                            <div class="call-link"><a href="tel:<?php the_field('global_phone','options'); ?>" title="Call Dungan & LeFevre today">Give us a call</a> <span class="icon-right-arrow"></span></div>
                        </div>
                    </div>
                </div>
                <div class="column-33 photo" style="background-image:url('<?php the_field('pre_footer_image','options'); ?>');">
                    &nbsp;
                </div>
            </div>
        </div>
    </section>