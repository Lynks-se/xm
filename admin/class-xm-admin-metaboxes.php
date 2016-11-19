<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://lynks.se
 * @since      1.0.0
 *
 * @package    XM
 * @subpackage XM/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    XM
 * @subpackage XM/admin
 * @author     Niklas Brunberg <niklas@lynks.se>
 */
class XM_Admin_Metaboxes {

	/**
	 * The post meta data
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		string 			$meta    			The post meta data.
	 */
	private $meta;

	/**
	 * The ID of this plugin.
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		string 			$plugin_name 		The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		string 			$version 			The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 		1.0.0
	 * @param 		string 			$plugin_name 		The name of this plugin.
	 * @param 		string 			$version 			The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->set_meta();

	}

	/**
	 * Registers metaboxes with WordPress
	 *
	 * @since 	1.0.0
	 * @access 	public
	 */
	public function add_metaboxes() {

		// add_meta_box( $id, $title, $callback, $screen, $context, $priority, $callback_args );

		add_meta_box(
			'xm_meta_nonce',
			apply_filters( $this->plugin_name . '-metabox-title-additional-info', esc_html__( 'Additional Info', 'xm' ) ),
			array( $this, 'metabox' ),
			'xm_user_stories',
			'normal',
			'default',
			array(
				'file' => 'info'
			)
		);

		add_meta_box(
			'xm_meta_nonce',
			apply_filters( $this->plugin_name . '-metabox-title-additional-info', esc_html__( 'Additional Info', 'xm' ) ),
			array( $this, 'metabox_slideshow' ),
			'xm_slideshow',
			'normal',
			'default',
			array(
				'file' => 'slideshow'
			)
		);

		add_meta_box(
			'xm_meta_nonce',
			apply_filters( $this->plugin_name . '-metabox-title-additional-info', esc_html__( 'Additional Info', 'xm' ) ),
			array( $this, 'metabox_jobs' ),
			'xm_jobs',
			'normal',
			'default',
			array(
				'file' => 'jobs'
			)
		);

		add_meta_box(
			'xm_meta_nonce',
			apply_filters( $this->plugin_name . '-metabox-title-additional-info', esc_html__( 'Additional Info', 'xm' ) ),
			array( $this, 'metabox_page' ),
			'page',
			'normal',
			'default',
			array(
				'file' => 'page'
			)
		);

	} // add_metaboxes()

	/**
	 * Check each nonce. If any don't verify, $nonce_check is increased.
	 * If all nonces verify, returns 0.
	 *
	 * @since 		1.0.0
	 * @access 		public
	 * @return 		int 		The value of $nonce_check
	 */
	private function check_nonces( $posted ) {

		$nonces 		= array();
		$nonce_check 	= 0;

		$nonces[] = 'xm_meta_nonce';

		foreach ( $nonces as $nonce ) {

			if ( ! isset( $posted[$nonce] ) ) { $nonce_check++; }
			if ( isset( $posted[$nonce] ) && ! wp_verify_nonce( $posted[$nonce], $this->plugin_name ) ) { $nonce_check++; }

		}

		return $nonce_check;

	} // check_nonces()

	/**
	 * Returns an array of the all the metabox fields and their respective types
	 *
	 * @since 		1.0.0
	 * @access 		public
	 * @return 		array 		Metabox fields and types
	 *
	 * @since 		1.2.0
	 * @param 		string 			$post_type 		Post type of field info to return.
	 */
	private function get_metabox_fields( $post_type ) {

		$fields = array();

		$fields['xm_user_stories']['xm_story-primary_heading'] = [ 'Primary Heading', 'text' ];
		$fields['xm_user_stories']['xm_story-button_label']    = [ 'Button Label', 'text' ];

		$fields['xm_slideshow']['xm_slideshow-second_header']    = [ 'Second Header', 'text' ];
		$fields['xm_slideshow']['xm_slideshow-link_text']   = [ 'Link Text', 'text' ];
		$fields['xm_slideshow']['xm_slideshow-link_url']    = [ 'Link URL', 'text' ];
		$fields['xm_slideshow']['xm_slideshow-color']          = [ 'Color', 'text' ];
		$fields['xm_slideshow']['xm_slideshow-slide_order']    = [ 'Slide Order', 'select' ];

		$fields['xm_jobs']['xm_jobs-link_text']   = [ 'Link Text', 'text' ];
		$fields['xm_jobs']['xm_jobs-link_url']    = [ 'Link URL', 'text' ];

		$fields['page']['page-heading_color']          = [ 'Heading Color', 'text' ];

		return $fields[$post_type];

	} // get_metabox_fields()

