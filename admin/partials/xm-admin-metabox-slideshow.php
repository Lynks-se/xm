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

$atts = [
	'description' => 'Defines the order of this slide in the slide show. If two or more slides are at the same order then their publication dates will be used to sort them.',
	'id'          => 'xm_slideshow-slide_order',
	'label'       => 'Slide Order',
	'name'        => 'xm_slideshow-slide_order',
	'class'       => 'widefat',
	'type'        => 'select',
	'options'     => [
		-10 => __( "As early as possible (-10)", 'xm' ),
		-9  => __( "As early as possible (-9)", 'xm' ),
		-8  => __( "As early as possible (-8)", 'xm' ),
		-7  => __( "Early (-7)", 'xm' ),
		-6  => __( "Early (-6)", 'xm' ),
		-5  => __( "Early (-5)", 'xm' ),
		-4  => __( "Early (-4)", 'xm' ),
		-3  => __( "Earlier than neutral (-3)", 'xm' ),
		-2  => __( "Earlier than neutral (-2)", 'xm' ),
		-1  => __( "Earlier than neutral (-1)", 'xm' ),
		0   => __( "Neutral", 'xm' ),
		1   => __( "After neutral (1)", 'xm' ),
		2   => __( "After neutral (2)", 'xm' ),
		3   => __( "After neutral (3)", 'xm' ),
		4   => __( "Late (4)", 'xm' ),
		5   => __( "Late (5)", 'xm' ),
		6   => __( "Late (6)", 'xm' ),
		7   => __( "Late (7)", 'xm' ),
		8   => __( "As late as possible (8)", 'xm' ),
		9   => __( "As late as possible (9)", 'xm' ),
		10  => __( "As late as possible (10)", 'xm' ),
	],
];

if (isset($this->meta[$atts['id']][0])) {
	$atts['value'] = $this->meta[$atts['id']][0];
}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

echo '<p>';
include( plugin_dir_path( __FILE__ ) . strtolower($this->plugin_name) . '-admin-field-select.php' );
echo '</p>';
