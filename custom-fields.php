<?php

// some security stuff
if(!defined('ABSPATH')):
    die("Hi there!  I\'m just a plugin, not much I can do when called directly.");
    exit;
endif;


// add meta boxes

add_action( 'add_meta_boxes', 'webtools_add_metaboxes' );

function webtools_add_metaboxes() {
    add_meta_box( 
        'webtools_toolname',
        __( 'Tool Name', 'web-tools' ),
        'webtools_toolname_content',
        'tool',
        'normal',
        'high'
	);
	add_meta_box( 
        'webtools_toolicon',
        __( 'Tool Icon', 'web-tools' ),
        'webtools_toolicon_content',
        'tool',
        'normal',
        'high'
	);
	add_meta_box( 
        'webtools_main_code',
        __( 'Code', 'web-tools' ),
        'webtools_main_code_content',
        'tool',
        'normal',
        'high'
    );
}

function webtools_toolname_content( $post ) {
	// Nonce field to validate form request came from current site
	wp_nonce_field( basename( __FILE__ ), 'webtools_toolname_content_nonce' );
	// Get the name data if it's already been entered
	$name = get_post_meta( $post->ID, 'webtools_toolname', true );
	echo '<input type="text" name="webtools_toolname" placeholder="Enter a Name" value="' . esc_textarea( $name )  . '" />';
}

if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'webtools_icon_size', 50, 50 ); 
}

function webtools_image_uploader_field( $name, $value = '') {
    $image = ' button">Upload image';
    $image_size = 'webtools_icon_size'; 
    $display = 'none'; // display state ot the "Remove image" button

    if( $image_attributes = wp_get_attachment_image_src( $value, $image_size ) ) {

        // $image_attributes[0] - image URL
        // $image_attributes[1] - image width
        // $image_attributes[2] - image height

        $image = '"><img src="' . $image_attributes[0] . '" style="max-width:95%;display:block;" />';
        $display = 'inline-block';

    } 

    return '
    <div>
        <a href="#" class="misha_upload_image_button' . $image . '</a>
        <input type="hidden" name="' . $name . '" value="' . $value . '" />
        <a href="#" class="misha_remove_image_button" style="display:inline-block;display:' . $display . '">Remove image</a>
    </div>
	<script>
jQuery(function($){
    $("body").on("click", ".misha_upload_image_button", function(e){
        e.preventDefault();
            var button = $(this),
                custom_uploader = wp.media({
            title: "Insert image",
            library : {
                type : "image"
            },
            button: {
                text: "Use this image" 
            },
            multiple: false
        }).on("select", function() { 
            var attachment = custom_uploader.state().get("selection").first().toJSON();
            $(button).removeClass("button").html("<img class=\"true_pre_image\" src=\"" + attachment.url + "\" style=\"max-width:95%;display:block;\" />").next().val(attachment.id).next().show();
        })
        .open();
    });


    $("body").on("click", ".misha_remove_image_button", function(){
        $(this).hide().prev().val("").prev().addClass("button").html("Upload image");
        return false;
    });

});

	</script>
	';
}

function webtools_toolicon_content( $post ) {
	// Nonce field to validate form request came from current site
	wp_nonce_field( basename( __FILE__ ), 'webtools_toolicon_content_nonce' );
	// Get the name data if it's already been entered
	$url = get_post_meta($post->ID, 'webtools_toolicon', true);
	echo '<p>Select a image that show in webpage.</p>';
	echo '<p><strong>Recommended: </strong>Square 50*50 image</p>';
	echo webtools_image_uploader_field( 'webtools_toolicon', get_post_meta($post->ID, 'webtools_toolicon', true) );
}

function webtools_main_code_content( $post ) {
	// Nonce field to validate form request came from current site
	wp_nonce_field( basename( __FILE__ ), 'webtools_main_code_content_nonce' );
	// Get the name data if it's already been entered
	$main_code = get_post_meta($post->ID, 'webtools_main_code', true);
	echo '<textarea rows="20" name="webtools_main_code">' .  $main_code  . '</textarea><br>';
	echo '<i>I know this code input field is good and user friendly. </i>';
	echo '<b>If you want to contribute development for this plugin let me know at: rohitnishad527527@gmail.com</b>';
	
}


/**
 * Save the metabox data
 */
function webtools_save_metadata( $post_id, $post ) {

	// Return if the user doesn't have edit permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}

	// Verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times.
	if ( ! isset( $_POST['webtools_toolname'] ) || ! wp_verify_nonce( $_POST['webtools_toolname_content_nonce'], basename(__FILE__) ) ) {
		return $post_id;
	}

	if ( ! isset( $_POST['webtools_toolicon'] ) || ! wp_verify_nonce( $_POST['webtools_toolicon_content_nonce'], basename(__FILE__) ) ) {
		return $post_id;
	}

	if ( ! isset( $_POST['webtools_main_code'] ) || ! wp_verify_nonce( $_POST['webtools_main_code_content_nonce'], basename(__FILE__) )) {
		return $post_id;
	}



	// Now that we're authenticated, time to save the data.

	$webtools_meta['webtools_toolname'] = sanitize_textarea_field( $_POST['webtools_toolname'] );
	$webtools_meta['webtools_toolicon'] = sanitize_textarea_field( $_POST['webtools_toolicon'] );
	$webtools_meta['webtools_main_code'] = sanitize_textarea_field( $_POST['webtools_main_code'] );

	// Cycle through the $webtools_meta array.
	// Note, in this example we just have one item, but this is helpful if you have multiple.
	foreach ( $webtools_meta as $key => $value ) :

		// Don't store custom data twice
		if ( 'revision' === $post->post_type ) {
			return;
		}

		if ( get_post_meta( $post_id, $key, false ) ) {
			// If the custom field already has a value, update it.
			update_post_meta( $post_id, $key, $value );
		} else {
			// If the custom field doesn't have a value, add it.
			add_post_meta( $post_id, $key, $value);
		}

		if ( ! $value ) {
			// Delete the meta key if there's no value
			delete_post_meta( $post_id, $key );
		}

	endforeach;

}
add_action( 'save_post', 'webtools_save_metadata', 1, 2 );
