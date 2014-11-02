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
/*
 * Register Shortcode
 */
add_action('init', 'giflinks_register_shortcode');
function giflinks_register_shortcode(){
    add_shortcode('giflink', 'giflinks_shortcode');
}

/*
 * Main Function
 */
function giflinks_shortcode($atts, $content = null) {

    $output = '';

    $giflink_atts = shortcode_atts( array(
        'href'      =>  '',
        'gif'       =>  '',
        'class'     =>  ''
    ), $atts );
    $output .= '<a class="'.esc_attr($giflink_atts['class']).'" href="'.esc_attr($giflink_atts['href']).'" data-src="'.esc_attr($giflink_atts['gif']).'">'.do_shortcode($content).'</a>';

    return $output;

}

/*
 * Enqueue Scripts
 */
add_action('wp_enqueue_scripts', 'giflinks_enqueue_script');
function giflinks_enqueue_script(){
    wp_enqueue_script('giflinks-js', plugins_url('js/GifLinks.min.js',__FILE__));
    wp_enqueue_script('giflinks-custom', plugins_url('js/custom.js',__FILE__), array(), '0.0.1', true);
}