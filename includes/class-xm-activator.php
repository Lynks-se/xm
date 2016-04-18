<?php

/**
 * Fired during plugin activation
 *
 * @link       http://lynks.se
 * @since      1.0.0
 *
 * @package    xm
 * @subpackage xm/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    xm
 * @subpackage xm/includes
 * @author     Niklas Brunberg <niklas@lynks.se>
 */
class XM_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		XM_Admin::new_custom_post_type_story();
	}

}
