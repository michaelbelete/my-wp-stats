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
    wp_register_script( 'Jquery', "https://code.jquery.com/jquery-3.6.0.min.js");
    wp_register_script( 'BootstrapBundleWithPopper', "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js");
    wp_register_script( 'ChartJs', "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js");
    wp_register_style( 'Bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' );
    wp_register_style( 'FontAwesome', ' https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css' );
   
}

add_action("admin_menu", "addMenu");
function addMenu()
{
    wp_enqueue_script('Jquery');
    wp_enqueue_script('BootstrapBundleWithPopper');
    wp_enqueue_script('ChartJs');
    wp_enqueue_style('Bootstrap');
    wp_enqueue_style('FontAwesome');
    add_menu_page("My WP Stats", "My WP Stats", 4, "my-wp-stats", "launchWpStats" );
    // add_submenu_page("example_options", "Option 1", "Option 1", 4, "example-option-1", "option1");
}

function launchWpStats()
{
    require("includes/home.php");
}
