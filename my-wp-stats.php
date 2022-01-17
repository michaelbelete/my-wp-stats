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
    wp_register_style("tailwind",  plugins_url().'/my-wp-stats/assets/css/tailwind.min.css');
    wp_register_style("dataTable", plugins_url().'/my-wp-stats/assets/css/jquery.dataTables.min.css');
    wp_register_style( 'fontAwesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css' );
    wp_register_script("tailwindjs", plugins_url().'/my-wp-stats/assets/js/tailwind.js');
    wp_register_script("jquery", plugins_url().'/my-wp-stats/assets/js/jquery-3.6.0.min.js');
    wp_register_script("apexChart", plugins_url().'/my-wp-stats/assets/js/apexcharts.js');
    wp_register_script("dataTablejs", plugins_url().'/my-wp-stats/assets/js/jquery.dataTables.min.js');
   
}

add_action("admin_menu", "addMenu");
function addMenu()
{
    
    wp_enqueue_style('tailwind');
    wp_enqueue_style('fontAwesome');
    wp_enqueue_style('dataTable');

    wp_enqueue_script('tailwindjs');
    wp_enqueue_script('apexChart');
    wp_enqueue_script('dataTablejs');
    add_menu_page("My WP Stats", "My WP Stats", 4, "my-wp-stats", "launchWpStats" );
}

function launchWpStats()
{
    require("includes/home.php");
}
