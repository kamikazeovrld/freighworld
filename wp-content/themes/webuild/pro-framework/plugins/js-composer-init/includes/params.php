<?php
/**
 * WPBakery Visual Composer Custom Params
 *
 * @package VPBakeryVisualComposer
 *
 */
// Switcher
// ----------------------------------------------------------------------------------
function vc_pro_on_off( $settings, $value ) {

	$checked = ( $value == 1 ) ? ' switch-active' : '';
	$label = ( isset( $settings['label'] ) ) ? '<span class="pro-text-desc">' . $settings['label'] . '</span>' : '';
	
	$output = '<div class="webuild_field webuild_field_on_off">';
	$output .= '<div class="vc_switch switch' . $checked . '"><span class="switch-label" data-on="ON" data-off="OFF"></span><span class="switch-handle"></span>';
	$output .= '<input type="hidden" name="' . $settings['param_name'] . '" class="wpb_vc_param_value vc_webuild_on_off ' . $settings['param_name'] . ' ' . $settings['type'] . '" value="' . $value . '"/>';
	$output .= '</div>';
	$output .= $label;
	$output .= '</div>';

	return $output;
}

vc_add_shortcode_param( 'vc_pro_on_off', 'vc_pro_on_off' );

// Textfield
// ----------------------------------------------------------------------------------
function vc_pro_textfield( $settings, $value ) {
	$placeholder = ( isset( $settings['placeholder'] ) ) ? ' placeholder="' . $settings['placeholder'] . '"' : '';

	return '<input type="text" name="' . $settings['param_name'] . '" class="wpb_vc_param_value vc_webuild_textfield ' . $settings['param_name'] . ' ' . $settings['type'] . '" value="' . $value . '"' . $placeholder . '/>';
}

vc_add_shortcode_param( 'vc_pro_textfield', 'vc_pro_textfield' );

// Icon
// ----------------------------------------------------------------------------------
function vc_pro_icon( $settings, $value ) {

	$hidden = ( empty( $value ) ) ? ' hidden' : '';
	$icon = ( ! empty( $value ) ) ? ' class="' . webuild_icon_class( $value ) . '"' : '';
	
	$output = '<div class="webuild_field webuild_field_icon">';
	$output .= '<div class="pro-icon-select">';
	$output .= '<span class="icon-preview' . $hidden . '"><span' . $icon . '></span></span>';
	$output .= '<button class="button button-primary icon-add">Add Icon</button>';
	$output .= '<button class="button pro-button-remove icon-remove' . $hidden . '">Remove Icon</button>';
	$output .= '<input type="hidden" name="' . $settings['param_name'] . '" class="wpb_vc_param_value vc_webuild_icon icon-value ' . $settings['param_name'] . ' ' . $settings['type'] . '" value="' . $value . '"/>';
	$output .= '</div>';
	$output .= '</div>';

	return $output;
}
vc_add_shortcode_param( 'vc_pro_icon', 'vc_pro_icon' );

// Image Select
// ----------------------------------------------------------------------------------
function vc_pro_image_select( $settings, $value ) {

	$output = '<ul class="vc_image_select">';
	if ( isset( $settings['options'] ) ) {
		$options = $settings['options'];
		foreach ( $options as $key => $img ) {
			$selected = ( $value == $key ) ? ' class="selected"' : '';
			$output .= '<li data-value="' . $key . '"' . $selected . '><img src="' . $img . '" alt="' . $key . '" /></li>';
		}
	}
	$output .= '</ul>';
	$output .= '<input type="hidden" class="wpb_vc_param_value vc_webuild_image_select ' . $settings['param_name'] . ' ' . $settings['type'] . '" name="' . $settings['param_name'] . '" value="' . $value . '" />';

	return $output;
}
vc_add_shortcode_param( 'vc_pro_image_select', 'vc_pro_image_select' );

// Content
// ----------------------------------------------------------------------------------
function vc_pro_content( $settings, $value ) {
	return $settings['content'] . '<input name="' . $settings['param_name'] . '" class="wpb_vc_param_value ' . $settings['param_name'] . ' ' . $settings['type'] . '_field" type="hidden">';
}
vc_add_shortcode_param( 'vc_pro_content', 'vc_pro_content' );

