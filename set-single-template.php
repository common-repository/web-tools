<?php

// some security stuff
if(!defined('ABSPATH')):
    die("Hi there!  I\'m just a plugin, not much I can do when called directly.");
    exit;
endif;

add_filter('single_template', 'webtools_single_page_custom_template');


// Filter the single_template with our custom function
function webtools_single_page_custom_template($single) {

    global $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'tool' ) {

		$cpt_template_path = plugin_dir_path( __FILE__ ) . '_inc/single-tools.php';

        if ( file_exists( $cpt_template_path ) ) {
            return $cpt_template_path;
        }
    }

    return $single;

}
