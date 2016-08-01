<?php
/**
 *
 * PRO ToolTip
 * @since 1.0.0
 * @version 1.0.0
 *
 */

function pro_tooltip( $atts, $content = '', $id = '' ) {
	extract( shortcode_atts( array(
		'selector'  => '',
		'placement' => '',
		'trigger'   => '',
	), $atts ) );
	$placement = ( $placement ) ? ' data-placement="' . $placement . '"' : '';
	$trigger = ( $trigger ) ? ' data-trigger="' . $trigger . '"' : '';
	// begin output
	$output = '<div class="pro-tooltip-trigger pro-hide" data-selector=".' . $selector . '"' . $placement . $trigger . '>';
	$output .= do_shortcode( $content );
	$output .= '</div>';

	// end output
	return $output;
}

add_shortcode( 'pro_tooltip', 'pro_tooltip' );

// check if user is still using old shortcodes
if ( !shortcode_exists( 'webuild_tooltip' ) ) {
    add_shortcode( 'webuild_tooltip', 'pro_tooltip' );
} 
