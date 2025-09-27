<?php
/**
 * Plugin Name: Itays Elementor
 * Description:  Giving website builders the tools they deserve.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Itay Barak
 * Author URI:  https://developers.elementor.com/
 * Text Domain: itays-elementor
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25.0
 * Elementor Pro tested up to: 3.25.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


add_action( 'plugins_loaded', function (){
    // Load plugin file
    require_once( __DIR__ . '/plugin.php' );
	require_once(__DIR__ . '/global/constants.php');
	require_once(__DIR__ . '/global/utils.php');

	// Run the plugin
	\itays_elementor_core\plugin::instance(); } 
);