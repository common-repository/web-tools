<?php

// some security stuff
if(!defined('ABSPATH')):
    die("Hi there!  I\'m just a plugin, not much I can do when called directly.");
    exit;
endif;

// Register Custom Post Type Tool
function webtools_create_tool_cpt() {

	$labels = array(
		'name' => _x( 'Tools', 'Post Type General Name', 'web-tools' ),
		'singular_name' => _x( 'Tool', 'Post Type Singular Name', 'web-tools' ),
		'menu_name' => _x( 'Tools', 'Admin Menu text', 'web-tools' ),
		'name_admin_bar' => _x( 'Tool', 'Add New on Toolbar', 'web-tools' ),
		'archives' => __( 'Tool Archives', 'web-tools' ),
		'attributes' => __( 'Tool Attributes', 'web-tools' ),
		'parent_item_colon' => __( 'Parent Tool:', 'web-tools' ),
		'all_items' => __( 'All Tools', 'web-tools' ),
		'add_new_item' => __( 'Add New Tool', 'web-tools' ),
		'add_new' => __( 'Add New', 'web-tools' ),
		'new_item' => __( 'New Tool', 'web-tools' ),
		'edit_item' => __( 'Edit Tool', 'web-tools' ),
		'update_item' => __( 'Update Tool', 'web-tools' ),
		'view_item' => __( 'View Tool', 'web-tools' ),
		'view_items' => __( 'View Tools', 'web-tools' ),
		'search_items' => __( 'Search Tool', 'web-tools' ),
		'not_found' => __( 'Not found', 'web-tools' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'web-tools' ),
		'insert_into_item' => __( 'Insert into Tool', 'web-tools' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Tool', 'web-tools' ),
		'items_list' => __( 'Tools list', 'web-tools' ),
		'items_list_navigation' => __( 'Tools list navigation', 'web-tools' ),
		'filter_items_list' => __( 'Filter Tools list', 'web-tools' ),
	);
	$rewrite = array(
		'slug' => 'tools',
		'with_front' => true,
		'pages' => true,
		'feeds' => true,
	);
	$args = array(
		'label' => __( 'Tool', 'web-tools' ),
		'description' => __( 'Create web tools such as Generator, calculator, any other custom tool.', 'web-tools' ),
		'labels' => $labels,
		'supports' => array('title', 'editor', 'revisions'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => 'web-tools',
		'show_in_admin_bar' => false,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
		'rewrite' => $rewrite,
	);
	register_post_type( 'tool', $args );

}
add_action( 'init', 'webtools_create_tool_cpt', 0 );


