<?php
/**
 * Provide the view for a metabox
 *
 * @link 		http://lynks.se
 * @since 		1.0.0
 *
 * @package 	XM
 * @subpackage 	XM/admin/partials
 */
wp_nonce_field( $this->plugin_name, 'xm_meta_nonce' );

$atts = [
	'description' => '',
	'id'          => 'xm_story-primary_heading',
	'label'       => 'Primary Heading',
	'name'        => 'xm_story-primary_heading',
	'value'       => '',
	'class'       => 'widefat',
	'placeholder' => '',
];

if (isset($this->meta[$atts['id']][0])) {
	$atts['value'] = $this->meta[$atts['id']][0];
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

echo '<p>';
include( plugin_dir_path( __FILE__ ) . strtolower($this->plugin_name) . '-admin-field-text.php' );
echo '</p>';


$atts = [
	'description' => '',
	'id'          => 'xm_story-button_label',
	'label'       => 'Button Label',
	'name'        => 'xm_story-button_label',
	'value'       => '',
	'class'       => 'widefat',
	'placeholder' => '',
];

if (isset($this->meta[$atts['id']][0])) {
	$atts['value'] = $this->meta[$atts['id']][0];
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

echo '<p>';
include( plugin_dir_path( __FILE__ ) . strtolower($this->plugin_name) . '-admin-field-text.php' );
echo '</p>';
