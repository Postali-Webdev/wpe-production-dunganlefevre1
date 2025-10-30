<?php
/**
 * Theme header.
 *
 * @package Postali Child
 * @author Postali LLC
**/
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
' https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NDDPN4H');</script>
<!-- End Google Tag Manager -->

<!-- Add JSON Schema here -->
<?php 
// Global Schema
$global_schema = get_field('global_schema', 'options');
if ( !empty($global_schema) ) :
	echo '<script type="application/ld+json">' . strip_tags($global_schema) . '</script>';
endif;

// Single Page Schema
$single_schema = get_field('single_schema');
if ( !empty($single_schema) ) :
	echo '<script type="application/ld+json">' . strip_tags($single_schema) . '</script>';
endif; ?>

<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
<script async src='https://storage.googleapis.com/widget.kenect.com/widget.min.js' id='kenect-token' type='text/javascript' token='bTEcJBXW2OAzqXVY5ypC'></script>
<?php if(is_singular('staff')) { ?>
<link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
<?php } ?>

</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
    <noscript><iframe src=" https://www.googletagmanager.com/ns.html?id=GTM-NDDPN4H "
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

	<header>
		<div id="header-top" class="container desktop">
			<div id="header-top_left">
				<?php the_custom_logo(); ?>
			</div>
			
			<div id="header-top_right">
				<div id="header-top_menu">
						<?php
							$args = array(
								'container' => false,
								'theme_location' => 'header-nav'
							);
							wp_nav_menu( $args );
						?>			
					<div id="header-top_mobile">
						<div id="menu-icon" class="toggle-nav">
							<span class="line line-1"></span>
							<span class="line line-2"></span>
							<span class="line line-3"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
