<?php
/**
 *
 * PRO Call to Action
 * @since 1.0.0
 * @version 1.0.0
 *
 */

function pro_cta( $atts, $content = '', $id = '' ) {
	global $pro_cta_blocks;
	$pro_cta_blocks = array();
	extract( shortcode_atts( array(
		'id'            => '',
		'class'         => '',
		'in_style'      => '',
		'type'          => 'outlined',
		'top'           => '',
		'right'         => '',
		'bottom'        => '',
		'left'          => '',
		'bgcolor'       => '',
		'text_color'    => '',
		'border_color'  => '',
		'border_hcolor' => '',
	), $atts ) );
	do_shortcode( $content );
	// is not empty clients
	if ( empty( $pro_cta_blocks ) ) {
		return;
	}
	$id = ( $id ) ? ' id="' . $id . '"' : '';
	$class = ( $class ) ? ' ' . $class : '';
	$border_top = ( $top ) ? ' pro-cta-top' : '';
	$border_right = ( $right ) ? ' pro-cta-right' : '';
	$border_bottom = ( $bottom ) ? ' pro-cta-bottom' : '';
	$border_left = ( $left ) ? ' pro-cta-left' : '';
	$box_type = ( $type == 'bgcolor' ) ? ' pro-cta-bgcolor' : '';
	$text_color = ( $text_color ) ? 'color:' . $text_color . ';' : '';
	$border_color = ( $border_color ) ? 'border-color:' . $border_color . ';' : '';
	$bgcolor = ( $bgcolor ) ? 'background-color:' . $bgcolor . ';' : '';
	$el_style = ( $text_color || $border_color || $bgcolor || $in_style ) ? ' style="' . $text_color . $border_color . $bgcolor . $in_style . '"' : '';
	// highlight bordercolor
	$border_hcolor = ( $border_hcolor ) ? ' style="border-color:' . $border_hcolor . ';"' : '';
	// begin output
	$output = '';
	$output .= '<div' . $id . ' class="pro-cta' . $box_type . $class . '"' . $el_style . '>';
	foreach ( $pro_cta_blocks as $key => $block ) {
		$output .= ( ! empty( $block['content'] ) ) ? '<div class="pro-cta-block">' . do_shortcode( $block['content'] ) . '</div>' : '';
	}
	$output .= ( $type == 'outlined' ) ? '<div class="pro-cta-outlined' . $border_top . $border_right . $border_bottom . $border_left . '"' . $border_hcolor . '></div>' : '';
	$output .= '</div>';

	// end output
	return $output;
}

add_shortcode( 'pro_cta', 'pro_cta' );

// check if user is still using old shortcodes
if ( !shortcode_exists( 'webuild_cta' ) ) {
    add_shortcode( 'webuild_cta', 'pro_cta' );
}

/**
 *
 * PRO Call to Action Block
 * @version 1.0.0
 * @since 1.0.0
 *
 */
function pro_cta_block( $atts, $content = '', $id = '' ) {
	global $pro_cta_blocks;
	$pro_cta_blocks[] = array( 'atts' => $atts, 'content' => $content );

	return;
}

add_shortcode( 'pro_cta_block', 'pro_cta_block' );

// check if user is still using old shortcodes
if ( !shortcode_exists( 'webuild_cta_block' ) ) {
    add_shortcode( 'webuild_cta_block', 'pro_cta_block' );
}