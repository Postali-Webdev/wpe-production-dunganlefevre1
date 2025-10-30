<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/
?>
<footer>

    <section>
        <div class="container">
            <div class="columns">
                <div class="column-full centered">
                    <?php 
                    $image = get_field('footer_logo','options');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="footer-logo" />
                    <?php endif; ?>
                </div>
                <div class="spacer-60"></div>
                <div class="column-25 block border-top">
                    <h4>Get in Touch</h4>
                    <ul class="in-touch">
                        <li><a href="tel:<?php the_field('global_phone','options'); ?>" title="Call Dungan & LeFevre"><?php the_field('global_phone','options'); ?></a></li>
                        <li class="arrowed"><a href="/contact/" title="Contact Dungan & LeFevre">Fill Out Our Form</a><span class="icon-right-arrow"></span></li>
                        <li class="arrowed"><a href="https://www.google.com/search?q=dunga+%26+lefevre&rlz=1C5CHFA_enUS770US770&oq=dunga+%26+lefevre&gs_lcrp=EgZjaHJvbWUyBggAEEUYOTIGCAEQRRhAMgYIAhBFGDwyBggDEEUYPDIGCAQQRRg80gEINzk0MmowajeoAgCwAgA&sourceid=chrome&ie=UTF-8#lrd=0x883f77203dfd9725:0xc985c43e1169d5ce,3,,,," title="Review Dungan & LeFevre" target="blank">Leave Us a Review</a><span class="icon-right-arrow"></span></li>
                    </ul>
                    <div class="social">
                        <?php if(get_field('social_facebook','options')) { ?>
                            <a href="<?php the_field('social_facebook','options'); ?>" class="social-icon" target="blank"><span class="icon-facebook"></span></a>
                        <?php } ?>
                        <?php if(get_field('social_linkedin','options')) { ?>
                            <a href="<?php the_field('social_linkedin','options'); ?>" class="social-icon" target="blank"><span class="icon-linkedin"></span></a>
                        <?php } ?>
                        <?php if(get_field('social_twitter','options')) { ?>
                            <a href="<?php the_field('social_twitter','options'); ?>" class="social-icon" target="blank"><span class="icon-twitter"></span></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="column-25 block border-top links">
                <h4>Site Links</h4>
                    <?php
                        $args = array(
                            'container' => false,
                            'theme_location' => 'footer-nav'
                        );
                        wp_nav_menu( $args );
                    ?>	
                </div>
                <div class="column-50 border-top">
                    <div class="offices">
                        <div class="offices-left">
                            <h4>Troy Office</h4>
                            <p>
                                <?php the_field('troy_address','options'); ?><br>
                                <a href="<?php the_field('troy_driving_directions','options'); ?>" title="Directions to our Troy office" target="blank">Directions ></a>
                            </p>
                        </div>
                        <div class="offices-right">
                            <iframe src="<?php the_field('troy_map_embed','options'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="spacer-60"></div>
                        <div class="offices-left">
                            <h4>Greenville Office</h4>
                            <p>
                                <?php the_field('greenville_address','options'); ?><br>
                                <a href="<?php the_field('greenville_driving_directions','options'); ?>" title="Directions to our Greenville office" target="blank">Directions ></a>
                            </p>
                        </div>
                        <div class="offices-right">
                            <iframe src="<?php the_field('greenville_map_embed','options'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <div class="spacer-60"></div>
                <div class="column-full centered">
                    <p class="xsmall"><?php the_field('footer_disclaimer','options'); ?></p>
                    <div class="spacer-30"></div>
                    <div class="footer-utility">
                        <?php
							$args = array(
								'container' => false,
								'theme_location' => 'footer-utility-nav'
							);
							wp_nav_menu( $args );
						?>	
                        <p class="copyright-year">Copyright &copy; <?php echo date('Y'); ?> Dungan & LeFevre. All rights reserved.</p>
                        <?php if(is_page_template('front-page.php')) { ?>
                        <div class="spacer-15"></div>
                        <a href="https://www.postali.com" title="Site design and development by Postali" target="blank"><img src="https://www.postali.com/wp-content/themes/postali-site/img/postali-tag.png" alt="Postali | Results Driven Marketing" style="display:block; max-width:250px; margin:10px auto 0;"></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</footer>

<?php wp_footer(); ?>
</body>
</html>


