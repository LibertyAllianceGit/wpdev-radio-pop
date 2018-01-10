<?php
/*
Plugin Name: WP Developers | Liberty Alliance Radio Player
Plugin URI: http://wpdevelopers.com
Description: Custom popups and radio player buttons by WP Developers. Use shortcode [laradio]. Also allows shortcodes in default text widget.
Version: 1.0.4
Author: Tyler Johnson
Author URI: http://tylerjohnsondesign.com/
Copyright: Tyler Johnson
Text Domain: wpdevpopup
*/

/**
GitHub Update
**/
require 'plugin-update-checker/plugin-update-checker.php';
$className = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/LibertyAllianceGit/wpdev-radio-pop',
	__FILE__,
	'wpdev-radio-pop'
);

/**
Enqueue Files
**/
function wpdev_radio_plugin_files() {
  wp_enqueue_script( 'wpdev-radio-js', plugin_dir_url(__FILE__) . 'inc/wpdev-radio.js', true, true, true );
}
add_action('wp_enqueue_scripts', 'wpdev_radio_plugin_files', 20);

/**
Allow Shortcodes in Widgets
**/
add_filter('widget_text', 'do_shortcode');

/**
Create Shortcode
**/
function wpdev_radio_shortcode() {
  $output = '<div id="wpdevradiobtn" style="cursor: pointer;"><img src="' . plugin_dir_url(__FILE__) . 'inc/laradio_animated.gif" alt="Liberty Alliance Radio"/></div>';

  return $output;
}
add_shortcode('laradio', 'wpdev_radio_shortcode');
