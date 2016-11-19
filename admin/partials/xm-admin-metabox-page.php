<?php
/**
 * Provide the view for a metabox
 *
 * @link 		http://lynks.se
 * @since 		1.3.4
 *
 * @package 	XM
 * @subpackage 	XM/admin/partials
 */
wp_nonce_field( $this->plugin_name, 'xm_meta_nonce' );

$atts = [
	'description' => '',
	'id'          => 'page-heading_color',
	'label'       => 'Heading Color',
	'name'        => 'page-heading_color',
	'value'       => '',
	'class'       => 'widefat',
	'placeholder' => '#e41021',
	'type'        => 'color',
];

if (isset($this->meta[$atts['id']][0])) {
	$atts['value'] = $this->meta[$atts['id']][0];
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

echo '<p>';
include( plugin_dir_path( __FILE__ ) . strtolower($this->plugin_name) . '-admin-field-color.php' );
echo '</p>';
