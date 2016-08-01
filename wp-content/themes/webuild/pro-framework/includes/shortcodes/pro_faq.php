<?php
/**
 *
 * PRO FAQ
 * @since 1.0.0
 * @version 1.0.0
 *
 */

function pro_faq( $atts, $content = '', $id = '' ) {
	global $pro_faqs;
	$pro_faqs = array();
	extract( shortcode_atts( array(
		'id'       => '',
		'class'    => '',
		'in_style' => '',
	), $atts ) );
	do_shortcode( $content );
	// is not empty clients
	if ( empty( $pro_faqs ) ) {
		return;
	}
	$id = ( $id ) ? ' id="' . $id . '"' : '';
	$class = ( $class ) ? ' ' . $class : '';
	$in_style = ( $in_style ) ? ' style="' . $in_style . '"' : '';
	// begin output
	$output = '<div' . $id . ' class="pro-faq' . $class . '"' . $in_style . '>';
	// filter
	$output .= '<div class="pro-faq-filter">';
	$output .= '<a href="#" data-filter="*" class="active">' . esc_html__( 'All', THEME_NAME ) . '</a>';
	foreach ( $pro_faqs as $key => $faq ) {
		$output .= '<a href="#" data-filter=".' . sanitize_title( $faq['atts']['title'] ) . '">' . $faq['atts']['title'] . '</a>';
	}
	$output .= '</div>';
	// list
	$output .= '<div class="pro-faq-isotope">';
	foreach ( $pro_faqs as $key => $faq ) {
		$output .= '<div class="pro-faq-item ' . sanitize_title( $faq['atts']['title'] ) . '">';
		$output .= do_shortcode( $faq['content'] );
		$output .= '</div>';
	}
	$output .= '</div>';
	$output .= '</div>';

	// end output
	return $output;
}

add_shortcode( 'pro_faq', 'pro_faq' );

// check if user is still using old shortcodes
if ( !shortcode_exists( 'webuild_faq' ) ) {
    add_shortcode( 'webuild_faq', 'pro_faq' );
}

/**
 *
 * PRO Tab
 * @version 1.0.0
 * @since 1.0.0
 *
 */

function pro_faq_block( $atts, $content = '', $id = '' ) {
	global $pro_faqs;
	$pro_faqs[] = array( 'atts' => $atts, 'content' => $content );

	return;
}

add_shortcode( 'pro_faq_block', 'pro_faq_block' );

// check if user is still using old shortcodes
if ( !shortcode_exists( 'webuild_faq_block' ) ) {
    add_shortcode( 'webuild_faq_block', 'pro_faq_block' );
}