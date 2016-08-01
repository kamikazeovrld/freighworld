<?php
/**
 *
 * PRO Word Rotator
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function webuild_rotating( $atts, $content = '', $id = '' ) {
	$a = shortcode_atts( array(
		'words'          => '',
		'delay'          => '',
		'color'          => '',
		'background'     => '',
		'letter-spacing' => '',
		'font-weight'    => '',
		'delay'          => '2000',
		'padding-top'    => '0px',
		'padding-bottom' => '0px',
		'padding-left'   => '0px',
		'padding-right'  => '0px'
		// ...etc
	), $atts );
	// set the style
	$style = '';
	$style .= 'padding-top:' . $a['padding-top'] . ';';
	$style .= 'padding-bottom:' . $a['padding-bottom'] . ';';
	$style .= 'padding-left:' . $a['padding-left'] . ';';
	$style .= 'padding-right:' . $a['padding-right'] . ';';
	if ( $a['color'] ) {
		$style .= 'color:' . $a['color'] . ';';
	}
	if ( $a['background'] ) {
		$style .= 'background-color:' . $a['background'] . ';';
	}
	if ( $a['letter-spacing'] ) {
		$style .= 'letter-spacing:' . $a['letter-spacing'] . ';';
	}
	if ( $a['font-weight'] ) {
		$style .= 'font-weight:' . $a['font-weight'] . ';';
	}
	$output = '';
	$output .= '<span class="pro-word-rotator word-rotate" data-delay="' . $a['delay'] . '"style="' . $style . '"><span class="word-rotate-items">';
	if ( $a['words'] ) {
		$rotating_words = explode( ",", $a['words'] );
		foreach ( $rotating_words as $word ) {
			$output .= '<span>' . $word . '</span>';
		}
	}
	$output .= '</span></span>';

	return $output;
}

add_shortcode( 'webuild_rotating', 'webuild_rotating' );