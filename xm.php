<?php
/**
 * @link              http://lynks.se
 * @since             1.0.0
 * @package           xm
 * Plugin Name:       XM
 * Plugin URI:        
 * Description:       Provides content types and controls for XM Reality
 * Author:            Niklas Brunberg
 * Version:           1.3.1
 * Author URI:        http://lynks.se
 * License:           
 * License URI:       
 * Text Domain:       xm
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-xm-activator.php
 */
function activate_XM() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-xm-activator.php';
	XM_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-xm-deactivator.php
 */
function deactivate_XM() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-xm-deactivator.php';
	XM_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_XM' );
register_deactivation_hook( __FILE__, 'deactivate_XM' );


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-xm.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_xm() {

	$plugin = new XM();
	$plugin->run();

}
run_xm();
