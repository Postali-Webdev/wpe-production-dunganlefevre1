    <section class="awards">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div id="awards-slider" class="slide">
                        <?php if( have_rows('awards','options') ): ?>
                        <?php while( have_rows('awards','options') ): the_row(); ?>  
                            <div class="award">
                                <?php 
                                $image = get_sub_field('award_logo');
                                if( !empty( $image ) ): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                        <?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>