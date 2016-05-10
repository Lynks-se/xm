<?php
/**
 * Provides the markup for select boxes
 *
 * @link       http://lynks.se
 * @since      1.3.1
 *
 * @package    XM
 * @subpackage XM/admin/partials
 */
if ( ! empty( $atts['label'] ) ) {
	?><label for="<?php echo esc_attr( $atts['id'] ); ?>"><?php esc_html_e( $atts['label'], 'xm' ); ?>: </label><?php
}
?><select
	class="<?php echo esc_attr( $atts['class'] ); ?>"
	id="<?php echo esc_attr( $atts['id'] ); ?>"
	name="<?php echo esc_attr( $atts['name'] ); ?>">
<?php
foreach ( $atts['options'] as $key => $option ) {
	if ( $atts['value'] == $key) {
		$selected = ' selected';
	} else {
		$selected = '';
	}
	?><option value="<?php echo $key; ?>"<?php echo $selected; ?>><?php echo $option; ?></option><?php
}
?>
</select><?php
if ( ! empty( $atts['description'] ) ) {
	?><span class="description"><?php esc_html_e( $atts['description'], 'xm' ); ?></span><?php
}
