<?php
/**
 *
 * PRO Testimonials
 * @since 1.0.0
 * @version 1.0.0
 *
 */

function pro_testimonials( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'testimonial_groups' => '',
		'text_color'         => '#647886',
		'job_color'          => '',
		'name_color'         => '',
		'line_color'         => ''
	), $atts ) );
	wp_enqueue_style( 'webuild-royalslider' );
	wp_enqueue_script( 'webuild-royalslider' );
	if ( $testimonial_groups ) {
		$group = get_term( $testimonial_groups, 'testimonials-categories' );
	}
	$args = array(
		'post_type'      => 'pro_testimonials',
		'posts_per_page' => - 1,
	);
	if ( $group ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'testimonials-categories',
				'field'    => 'slug',
				'terms'    => $group->slug
			)
		);
	}
	$specific_id = rand( 1000, 10000 );
	$loop = new WP_Query( $args );
	$output = '';
	$output .= '<div class="royalSlider testimonialSlider specific_' . $specific_id . '">';
	foreach ( $loop->posts as $members ) {
		#GET CUSTOM INFO ON STAFF
		$extra_info = get_post_custom( $members->ID );
		$output .= '<div class="pro-testimonial-content">';
		$output .= '<div class="pro-testimonial-avatar">';
		$attachment_image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $members->ID ), 'full' );
		$output .= '<img src="' . esc_url($attachment_image_src[0]) . '" alt="' . $members->post_title . '"/>';
		$output .= '<span class="testimonial-misc"></span>';
		$output .= '</div>';
		$output .= '<div class="pro-testimonial-text" style="color:' . $text_color . '">' . $members->post_content . '</div>';
		$output .= '<a class="pro-testimonial-author" href="' . $extra_info["external_link"][0] . '"><h5 style="color:' . $name_color . '">' . $members->post_title . '</h5><p style="clear:both;color:' . $job_color . '">' . $extra_info["job_reference"][0] . '</p>';
		$output .= '</a>';
		$output .= '</div>';
	}
	$output .= '</div>';
	$style = '<style>.specific_' . $specific_id . ' .pro-testimonial-text:after{background-color:' . $line_color . ' !important;}</style>';
	webuild_add_inline_style( $style );

	return $output;
}

add_shortcode( 'pro_testimonials', 'pro_testimonials' );

// check if user is still using old shortcodes
if ( !shortcode_exists( 'vc_testimonials' ) ) {
    add_shortcode( 'vc_testimonials', 'pro_testimonials' );
} 
