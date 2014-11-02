<?php
/*
Plugin Name: GifLinks
Plugin URI: http://tholman.com/giflinks/
Description: A simple javascript library used for adding full screen gif action as a hover effect.
Version: 0.0.1
Author: Dylan Ryan
Author URI:
License: MIT
*/

/*
 * Deny Direct Access
 */
if(!defined('WPINC')){
    die;
}

add_action('init', 'giflinks_register_shortcode');
function giflinks_register_shortcode(){
    add_shortcode('giflink', 'giflinks_shortcode');
}

function giflinks_shortcode($atts) {

    $output = '';

    $giflink_atts = shortcode_atts( array(
        'href'      =>  '',
        'gif'       =>  '',
        'content'   =>  ''
    ), $atts );

    $output .= '<a href="'.wp_kses_post($giflink_atts[$href]).'" data-src="'.wp_kses_post($giflink_atts[$gif]).'">'.wp_kses_post($giflink_atts[$content]).'</a>';

    return $output;

}

add_action('wp_enqueue_scripts', '');
function giflinks_enqueue_script(){
    wp_enqueue_script('giflinks-js', plugins_url('js/GifLinks.min.js',__FILE__));
}