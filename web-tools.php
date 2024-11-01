<?php

/*
Plugin Name: Web Tools
Description: Create tools website such as calculator, generator, converter, etc. easily in WordPress.
Author: 360 Tech Explorer
Author Uri: https://360techexplorer.com
Version: 1.1
Tags: Web Tools, Web-Tool, web-tools, wp-tool, tool, tools, wordpress tool, wordpress tools
License: GPL V2
Text Domain: web-tools
*/


// some security stuff
if (!defined('ABSPATH')) :
    die("Hi there!  I\'m just a plugin, not much I can do when called directly.");
    exit;
endif;

if (!function_exists('web_tools_create_tool_cpt')) {
    // Register Custom Post Type
    function web_tools_create_tool_cpt()
    {
        $labels = array(
            'name'                  => _x('Web Tools', 'Post Type General Name', 'web_tools'),
            'singular_name'         => _x('Web Tool', 'Post Type Singular Name', 'web_tools'),
            'menu_name'             => __('Web Tools', 'web_tools'),
            'name_admin_bar'        => __('Web Tool', 'web_tools'),
            'archives'              => __('Web Tool Archives', 'web_tools'),
            'attributes'            => __('Web Tool Attributes', 'web_tools'),
            'parent_item_colon'     => __('Parent Web Tool:', 'web_tools'),
            'all_items'             => __('All Web Tools', 'web_tools'),
            'add_new_item'          => __('Add New Web Tool', 'web_tools'),
            'add_new'               => __('Add New', 'web_tools'),
            'new_item'              => __('New Item', 'web_tools'),
            'edit_item'             => __('Edit Item', 'web_tools'),
            'update_item'           => __('Update Item', 'web_tools'),
            'view_item'             => __('View Item', 'web_tools'),
            'view_items'            => __('View Items', 'web_tools'),
            'search_items'          => __('Search Item', 'web_tools'),
            'not_found'             => __('Not found', 'web_tools'),
            'not_found_in_trash'    => __('Not found in Trash', 'web_tools'),
            'featured_image'        => __('Featured Image', 'web_tools'),
            'set_featured_image'    => __('Set featured image', 'web_tools'),
            'remove_featured_image' => __('Remove featured image', 'web_tools'),
            'use_featured_image'    => __('Use as featured image', 'web_tools'),
            'insert_into_item'      => __('Insert into item', 'web_tools'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'web_tools'),
            'items_list'            => __('Items list', 'web_tools'),
            'items_list_navigation' => __('Items list navigation', 'web_tools'),
            'filter_items_list'     => __('Filter items list', 'web_tools'),
        );
        $rewrite = array(
            'slug'                  => 'tools',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $args = array(
            'label'                 => __('Web Tool', 'web_tools'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'revisions', 'custom-fields', 'page-attributes', 'post-formats'),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-layout',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
        );
        register_post_type('web_tools', $args);

        flush_rewrite_rules();
    }
    add_action('init', 'web_tools_create_tool_cpt', 0);
}