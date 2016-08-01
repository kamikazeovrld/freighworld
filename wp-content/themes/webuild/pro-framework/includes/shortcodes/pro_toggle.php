<?php
/**
 *
 * PRO Toggle
 * @since 1.0.0
 * @version 1.0.0
 *
 */

function pro_toggle( $atts, $content = '', $id = '' ) {
	extract( shortcode_atts( array(
		'id'           => '',
		'class'        => '',
		'title'        => '',
		'icon'         => '',
		'no_icon'      => '',
		'icon_color'   => '',
		'title_color'  => '',
		'border_color' => '',
		'open'         => '',
	), $atts ) );
	$id = ( $id ) ? ' id="' . $id . '"' : '';
	$class = ( $class ) ? ' ' . $class : '';
	$open = ( $open === 'true' ) ? ' selected' : '';
	$display = ( $open ) ? ' style="display:block;"' : '';
	$el_style = ( $border_color ) ? ' style="border-color:' . $border_color . ';"' : '';
	$icon_style = ( $icon_color ) ? ' style="color:' . $icon_color . ';"' : '';
	$title = ( $title_color ) ? '<span style="color:' . $title_color . ';">' . $title . '</span>' : $title;
	$icon = ( $icon ) ? webuild_icon_class( $icon ) : 'pro-in fa pro-anim-icon';
	$icon = ( ! $no_icon ) ? '<i class="' . $icon . '"' . $icon_style . '></i>' : '';
	// begin output
	$output = '<div' . $id . ' class="pro-toggle"' . $el_style . '>';
	$output .= '<h4 class="pro-toggle-title' . $open . '">' . $icon . $title . '</h4>';
	$output .= '<div class="pro-toggle-content"' . $display . '>';
	$output .= webuild_set_wpautop( $content );
	$output .= '</div>';
	$output .= '</div>';

	// end output
	return $output;
}

add_shortcode( 'vc_toggle', 'pro_toggle' );

// check if user is still using old shortcodes
if ( !shortcode_exists( 'vc_toggle' ) ) {
    add_shortcode( 'vc_toggle', 'pro_toggle' );
} 
