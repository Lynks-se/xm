<?php
/**
 * Provide the view for a metabox
 *
 * @link 		http://lynks.se
 * @since 		1.2.0
 *
 * @package 	XM
 * @subpackage 	XM/admin/partials
 */
wp_nonce_field( $this->plugin_name, 'xm_meta_nonce' );

$atts = [
	'description' => '',
	'id'          => 'xm_slideshow-second_header',
	'label'       => 'Second Header',
	'name'        => 'xm_slideshow-second_header',
	'value'       => '',
	'class'       => 'widefat',
	'placeholder' => '',
	'type'        => 'text',
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
	'id'          => 'xm_slideshow-link_text',
	'label'       => 'Link Text',
	'name'        => 'xm_slideshow-link_text',
	'value'       => '',
	'class'       => 'widefat',
	'placeholder' => '',
	'type'        => 'text',
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
	'id'          => 'xm_slideshow-link_url',
	'label'       => 'Link URL',
	'name'        => 'xm_slideshow-link_url',
	'value'       => '',
	'class'       => 'widefat',
	'placeholder' => '',
	'type'        => 'url',
];

if (isset($this->meta[$atts['id']][0])) {
	$atts['value'] = $this->meta[$atts['id']][0];
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

echo '<p>';
include( plugin_dir_path( __FILE__ ) . strtolower($this->plugin_name) . '-admin-field-url.php' );
echo '</p>';
