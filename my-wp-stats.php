<?php
/**
 * Plugin Name: My Wp Stats
 * Plugin URI: 
 * Description: Gather useful information about your wordpress website
 * Version: 1.0
 * Author: Michael Belete
 * Author URI: http://www.mywebsite.com
 */

// register jquery and style on initialization
add_action('init', 'register_script');
function register_script() {
    // require_once(plugin_dir_path(__FILE__).'/includes/youtubesubs-scripts.php');
    wp_register_style("tailwind", plugin_dir_path(__FILE__).'/assets/css/tailwind.min.css');
    wp_register_style("dataTable", plugin_dir_path(__FILE__).'/assets/css/jquery.dataTables.min.css');

    wp_register_script("tailwindjs", plugin_dir_path(__FILE__).'/assets/js/tailwind.js');
    wp_register_script("jquery", plugin_dir_path(__FILE__).'/assets/js/jquery-3.6.0.min.js');
    wp_register_script("apexChart", plugin_dir_path(__FILE__).'/assets/js/apexcharts.js');
    wp_register_script("dataTablejs", plugin_dir_path(__FILE__).'/assets/js/jquery.dataTables.min.js');
   
}

add_action("admin_menu", "addMenu");
function addMenu()
{
    
    wp_enqueue_style('tailwind');
    wp_enqueue_style('dataTable');

    wp_enqueue_script('tailwindjs');
    wp_enqueue_script('jquery');
    wp_enqueue_script('apexChart');
    wp_enqueue_script('dataTablejs');
    add_menu_page("My WP Stats", "My WP Stats", 4, "my-wp-stats", "launchWpStats" );
}

function launchWpStats()
{
    require("includes/home.php");
}
