<section class="interior-breadcrumbs">
    <div class="container">
        <?php if (is_home()) { ?>
            <p id="breadcrumbs"><span><span><a href="/">Home</a> <span> | </span> <span class="breadcrumb_last" aria-current="page">Legal Blog</span></span></span></p>
        <?php } elseif (is_single()) { ?>
            <p id="breadcrumbs"><span><span><a href="/">Home</a> <span> | </span> <a href="/blog/">Legal Blog</a> <span> | </span> <span class="breadcrumb_last" aria-current="page"><?php the_title(); ?></span></span></span></p>
        <?php } elseif (is_post_type_archive('staff')) { ?>
            <p id="breadcrumbs"><span><span><a href="/">Home</a> <span> | </span> <span class="breadcrumb_last" aria-current="page">Our People</span></span></span></p>
        <?php } elseif (is_post_type_archive('results')) { ?>
            <p id="breadcrumbs"><span><span><a href="/">Home</a> <span> | </span> <span class="breadcrumb_last" aria-current="page">Our Results</span></span></span></p>
        <?php } else { ?>
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
        <?php } ?>
    </div>
</section>