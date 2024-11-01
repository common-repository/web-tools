<?php

// some security stuff
if(!defined('ABSPATH')):
    die("Hi there!  I\'m just a plugin, not much I can do when called directly.");
    exit;
endif;

add_action('admin_menu', "web_tools_menu");

function web_tools_menu(){
    add_menu_page('Web Tools', 'Web Tools', 'manage_options', 'web-tools', 'web_tools_admin_menu_content', $icon_url = '', 9);
    add_submenu_page('web-tools','Settings', 'Settings', 'manage_options', 'web-tools-settings', 'web_tools_admin_settings_menu_content');
}


function web_tools_admin_menu_content(){
    return true;
}


function web_tools_admin_settings_menu_content(){ ?>

    <div class="wrap">
        <h1>Web Tools Settings</h1>
        <div class="updated notice">
            <p><b>If you want to buy or contribute to this plugin, contract me at rohitnishad527527@gmail.com.</b></p>
        </div>
        <?php settings_errors(); ?>
        <br>
       
        <h1>Donate</h1>
        <script type="text/javascript" src="https://cdnjs.buymeacoffee.com/1.0.0/button.prod.min.js" data-name="bmc-button" data-slug="rohitnishad613" data-color="#FF5F5F" data-emoji=""  data-font="Cookie" data-text="Buy me a coffee" data-outline-color="#000000" data-font-color="#ffffff" data-coffee-color="#FFDD00" ></script>
    </div>

    <?php
}