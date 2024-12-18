<?php
/**
 * ECH Dynamic Whatsapp Link Plugin
 *
 * @link              https://primecare.com.hk/
 * @since             1.0.0
 * @package           ECH_Dynamic_Whatsapp_Link
 * @wordpress-plugin
 * Plugin Name:       ECH Dynamic Whatsapp Link
 * Plugin URI:        https://www.ecspecialists.com/
 * 
 * Description:       Dynamic whatsapp link based on different tcode. 
 * 
 * 
 *                    
 * Version:           1.0.0
 * Author:            Toby Wong
 * Author URI:        https://primecare.com.hk/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ech-dynamic-whatsapp-link
 * Domain Path:       /languages
 */


if (! defined('ABSPATH')) {
	exit;
}


// loader.php is to load all files in folder "inc"
require_once(dirname(__FILE__). '/inc/loader.php');


// include CSS and JS files
add_action('init', 'register_dynamic_wtsapp_js');
add_action('wp_enqueue_scripts', 'enqueue_dynamic_wtsapp_js');




// Register the shortcode
add_shortcode('dynamic_wtsapp_link', 'dynamic_wtsapp_link_fun' );


