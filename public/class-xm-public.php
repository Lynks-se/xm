<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://lynks.se
 * @since      1.0.0
 *
 * @package    XM
 * @subpackage XM/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    XM
 * @subpackage XM/public
 * @author     Niklas Brunberg <niklas@lynks.se>
 */
class XM_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in XM_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The XM_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// css/xm-public.css is currently empty and does not need to be sent to the visitor
		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/xm-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in XM_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The XM_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// js/xm-public.js is currently empty and does not need to be sent to the visitor
		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/xm-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add Shortcode for the public-facing side of the site.
	 *
	 * @since    1.1.0
	 */
	public function xm_shortcode_section( $atts , $content = null ) {

		// Attributes
		extract( shortcode_atts(
			array(
				'color' => '#333333',
				'background_color' => '#ffffff',
			), $atts )
		);

		$prefix = '<section style="color: ' . $atts['color'] . '; background-color: ' . $atts['background_color'] . ';">';
		$suffix = '</section>';

		return $prefix . $content . $suffix;

	}

	/**
	 * Remove jQuery migrate from public-facing pages because it is not needed
	 *
	 * @since 1.2.1
	 * @param      WP_Scripts object    $scripts       A WordPress scripts object.
	 */
	public function xm_remove_jquery_migrate( WP_Scripts &$scripts ) {

		if ( ! is_admin() ) {
			$scripts->remove( 'jquery');
			$scripts->remove( 'jquery-migrate');
			$scripts->add( 'jquery', false, array( 'jquery-core' ) );
		}

	}

}