	/**
	 * Calls a metabox file specified in the add_meta_box args.
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @return 	void
	 */
	public function metabox( $post, $params ) {

		if ( ! is_admin() ) { return; }
		if ( 'xm_user_stories' !== $post->post_type ) { return; }

		if ( ! empty( $params['args']['classes'] ) ) {

			$classes = 'repeater ' . $params['args']['classes'];

		}

		include( plugin_dir_path( __FILE__ ) . 'partials/xm-admin-metabox-' . $params['args']['file'] . '.php' );

	} // metabox()

	/**
	 * Calls a metabox file specified in the add_meta_box args.
	 *
	 * @since 	1.2.0
	 * @access 	public
	 * @return 	void
	 */
	public function metabox_slideshow( $post, $params ) {

		if ( ! is_admin() ) { return; }
		if ( 'xm_slideshow' !== $post->post_type ) { return; }

		if ( ! empty( $params['args']['classes'] ) ) {

			$classes = 'repeater ' . $params['args']['classes'];

		}

		include( plugin_dir_path( __FILE__ ) . 'partials/xm-admin-metabox-' . $params['args']['file'] . '.php' );

	} // metabox()

	/**
	 * Calls a metabox file specified in the add_meta_box args.
	 *
	 * @since 	1.3.2
	 * @access 	public
	 * @return 	void
	 */
	public function metabox_jobs( $post, $params ) {

		if ( ! is_admin() ) { return; }
		if ( 'xm_jobs' !== $post->post_type ) { return; }

		if ( ! empty( $params['args']['classes'] ) ) {

			$classes = 'repeater ' . $params['args']['classes'];

		}

		include( plugin_dir_path( __FILE__ ) . 'partials/xm-admin-metabox-' . $params['args']['file'] . '.php' );

	} // metabox()

	/**
	 * Calls a metabox file specified in the add_meta_box args.
	 *
	 * @since 	1.3.4
	 * @access 	public
	 * @return 	void
	 */
	public function metabox_page( $post, $params ) {

		if ( ! is_admin() ) { return; }
		if ( 'page' !== $post->post_type ) { return; }

		if ( ! empty( $params['args']['classes'] ) ) {

			$classes = 'repeater ' . $params['args']['classes'];

		}

		include( plugin_dir_path( __FILE__ ) . 'partials/xm-admin-metabox-' . $params['args']['file'] . '.php' );

	} // metabox()

	/**
	 * Sets the class variable $options
	 */
	public function set_meta() {

		global $post;

		if ( empty( $post ) ) { return; }

		$this->meta = get_post_custom( $post->ID );
// 		wp_die( '<pre>' . print_r( $this->meta ) . '</pre>' );

	} // set_meta()

	/**
	 * Saves metabox data
	 *
	 * Repeater section works like this:
	 *  	Loops through meta fields
	 *  		Loops through submitted data
	 *  		Sanitizes each field into $clean array
	 *   	Gets max of $clean to use in FOR loop
	 *   	FOR loops through $clean, adding each value to $new_value as an array
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @param 	int 		$post_id 		The post ID
	 * @param 	object 		$object 		The post object
	 * @return 	void
	 */
	public function validate_meta( $post_id, $object ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return $post_id; }
		if ( ! current_user_can( 'edit_post', $post_id ) ) { return $post_id; }
		if ( ! in_array( $object->post_type, [ 'xm_slideshow', 'xm_user_stories', 'xm_jobs', 'page' ], true) ) { return $post_id; }

		$nonce_check = $this->check_nonces( $_POST );

		if ( 0 < $nonce_check ) { return $post_id; }

		$metas = $this->get_metabox_fields( $object->post_type );

		foreach ( $metas as $name => $meta ) {

			$new_value = filter_var($_POST[$name], FILTER_SANITIZE_STRING);

			update_post_meta( $post_id, $name, $new_value );

		} // foreach

	} // validate_meta()

} // class
