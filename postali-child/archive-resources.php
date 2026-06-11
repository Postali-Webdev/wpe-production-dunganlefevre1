<?php
/**
 * Template Name: Resources Archive
 * 
 * @package Postali Child
 * @author Postali LLC
 */

get_header(); ?>

<div class="body-container">

    <?php get_template_part('blocks/block','interior-breadcrumbs'); ?>

    <section>
        <div class="container">
            <div class="columns filter-sort">
                <div class="column-75">
                    <h1>Resources</h1>
                </div>
                <div class="column-25">
                <?php
                $args = array(
                    'post_type' => 'resources',
                    'taxonomy'  => 'resource_topic', 
                );

                $categories = get_terms( $args ); 
                $category_link ='';
                ?>
                    <div class="accordions">
                        <div class="accordions_title">
                            Filter: All Posts <span class="icon-filter-icon"></span>
                        </div>
                        <div class="accordions_content">
                            <?php
                            $args = array(
                                        'taxonomy' => 'resource_topic',
                                        'orderby' => 'name',
                                        'order'   => 'ASC',
                                    );

                            $cats = get_categories($args);

                            echo '<ul>';

                            foreach($cats as $cat) {
                            ?>
                                <li><a href="/blog/resource_topic/<?php echo $cat->slug; ?>/">
                                    <?php echo $cat->name; ?>
                                </a></li>
                            <?php
                            }
                            echo '<li><a href="/resources/">All</a></li>';
                            echo '</ul>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns blog-posts">
                <?php while( have_posts() ) : the_post(); ?>
                <div class="resource-block">
                    <div class="column-full">
                        <div class="dot-line">
                            <div class="dot">•</div>
                            <div class="line"></div>
                        </div>
                        <div class="date-category">
                            <?php echo get_the_date('m.d.y'); ?> | 
                            <?php
                            // Get terms for the current post ID and specific taxonomy
                            $terms = get_the_terms( get_the_ID(), 'resource_topic' ); // Replace with your taxonomy slug

                            if ( $terms && ! is_wp_error( $terms ) ) : 
                                foreach ( $terms as $term ) :
                                    // Get the term link
                                    $term_link = get_term_link( $term );
                                    
                                    // Display term name as a link
                                    echo '<a href="' . esc_url( $term_link ) . '">' . esc_html( $term->name ) . '</a>';
                                endforeach;
                            endif;
                            ?>  
                        </div>
                    </div>
                    <div class="column-50">

                        <h3><?php the_title(); ?></h3>
                        <div class="spacer-30"></div>
                        <?php
                        $file = get_field('download');
                        if( $file ): ?>

                            <button type="button" 
                                    class="btn" 
                                    data-name="<?php echo $file['url']; ?>">
                                Download PDF
                            </button>

                        <?php endif; ?>
                    </div> 
                    <div class="column-50">
                        <?php the_content(); ?>
                    </div>
                    <div class="spacer-60"></div>
                </div>
                    
                <?php endwhile; wp_reset_postdata(); ?>
                <div class="column-full centered">
                    <?php the_posts_pagination(); ?>
                </div>
            </div>
        </div><!-- #content -->
    </section>

    <section class="modal-window">
        <div class="inner">
            <div class="close-window"><span class="icon-close-icon"></span></div>
            <h2>Get Your Free Resource</h2>
            <?php echo do_shortcode(' [gravityform id="5" title="false" ajax="true"] '); ?>
        </div>
    </section>

</div>

<script>
// --- Cookie helpers ---
function setCookie(name, value, days) {
    const expires = new Date(Date.now() + days * 864e5).toUTCString();
    document.cookie = name + '=' + encodeURIComponent(value) + '; expires=' + expires + '; path=/';
}
function getCookie(name) {
    return document.cookie.split('; ').reduce((acc, cookie) => {
        const [key, val] = cookie.split('=');
        return key === name ? decodeURIComponent(val || '') : acc;
    }, '');
}

// --- Close modal ---
jQuery('.close-window').click(function() {
    jQuery('.modal-window').removeClass('open');
});

// --- Button click handler ---
// If the 'collected' cookie is set, skip the modal and download directly.
// Otherwise, populate the GF hidden field and open the modal.
document.querySelectorAll('.btn').forEach(button => {
    button.onclick = function() {
        const name = this.dataset.name;

        if (getCookie('collected')) {
            // Already gave us their email — straight to the download
            window.open(name, '_blank');
            return;
        }

        // First-time visitor: stash the URL and open the modal
        const downloadEl = document.querySelector('#download');
        if (downloadEl) {
            downloadEl.innerText = name;
        }

        // Populate Gravity Forms hidden field #input_5_4
        // (#field_5_4 is the field wrapper; querying inside it finds the input
        // whether the form is rendered with default or custom markup)
        const gfWrapper = document.querySelector('#field_5_4');
        const gfInput = gfWrapper
            ? gfWrapper.querySelector('input, textarea')
            : document.querySelector('#input_5_4');
        if (gfInput) {
            gfInput.value = name;
        }

        jQuery('.modal-window').addClass('open');
    };
});

// --- Listen for Gravity Forms #5 submission ---
// Fires after a successful AJAX submit. Sets the 'collected' cookie so future
// .btn clicks skip the modal, then triggers the download for the file the user
// originally requested. The modal stays open so the GF confirmation message
// is visible — user dismisses it via the close button.
jQuery(document).on('gform_confirmation_loaded', function(event, formId) {
    if (parseInt(formId, 10) !== 5) {
        return;
    }
    setCookie('collected', '1', 30); // 30 days — adjust as needed

    const downloadEl = document.querySelector('#download');
    const url = downloadEl ? downloadEl.innerText.trim() : '';
    if (url) {
        window.open(url, '_blank');
    }
});
</script>

<?php get_footer(); ?>
