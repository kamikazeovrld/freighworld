<?php
/**
 *
 * PRO Alert
 * @since 1.0.0
 * @version 1.0.0
 *
 */

function pro_alert( $atts, $content = '', $id = '' ) {
	extract( shortcode_atts( array(
		'id'                 => '',
		'class'              => '',
		'in_style'           => '',
		'type'               => 'success',
		'icon'               => '',
		'outlined'           => '',
		'close'              => '',
		'bgcolor'            => '',
		'border_color'       => '',
		'text_color'         => '',
		'animation'          => '',
		'animation_delay'    => '',
		'animation_duration' => '',
	), $atts ) );
	$id = ( $id ) ? ' id="' . $id . '"' : '';
	$class = ( $class ) ? ' ' . $class : '';
	$icon = ( $icon ) ? ' <i class="' . webuild_icon_class( $icon ) . ' icon-vertically"></i>' : '';
	$outlined = ( $outlined ) ? ' pro-alert-outlined' : '';
	$close = ( $close ) ? ' pro-alert-dismissable' : '';
	$bgcolor = ( $bgcolor ) ? 'background-color:' . $bgcolor . ';' : '';
	$border_color = ( $border_color ) ? 'border-color:' . $border_color . ';' : '';
	$text_color = ( $text_color ) ? 'color:' . $text_color . ';' : '';
	$el_style = ( $bgcolor || $border_color || $text_color || $in_style ) ? ' style="' . $bgcolor . $border_color . $text_color . $in_style . '"' : '';
	// element animation
	$animation = ( $animation ) ? ' pro-animation ' . $animation : '';
	$animation_data = ( $animation && $animation_delay ) ? ' data-delay="' . $animation_delay . '"' : '';
	$animation_data = ( $animation && $animation_duration ) ? $animation_data . ' data-duration="' . $animation_duration . '"' : $animation_data;
	// begin output
	$output = '<div' . $id . ' class="pro-alert pro-alert-' . $type . $close . $outlined . $animation . $class . '"' . $animation_data . $el_style . '>';
	$output .= ( $close ) ? '<div class="pro-alert-close fa fa-times"></div>' : '';
	$output .= ( $close ) ? '<div class="pro-alert-content">' : '';
	$output .= webuild_set_wpautop( $icon . $content );
	$output .= ( $close ) ? '</div>' : '';
	$output .= '</div>';

	// end output
	return $output;
}

add_shortcode( 'pro_alert', 'pro_alert' );

// check if user is still using old shortcodes
if ( !shortcode_exists( 'webuild_alert' ) ) {
    add_shortcode( 'webuild_alert', 'pro_alert' );
}

