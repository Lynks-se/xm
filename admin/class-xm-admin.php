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
class XM_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/xm-admin.css', [], $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/xm-admin.js', [ 'jquery' ], $this->version, false );

	}

	/**
	 * Enables Excerpt field on the Pages content type
	 *
	 * @since 	1.0.0
	 * @access 	public
	 * @uses 	add_post_type_support()
	 */
	public static function add_excerpts_to_pages() {
		add_post_type_support( 'page', 'excerpt' );
	}

	/**
	 * Creates custom post types
	 *
	 * @since   1.0.0
	 * @uses    register_post_type()
	 * @access  public
	 */
	public static function xm_custom_post_types() {

		$xm_user_stories_labels = [
			'name'                  => _x( 'User Stories', 'Post Type General Name', 'xm' ),
			'singular_name'         => _x( 'User Story', 'Post Type Singular Name', 'xm' ),
			'menu_name'             => __( 'User Stories', 'xm' ),
			'name_admin_bar'        => __( 'User Story', 'xm' ),
			'archives'              => __( 'Story Archives', 'xm' ),
			'parent_item_colon'     => __( 'Parent Item:', 'xm' ),
			'all_items'             => __( 'All User Stories', 'xm' ),
			'add_new_item'          => __( 'Add New User Story', 'xm' ),
			'add_new'               => __( 'Add New', 'xm' ),
			'new_item'              => __( 'New Story', 'xm' ),
			'edit_item'             => __( 'Edit Story', 'xm' ),
			'update_item'           => __( 'Update Story', 'xm' ),
			'view_item'             => __( 'View Story', 'xm' ),
			'search_items'          => __( 'Search Story', 'xm' ),
			'not_found'             => __( 'Not found', 'xm' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'xm' ),
			'featured_image'        => __( 'Featured Image', 'xm' ),
			'set_featured_image'    => __( 'Set featured image', 'xm' ),
			'remove_featured_image' => __( 'Remove featured image', 'xm' ),
			'use_featured_image'    => __( 'Use as featured image', 'xm' ),
			'insert_into_item'      => __( 'Insert into story', 'xm' ),
			'uploaded_to_this_item' => __( 'Uploaded to this story', 'xm' ),
			'items_list'            => __( 'Story list', 'xm' ),
			'items_list_navigation' => __( 'Story list navigation', 'xm' ),
			'filter_items_list'     => __( 'Filter story list', 'xm' ),
		];
		$xm_user_stories_args = [
			'label'                 => __( 'User Story', 'xm' ),
			'labels'                => $xm_user_stories_labels,
			'supports'              => [ 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ],
			'taxonomies'            => [],
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 24,
			'menu_icon'             => 'dashicons-testimonial',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		];

		$xm_jobs_labels = [
			'name'                  => _x( 'Jobs', 'Post Type General Name', 'xm' ),
			'singular_name'         => _x( 'Job', 'Post Type Singular Name', 'xm' ),
			'menu_name'             => __( 'Jobs', 'xm' ),
			'name_admin_bar'        => __( 'Job', 'xm' ),
			'archives'              => __( 'Job Archives', 'xm' ),
			'parent_item_colon'     => __( 'Parent Item:', 'xm' ),
			'all_items'             => __( 'All Jobs', 'xm' ),
			'add_new_item'          => __( 'Add New Job', 'xm' ),
			'add_new'               => __( 'Add New', 'xm' ),
			'new_item'              => __( 'New Job', 'xm' ),
			'edit_item'             => __( 'Edit Job', 'xm' ),
			'update_item'           => __( 'Update Job', 'xm' ),
			'view_item'             => __( 'View Job', 'xm' ),
			'search_items'          => __( 'Search Job', 'xm' ),
			'not_found'             => __( 'Not found', 'xm' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'xm' ),
			'featured_image'        => __( 'Featured Image', 'xm' ),
			'set_featured_image'    => __( 'Set featured image', 'xm' ),
			'remove_featured_image' => __( 'Remove featured image', 'xm' ),
			'use_featured_image'    => __( 'Use as featured image', 'xm' ),
			'insert_into_item'      => __( 'Insert into job', 'xm' ),
			'uploaded_to_this_item' => __( 'Uploaded to this job', 'xm' ),
			'items_list'            => __( 'Job list', 'xm' ),
			'items_list_navigation' => __( 'Job list navigation', 'xm' ),
			'filter_items_list'     => __( 'Filter job list', 'xm' ),
		];
		$xm_jobs_args = [
			'label'                 => __( 'Job', 'xm' ),
			'labels'                => $xm_jobs_labels,
			'supports'              => [ 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ],
			'taxonomies'            => [],
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 26,
			'menu_icon'             => 'dashicons-businessman',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		];

		$xm_slideshow_labels = [
			'name'                  => _x( 'Slides', 'Post Type General Name', 'xm' ),
			'singular_name'         => _x( 'Slide', 'Post Type Singular Name', 'xm' ),
			'menu_name'             => __( 'Slides', 'xm' ),
			'name_admin_bar'        => __( 'Slide', 'xm' ),
			'archives'              => __( 'Slide Archives', 'xm' ),
			'parent_item_colon'     => __( 'Parent Item:', 'xm' ),
			'all_items'             => __( 'All Slides', 'xm' ),
			'add_new_item'          => __( 'Add New Slide', 'xm' ),
			'add_new'               => __( 'Add New', 'xm' ),
			'new_item'              => __( 'New Slide', 'xm' ),
			'edit_item'             => __( 'Edit Slide', 'xm' ),
			'update_item'           => __( 'Update Slide', 'xm' ),
			'view_item'             => __( 'View Slide', 'xm' ),
			'search_items'          => __( 'Search Slide', 'xm' ),
			'not_found'             => __( 'Not found', 'xm' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'xm' ),
			'featured_image'        => __( 'Featured Image', 'xm' ),
			'set_featured_image'    => __( 'Set featured image', 'xm' ),
			'remove_featured_image' => __( 'Remove featured image', 'xm' ),
			'use_featured_image'    => __( 'Use as featured image', 'xm' ),
			'insert_into_item'      => __( 'Insert into slide', 'xm' ),
			'uploaded_to_this_item' => __( 'Uploaded to this slide', 'xm' ),
			'items_list'            => __( 'Slide list', 'xm' ),
			'items_list_navigation' => __( 'Slide list navigation', 'xm' ),
			'filter_items_list'     => __( 'Filter slide list', 'xm' ),
		];
		$xm_slideshow_args = [
			'label'                 => __( 'Slide', 'xm' ),
			'labels'                => $xm_slideshow_labels,
			'supports'              => [ 'title', 'excerpt', 'thumbnail', 'revisions' ],
			'taxonomies'            => [],
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 28,
			'menu_icon'             => 'dashicons-slides',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
		];

		register_post_type( 'xm_user_stories', $xm_user_stories_args );
		register_post_type( 'xm_jobs', $xm_jobs_args );
		register_post_type( 'xm_slideshow', $xm_slideshow_args );

	} // new_custom_post_type_story()

	/**
	 * Add formats to TinyMCE
	 *
	 * @since   1.0.0
	 * @param   array    $init_array       TinyMCE configuration.
	 * @access  public
	 */
	public static function xm_insert_formats( $init_array ) {

		if ( ! is_array( $init_array ) ) {
			$init_array = [];
		}

		// Each array child is a format with it's own settings
		$style_formats = [
			'title' => __( 'XM Custom Styles', 'xm' ),
			'items' => [
				[
					'selector'  => 'p',
					'title'     => 'Ingress',
					'classes'   => 'ingress',
					'wrapper'   => true,
				],
			],
		];

		// Merge old & new styles
		$init_array['style_formats_merge'] = true;

		// Insert the array, JSON ENCODED, into 'style_formats'
		$init_array['style_formats'] = json_encode( $style_formats );

		return $init_array;

	}

	/**
	 * Add formats to TinyMCE
	 *
	 * @since   1.0.0
	 * @param   array    $buttons       TinyMCE buttons.
	 * @access  public
	 */
	public static function xm_style_select( $buttons ) {

		array_push( $buttons, 'styleselect' );

		return $buttons;

	}

	/**
	 * Declare script for new button.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function xm_add_tinymce_plugin( $plugin_array ) {

		$plugin_array['xm_mce_shortcodes_button'] = plugin_dir_url( __FILE__ ) .'js/xm-admin.js';

		return $plugin_array;

	}

	/**
	 * Declare script for new button.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function xm_register_mce_button( $buttons ) {

		array_push( $buttons, 'xm_mce_shortcodes_button' );

		return $buttons;

	}

}
