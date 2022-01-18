<?php
/**
 * Plugin Name: My Wp Stats
 * Plugin URI: 
 * Description: Gather useful information about your wordpress website
 * Version: 1.0
 * Author: Michael Belete
 * Author URI: http://www.mywebsite.com
 */
// Exit if accessed directly
if(!defined('ABSPATH')){
    exit;
}

// Load Scripts
require_once(plugin_dir_path(__FILE__).'/includes/my_wp_stats_script.php');

// // Load Class
require_once(plugin_dir_path(__FILE__).'/includes/my_wp_stats_class.php');

// // Register Widget
function register_my_wp_stats_widget(){
  register_widget('My_WP_STATS_WIDGET');
}

// // Hook in function
add_action('widgets_init', 'register_my_wp_stats_widget');

