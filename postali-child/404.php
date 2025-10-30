<?php
/**
 * 404 Page Not Found.
 *
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<div class="body-container">

    <?php get_template_part('blocks/block','interior-breadcrumbs'); ?>

    <section>
        <div class="container thin">
            <div class="columns">
                <div class="column-75 centered center block">                
                    <h1>404</h1>
                    <h2>Don't know where you are?</h2>
                    <p>We really have no idea either. Let's <a href="/" title="Back to home">go home</a> <span class="icon-right-arrow"></span></p>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer();