// Upload
// ----------------------------------------------------------------------------------
function vc_pro_upload( $settings, $value ) {
	if ( isset( $settings['settings'] ) ) {
		extract( $settings['settings'] );
	}
	$return_as = ( isset( $settings['return_id'] ) ) ? 'id' : 'url';
	// set defaults
	$upload_type = ( isset( $upload_type ) ) ? $upload_type : 'image';
	$button_title = ( isset( $button_title ) ) ? $button_title : 'Upload';
	$frame_title = ( isset( $frame_title ) ) ? $frame_title : 'Upload';
	$insert_title = ( isset( $insert_title ) ) ? $insert_title : 'Use Image';
	$input_as = ( isset( $settings['preview'] ) ) ? 'hidden' : 'text';
	$remove_media_class = ( empty( $value ) ) ? ' hidden' : '';
	
	$output = '<div class="webuild_field webuild_field_upload">';
	$output .= '<div class="pro-uploader">';
	// upload media source
	$output .= '<input type="' . $input_as . '" name="' . $settings['param_name'] . '" value="' . $value . '" class="media-attachment wpb_vc_param_value ' . $settings['param_name'] . ' ' . $settings['type'] . '_field"/>';
	if ( isset( $settings['preview'] ) ) {
		$output .= '<div class="pro-upload-preview">';
		// value check
		if ( ! empty( $value ) ) {
			// if value is numeric, use wp_get_attachment_image for thumbnail.
			if ( is_numeric( $value ) ) {
				$output .= '<a href="' . wp_get_attachment_url( $value ) . '" target="_blank">' . wp_get_attachment_image( $value, 'thumbnail' ) . '</a>';
			} else {
				$output .= '<a href="' . $value . '" target="_blank"><img src="' . $value . '" alt="" /></a>';
			}
		}
		$output .= '</div>';
	}
	$output .= '<a href="#" class="button pro-add-media" data-frame-title="' . $frame_title . '" data-upload-type="' . $upload_type . '" data-return="' . $return_as . '" data-insert-title="' . $insert_title . '">' . $button_title . '</a>';
	$output .= '&nbsp;';
	if ( isset( $settings['preview'] ) ) {
		$output .= '<a href="#" class"button pro-button-remove' . $remove_media_class . '"> Remove </a>';
	}
	$output .= '</div>';
	$output .= '</div>';

	return $output;
}
vc_add_shortcode_param( 'vc_pro_upload', 'vc_pro_upload' );

// Exploded Textarea
// ----------------------------------------------------------------------------------
function vc_pro_exploded_textarea( $settings, $value ) {
	$value = str_replace( "~", "\n", $value );
	$placeholder = ( isset( $settings['placeholder'] ) ) ? ' placeholder="' . $settings['placeholder'] . '"' : '';

	return '<textarea name="' . $settings['param_name'] . '" rows="10" class="wpb_vc_param_value wpb-vc-pro-exploded-textarea ' . $settings['param_name'] . ' ' . $settings['type'] . '"' . $placeholder . '>' . $value . '</textarea>';
}
vc_add_shortcode_param( 'vc_pro_exploded_textarea', 'vc_pro_exploded_textarea' );

// Style Textarea
// ----------------------------------------------------------------------------------
function vc_pro_style_textarea( $settings, $value ) {
	$placeholder = ( isset( $settings['placeholder'] ) ) ? ' placeholder="' . $settings['placeholder'] . '"' : '';

	return '<textarea name="' . $settings['param_name'] . '" class="wpb_vc_param_value wpb-vc-pro-style-textarea ' . $settings['param_name'] . ' ' . $settings['type'] . '"' . $placeholder . '>' . $value . '</textarea>';
}
vc_add_shortcode_param( 'vc_pro_style_textarea', 'vc_pro_style_textarea' );

// Shortcode Textarea
// ----------------------------------------------------------------------------------
function vc_pro_shortcode_textarea( $settings, $value ) {
	$placeholder = ( isset( $settings['placeholder'] ) ) ? ' placeholder="' . $settings['placeholder'] . '"' : '';
	$output = '<p><button class="button button-primary shortcode-button" data-target="shortcode-textarea"><span class="dashicons dashicons-menu"></span> Quick Shortcode</button></p>';
	$output .= '<textarea id="shortcode-textarea" name="' . $settings['param_name'] . '" class="wpb_vc_param_value wpb-vc-pro-shortcode-textarea ' . $settings['param_name'] . ' ' . $settings['type'] . '"' . $placeholder . '>' . $value . '</textarea>';

	return $output;
}
vc_add_shortcode_param( 'vc_pro_shortcode_textarea', 'vc_pro_shortcode_textarea' );

// Chosen
// ----------------------------------------------------------------------------------
function vc_pro_chosen( $settings, $value ) {
	$css_option = vc_get_dropdown_option( $settings, $value );
	$value = explode( ',', $value );
	// begin output
	$output = '<select name="' . $settings['param_name'] . '" data-placeholder="' . $settings['placeholder'] . '" multiple="multiple" class="wpb_vc_param_value wpb_chosen chosen wpb-input wpb-pro-select ' . $settings['param_name'] . ' ' . $settings['type'] . ' ' . $css_option . '" data-option="' . $css_option . '">';
	foreach ( $settings['value'] as $text_val => $val ) {
		$selected = ( in_array( $val, $value ) ) ? ' selected="selected"' : '';
		$output .= '<option value="' . $val . '"' . $selected . '>' . htmlspecialchars( $text_val ) . '</option>';
	}
	$output .= '<select>';

	// end output
	return $output;
}
vc_add_shortcode_param( 'vc_pro_chosen', 'vc_pro_chosen' );