<?php
/**
 *
 * PRO Blockquote Shortcode
 * @since 1.0.0
 * @version 1.0.0
 *
 */

function pro_blockquote( $atts, $content = '', $id = '' ) {
	extract( shortcode_atts( array(
		'id'           => '',
		'class'        => '',
		'in_style'     => '',
		'type'         => 'normal',
		'icon'         => '',
		'icon_size'    => '',
		'icon_color'   => '',
		'border_color' => '',
		'cite'         => '',
	), $atts ) );
	$id = ( $id ) ? ' id="' . $id . '"' : '';
	$class = ( $class ) ? ' ' . $class : '';
	$cite = ( $cite ) ? '<cite>' . $cite . '</cite>' : '';
	$icon = ( $icon ) ? ' pro-blockquote-quote-icon' : '';
	$icon_size = ( $icon_size ) ? 'font-size:' . $icon_size . 'px;' : '';
	$icon_color = ( $icon_color ) ? 'color:' . $icon_color . ';' : '';
	$icon_style = ( $icon_size || $icon_color ) ? ' style="' . $icon_size . $icon_color . '"' : '';
	$border_color = ( $border_color ) ? 'border-color:' . $border_color . ';' : '';
	$quote_style = ( $border_color || $in_style ) ? ' style="' . $border_color . $in_style . '"' : '';
	
	// begin output
	$output = '<blockquote' . $id . ' class="pro-blockquote pro-blockquote-' . $type . $icon . $class . '"' . $quote_style . '>';
	$output .= ( $icon ) ? '<div class="pro-blockquote-icon fa fa-quote-left"' . $icon_style . '></div>' : '';
	$output .= ( $icon ) ? '<div class="pro-blockquote-content">' : '';
	$output .= webuild_set_wpautop( $content ) . $cite;
	$output .= ( $icon ) ? '</div>' : '';
	$output .= '</blockquote>';

	// end output
	return $output;
}

add_shortcode( 'pro_blockquote', 'pro_blockquote' );

// check if user is still using old shortcodes
if ( !shortcode_exists( 'webuild_blockquote' ) ) {
    add_shortcode( 'webuild_blockquote', 'pro_blockquote' );
}
