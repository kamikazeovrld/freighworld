<?php
/**
 *
 * PRO Icon
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function pro_icon( $atts, $content = '', $id = '' ) {
	extract( shortcode_atts( array(
		'id'             => '',
		'class'          => '',
		'in_style'       => '',
		'icon'           => '',
		'type'           => '',
		'shape'          => '',
		'size'           => '',
		'border'         => '',
		'border_width'   => '',
		'border_style'   => '',
		'background'     => '',
		'color'          => 'accent',
		'holder'         => 'span',
		'custom_size'    => '',
		'custom_spacing' => '',
	), $atts ) );
	// helpers
	$id = ( $id ) ? ' id="' . $id . '"' : '';
	$class = ( $class ) ? ' ' . $class : '';
	$bordered = ( $type == 'bordered' ) ? true : false;
	$type_class = ( $type && $type != 'nocolor' ) ? ' pro-icon-' . $type : '';
	$shape_class = ( $shape ) ? ' pro-icon-' . $shape : '';
	$size_class = ( $size ) ? ' pro-icon-' . $size : '';
	// customize
	$custom_css = '';
	$outer_style = '';
	$custom_css .= ( $border_width ) ? 'border-width:' . $border_width . 'px;' : '';
	$custom_css .= ( $border_style ) ? 'border-style:' . $border_style . ';' : '';
	if ( $size == 'custom' && ( $custom_size || $custom_spacing ) ) {
		$custom_css .= ( $custom_size ) ? 'font-size:' . $custom_size . 'px;' : '';
		$custom_css .= ( $custom_spacing ) ? 'width:' . $custom_spacing . 'px;height:' . $custom_spacing . 'px;' : '';
	}
	if ( $color != 'accent' || $border || $background ) {
		$custom_css .= ( $color != 'accent' ) ? 'color:' . $color . ';' : '';
		$custom_css .= ( $background ) ? 'background-color:' . $background . ';' : '';
		$custom_css .= ( $border && ! $bordered ) ? 'border-color:' . $border . ';' : '';
		$outer_style = ( $border ) ? ' style="border-color:' . $border . ';"' : '';
		$color = 'custom';
	}
	// for clean icon
	$color = ( $type == 'nocolor' ) ? 'default' : $color;
	$in_style = ( ! empty( $custom_css ) || $in_style ) ? ' style="' . $custom_css . $in_style . '"' : '';
	// begin output
	$output = '';
	$output .= ( $bordered ) ? '<' . $holder . ' class="pro-icon-outer pro-icon-' . $color . $shape_class . '"' . $outer_style . '>' : '';
	$output .= '<' . $holder . $id . ' class="' . webuild_icon_class( $icon ) . ' pro-icon pro-icon-' . $color . $type_class . $shape_class . $size_class . $class . '"' . $in_style . '></' . $holder . '>';
	$output .= ( $bordered ) ? '</' . $holder . '>' : '';

	// end output
	return $output;
}

add_shortcode( 'pro_icon', 'pro_icon' );

// check if user is still using old shortcodes
if ( !shortcode_exists( 'webuild_icon' ) ) {
    add_shortcode( 'webuild_icon', 'pro_icon' );
}
