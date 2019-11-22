<?php

/**
 * 
 * TODO! make sure to replace srsp with your own plugin's prefix
 * 
 * */

add_action("admin_enqueue_scripts", "srsp_scripts");
add_action("wp_enqueue_scripts", "srsp_scripts");
function srsp_scripts() { 
    if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
        wp_enqueue_script('srsp_reactapp', 'http://localhost:3000/static/js/bundle.js',[],'1.0',true);
    } else {
        wp_enqueue_script('srsp_reactapp', plugin_dir_url( __FILE__ ) . 'reactapp_script.js',[],'1.0',true);
        wp_enqueue_style('srsp_reactapp', plugin_dir_url( __FILE__ ) . 'reactapp_style.css',[],'1.0');
    }
}