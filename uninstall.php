<?php

// some security stuff
if(!defined('ABSPATH')):
    die("Hi there!  I\'m just a plugin, not much I can do when called directly.");
    exit;
endif;


delete_option( 'web-tools-slug' );
delete_option( 'web-tools-default-css' );
flush_rewrite_rules();