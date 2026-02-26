    <section class="reviews" style="background-image:url('<?php the_field('hp_reviews_section_bg'); ?>');">
        <div class="container">
            <div class="columns">
                <div class="column-66 centered center block">
                    <p class="block-title"><?php the_field('hp_reviews_section_title'); ?></p>
                    <p class="reviews-quote"><?php the_field('hp_reviews_quote'); ?></p>
                    <div class="spacer-30"></div>
                    <div class="reviews-rating">
                        <img src="/wp-content/uploads/2023/05/Google_reviews_reversed.svg"><p>4.9 Rating out of 266 Reviews</p>
                    </div>
                    <a href="/testimonials/" class="btn">See All Reviews</a>
                    <div class="spacer-90"></div>
                </div>
                
                <div class="column-75 center pre-footer">
                    <p class="block-title"><?php the_field('hp_pre_footer_section_title'); ?></p>
                    <h2><?php the_field('hp_pre_foooter_section_h2'); ?></h2>
                    <?php the_field('hp_pre_footer_section_copy'); ?>
                    <div class="pre-footer-contact">
                        <div class="col" id="call">
                            <a href="tel:<?php the_field('global_phone','options'); ?>"><p><span>Give us a call</span></p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>