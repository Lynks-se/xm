/* file: xm-admin.js */
(function( $ ) {
	'use strict';

	/**
	 * Adds a shortcode button to the WordPress TinyMCE toolbar.
	 */
	tinymce.PluginManager.add('xm_mce_shortcodes_button', function( editor, url ) {
		editor.addButton( 'xm_mce_shortcodes_button', {
			text: 'XM Section',
			title: 'Insert a coloured section via a shortcode',
			icon: false,
			onclick: function() {
				editor.windowManager.open( {
					title: 'Insert Coloured Section',
					body: [
						{
							type: 'colorpicker',
							name: 'color',
							label: 'Text Colour',
							value: '#ffffff'
						},
						{
							type: 'colorpicker',
							name: 'background_color',
							label: 'Background Colour',
							value: '#333333',
						},
					],
					onsubmit: function( e ) {
						editor.focus();
						editor.selection.setContent( '[xm_section color="' + e.data.color + '" background_color="' + e.data.background_color + '"]' + editor.selection.getContent() + '[/xm_section]' );
					}
				});
			}
		});
	});

})( jQuery );
