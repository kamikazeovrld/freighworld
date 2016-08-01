<?php
/**
 *
 * PRO Table
 * @since 1.0.0
 * @version 1.0.0
 *
 */

function pro_table( $atts, $content = '', $id = '' ) {
	extract( shortcode_atts( array(
		'id'         => '',
		'class'      => '',
		'in_style'   => '',
		'striped'    => '',
		'bordered'   => '',
		'hover'      => '',
		'condensed'  => '',
		'responsive' => '',
	), $atts ) );
	$id = ( $id ) ? ' id="' . $id . '"' : '';
	$class = ( $class ) ? ' ' . $class : '';
	$in_style = ( $in_style ) ? ' style="' . $in_style . '"' : '';
	$striped = ( $striped ) ? ' pro-table-striped' : '';
	$bordered = ( $bordered ) ? ' pro-table-bordered' : '';
	$hover = ( $hover ) ? ' pro-table-hover' : '';
	$condensed = ( $condensed ) ? ' pro-table-condensed' : '';
	$content = str_replace( '<table', '<table' . $id . ' class="pro-table' . $striped . $bordered . $hover . $condensed . $class . '"' . $in_style, $content );
	// begin output
	$output = '';
	$output .= ( $responsive ) ? '<div class="pro-table-responsive">' : '';
	$output .= webuild_set_wpautop( $content );
	$output .= ( $responsive ) ? '</div>' : '';

	// end output
	return $output;
}

add_shortcode( 'pro_table', 'pro_table' );

// check if user is still using old shortcodes
if ( !shortcode_exists( 'webuild_table' ) ) {
    add_shortcode( 'webuild_table', 'pro_table' );
} 
