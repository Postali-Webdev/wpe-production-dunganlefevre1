<?php
/**
 * Custom Resources Custom Post Type
 *
 * @package Postali Parent
 * @author Postali LLC
 */

function create_custom_post_type_resources() {

// set up labels
    $labels = array(
        'name' => 'Resources',
        'singular_name' => 'Resource',
        'add_new' => 'Add New Resource',
        'add_new_item' => 'Add New Resource',
        'edit_item' => 'Edit Resources',
        'new_item' => 'New Resources',
        'all_items' => 'All Resources',
        'view_item' => 'View Resources',
        'search_items' => 'Search  Resources',
        'not_found' =>  'No resources Found',
        'not_found_in_trash' => 'No resources found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => ' Resources',

    );
    //register post type
    register_post_type( 'Resources', array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-analytics',
        'has_archive' => true,
        'hierarchical' => true, 
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt' ),  
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'resources', 'with_front' => false ), // Allows for /legal-blog/ to be the preface to non pages, but custom posts to have own root
        )
    );

}

// Register Custom Taxonomy
function resource_topic() {

	$labels = array(
		'name'                       => _x( 'Resource Topic', 'Resource Topics' ),
		'singular_name'              => _x( 'Resource Topic', 'Resource Topic' ),
		'menu_name'                  => __( 'Resource Topic' ),
		'all_items'                  => __( 'All Resource Topics' ),
		'new_item_name'              => __( 'New Resource Topic' ),
		'add_new_item'               => __( 'Add Resource Topic' ),
		'edit_item'                  => __( 'Edit Resource Topic' ),
		'update_item'                => __( 'Update Resource Topic' ),
		'view_item'                  => __( 'View Resource Topic' ),
		'separate_items_with_commas' => __( 'Separate Resource Topics with commas' ),
		'add_or_remove_items'        => __( 'Add or remove Resource Topics' ),
		'popular_items'              => __( 'Popular Resource Topics' ),
		'search_items'               => __( 'Search Resource Topics' ),
		'not_found'                  => __( 'Not Found' ),
		'no_terms'                   => __( 'No Resource Topics' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
        'exclude_from_search'        => true,
	);
	register_taxonomy( 'resource_topic', array( 'resources' ), $args );

}
add_action( 'init', 'resource_topic', 0 );
add_action( 'init', 'create_custom_post_type_resources' );