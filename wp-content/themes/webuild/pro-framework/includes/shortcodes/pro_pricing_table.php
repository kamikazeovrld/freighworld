<?php
/**
 *
 * PRO Pricing Table
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function pro_pricing_table( $atts, $content = '', $id = '' ) {
	global $webuild_pricing_columns;
	extract( shortcode_atts( array(
		'id'       => '',
		'class'    => '',
		'in_style' => '',
	), $atts ) );
	$id = ( $id ) ? ' id="' . $id . '"' : '';
	$class = ( $class ) ? ' ' . $class : '';
	$in_style = ( $in_style ) ? ' style="' . $in_style . '"' : '';
	$regex = webuild_get_shortcode_regex( 'pro_pricing_column' );
	// count columns
	preg_match_all( '/' . $regex . '/', $content, $count_list );
	$webuild_pricing_columns = count( $count_list[0] );
	// begin output
	$output = '<div' . $id . ' class="pro-pricing-table' . $class . '"' . $in_style . '>';
	$output .= do_shortcode( $content );
	$output .= '<div class="clear"></div>';
	$output .= '</div>';

	// end output
	return $output;
}

add_shortcode( 'pro_pricing_table', 'pro_pricing_table' );

// check if user is still using old shortcodes
if ( !shortcode_exists( 'webuild_pricing_table' ) ) {
    add_shortcode( 'webuild_pricing_table', 'pro_pricing_table' );
} 

/**
 *
 * PRO Pricing Column
 * @version 1.0.0
 * @since 1.0.0
 *
 */
function pro_pricing_column( $atts, $content = '', $id = '' ) {
	global $webuild_pricing_columns;
	extract( shortcode_atts( array(
		'id'             => '',
		'class'          => '',
		'in_style'       => '',
		'title'          => '',
		'price'          => '',
		'subtitle'       => '',
		'interval'       => '',
		'featured'       => '',
		'currency'       => '',
		'seperator'      => '/',
		'color'          => 'yellow',
		'title_bgcolor'  => '',
		'title_color'    => '',
		'price_bgcolor'  => '',
		'price_color'    => '',
		// button atts
		'button_content' => '',
		'button_link'    => '',
		'button_target'  => '',
		'button_icon'    => '',
		'button_type'    => 'flat',
		'button_shape'   => 'square',
		'button_size'    => 'sm',
		'button_color'   => 'accent',
		'button_block'   => '',
	), $atts ) );
	$id = ( $id ) ? ' id="' . $id . '"' : '';
	$class = ( $class ) ? ' ' . $class : '';
	$in_style = ( $in_style ) ? ' style="' . $in_style . '"' : '';
	$featured = ( $featured ) ? ' featured' : '';
	$currency = ( $currency ) ? '<sup>' . $currency . '</sup>' : '';
	$interval = ( $interval ) ? '<span>' . $seperator . ' ' . $interval . '</span>' : '';
	$subtitle = ( $subtitle ) ? '<span class="pro-pricing-subtitle">' . $subtitle . '</span>' : '';
	$color_class = ( $color ) ? ' pro-pricing-column-fancy pro-pricing-column-' . $color : '';
	// customize
	$title_style = '';
	$price_style = '';
	if ( $color == 'custom' ) {
		// title
		$title_bgcolor = ( $title_bgcolor ) ? 'background-color:' . $title_bgcolor . ';' : '';
		$title_color = ( $title_color ) ? 'color:' . $title_color . ';' : '';
		$title_style = ( $title_bgcolor || $title_color ) ? ' style="' . $title_bgcolor . $title_color . '"' : '';
		// price style
		$price_bgcolor = ( $price_bgcolor ) ? 'background-color:' . $price_bgcolor . ';' : '';
		$price_color = ( $price_color ) ? 'color:' . $price_color . ';' : '';
		$price_style = ( $price_bgcolor || $price_color ) ? ' style="' . $price_bgcolor . $price_color . '"' : '';
	}
	// begin output
	$output = '<div' . $id . ' class="' . webuild_get_bootstrap( $webuild_pricing_columns ) . ' pro-pricing-column' . $color_class . $featured . $class . '"' . $in_style . '>';
	$output .= ( $title ) ? '<h2 class="pro-pricing-title"' . $title_style . '>' . $title . '</h2>' : '';
	$output .= ( $price ) ? '<h3 class="pro-pricing-price"' . $price_style . '>' . $currency . $price . $interval . $subtitle . '</h3>' : '';
	$output .= '<div class="pro-pricing-column-content">';
	$features_list = explode( '~', $content );
	$is_icon_list = ( has_shortcode( $content, 'webuild_icon_list_item' ) ) ? true : false;
	$icon_list_class = ( $is_icon_list ) ? ' class="pro-icon-list"' : '';
	$output .= '<ul' . $icon_list_class . '>';
	foreach ( $features_list as $key => $feature ) {
		$output .= ( $is_icon_list ) ? do_shortcode( $feature ) : '<li>' . do_shortcode( $feature ) . '</li>';
	}
	$output .= '</ul>';
	if ( $button_content ) {
		$output .= '<div class="pro-pricing-button">';
		$output .= pro_button( array(
			'type'   => $button_type,
			'shape'  => $button_shape,
			'href'   => $button_link,
			'target' => $button_target,
			'size'   => $button_size,
			'color'  => $button_color,
			'icon'   => $button_icon,
			'block'  => $button_block,
		), $button_content );
		$output .= '</div>';
	}
	$output .= '</div>';
	$output .= '</div>';

	// end output
	return $output;
}

add_shortcode( 'pro_pricing_column', 'pro_pricing_column' );

// check if user is still using old shortcodes
if ( !shortcode_exists( 'webuild_pricing_column' ) ) {
    add_shortcode( 'webuild_pricing_column', 'pro_pricing_column' );
} 