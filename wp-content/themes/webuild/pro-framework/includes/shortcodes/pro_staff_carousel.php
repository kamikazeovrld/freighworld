<?php
/**
 *
 * PRO Staff
 * @since 1.0.0
 * @version 1.0.0
 *
 */

function pro_staff( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'staff_groups'  => '',
		'to_show'       => '4',
		'heading_color' => '#262626',
		'text_color'    => '#647886',
		'job_color'     => '#262626',
		'border_color'  => '#f7c605',
		'hover_effect'  => 'no'
	), $atts ) );


	if ( $hover_effect == "yes" ) {
		$hover = 'true';
	} else {
		$hover = "false";
	}
	#GET POSTS FOR specific team
	if ( $staff_groups ) {
		$group = get_term( $staff_groups, 'groups' );
	}
	$args = array(
		'post_type'      => 'pro_staff',
		'posts_per_page' => $to_show
	);
	//only if a group is set
	if ( $group ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'groups',
				'field'    => 'slug',
				'terms'    => $group->slug
			)
		);
	}
	$loop        = new WP_Query( $args );
	$specific_id = rand( 1000, 10000 );
	if ( $to_show != 5 && $to_show != '1' ) {
		$size_class = 12 / $to_show;
	}
	if ( $to_show == 5 && $to_show != '1' ) {
		$size_class = 'five';
	}
	if ( $to_show != 5 && $to_show != '1' ) {
		$size_class = 12 / $to_show;
	}
	if ( $to_show == 5 && $to_show != '1' ) {
		$size_class = 'five';
	}
	$output = '';
	if ( $to_show != 1 ) {
		$output .= '<div class="pro-team specific_' . $specific_id . '"><div class="container" style="padding-left:0px;padding-right:0px;"><div class="row">';
		foreach ( $loop->posts as $members ) {
			$border_color_style  = $border_color ? 'style="border-color:' . $border_color . ' !important;"' : '';
			$heading_color_style = $heading_color ? 'style="color:' . $heading_color . ';"' : '';
			$job_color_style     = $job_color ? 'style="color:' . $job_color . ';"' : '';
			$text_color_style    = $text_color ? 'style="color:' . $text_color . ';"' : '';
			#GET CUSTOM INFO ON STAFF
			$extra_info = get_post_custom( $members->ID );
			$output .= '<div class="pro-team-member col-md-' . $size_class . '">';
			$output .= '<figure ' . $border_color_style . '>';
			$output .= '<span class="outline"></span>';
			$attachment_image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $members->ID ), 'full' );
			$output .= '<img src="' . esc_url($attachment_image_src[0]) . '" alt="<b>' . $members->post_title . '</b>" />';
			$output .= '</figure>';
			$output .= '<h4 ' . $heading_color_style . '>' . $members->post_title . '</h4>';
			$members_terms = wp_get_post_terms( $members->ID, 'staff-categories' );
			$output .= '<h6 ' . $job_color_style . '>' . $members_terms[0]->name . '</h6>';
			$output .= '<div class="about" ' . $text_color_style . '>' . $extra_info["staff_member_description"][0] . '</div>';
			$output .= '<div class="social">';

			
			if ( isset( $extra_info['staff_member_website_url'][0] ) ) {
			$output .= '<a href="' . $extra_info['staff_member_website_url'][0] . '" target="_blank" class="fa fa-globe" data-toggle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_email_adress'][0] ) ) {
				$output .= '<a href="mailto:' . $extra_info['staff_member_email_adress'][0] . '" target="_blank" class="fa fa-envelope" data-toggle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_facebook_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_facebook_link'][0] . '" target="_blank" class="fa fa-facebook" data-toogle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_twitter_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_twitter_link'][0] . '" target="_blank" class="fa fa-twitter" data-toogle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_linkedin_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_linkedin_link'][0] . '" target="_blank" class="fa fa-linkedin" data-toogle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_skype_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_skype_link'][0] . '" target="_blank" class="fa fa-skype" data-toogle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_vimeo_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_vimeo_link'][0] . '" target="_blank" class="fa fa-vimeo" data-toogle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_youtube_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_youtube_link'][0] . '" target="_blank" class="fa fa-youtube" data-toogle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_dribbble_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_dribbble_link'][0] . '" target="_blank" class="fa fa-dribbble" data-toogle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_deviantart_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_deviantart_link'][0] . '" target="_blank" class="fa fa-deviantart" data-toogle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_reddit_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_reddit_link'][0] . '" target="_blank" class="fa fa-reddit" data-toogle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_behance_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_behance_link'][0] . '" target="_blank" class="fa fa-behance" data-toogle="tooltip" data-html="true" ></a>';
			}
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '</div></div></div>';
		if ( $hover == 'false' ) {
			$style = '.specific_' . $specific_id . ' .pro-team-member:hover > figure{padding:0px; border:none; -webkit-transform: scale(1);  transform: scale(1);  -moz-transform: scale(1); -o-transform: scale(1); -ms-transform: scale(1); margin-bottom: 16px !important; }';
			$style .= '.specific_' . $specific_id . ' .pro-team-member:hover > .about, .specific_' . $specific_id . ' .pro-team-member:hover > .social{top:200px;}.specific_' . $specific_id . ' .pro-team-member:hover > h4{  -webkit-transform: scale(1);transform: scale(1);-moz-transform: scale(1);-o-transform: scale(1);-ms-transform: scale(1);}';
			webuild_add_inline_style( $style );
		}
	} else {
		$output .= '<div class="pro-team specific_' . $specific_id . '"><div style="padding:0;"><div class="row">';
		foreach ( $loop->posts as $members ) {
			#GET CUSTOM INFO ON STAFF
			$extra_info = get_post_custom( $members->ID );
			$output .= '<div class="pro-team-member col-md-6" style="float:none;">';
			$output .= '<figure style="border-color:' . $border_color . ' !important;">';
			$output .= '<span class="outline"></span>';
			$attachment_image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $members->ID ), 'full' );
			$output .= '<img src="' . esc_url($attachment_image_src[0]) . '" alt="<b>' . $members->post_title . '</b>" />';
			$output .= '</figure>';
			$output .= '<h4 style="color:' . $heading_color . ';">' . $members->post_title . '</h4>';
			$members_terms = wp_get_post_terms( $members->ID, 'staff-categories' );
			$output .= '<h6 style="color:' . $job_color . ';">' . $members_terms[0]->name . '</h6>';
			$output .= '<div class="about" style="color:' . $text_color . ';">' . $extra_info["staff_member_description"][0] . '</div>';
			$output .= '<div class="social">';


			if ( isset( $extra_info['staff_member_website_url'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_website_url'][0] . '" target="_blank" class="fa fa-globe" data-toggle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_email_adress'][0] ) ) {
				$output .= '<a href="mailto:' . $extra_info['staff_member_email_adress'][0] . '" target="_blank" class="fa fa-envelope" data-toggle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_facebook_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_facebook_link'][0] . '" target="_blank" class="fa fa-facebook" data-toogle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_twitter_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_twitter_link'][0] . '" target="_blank" class="fa fa-twitter" data-toogle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_linkedin_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_linkedin_link'][0] . '" target="_blank" class="fa fa-linkedin" data-toogle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_skype_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_skype_link'][0] . '" target="_blank" class="fa fa-skype" data-toogle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_vimeo_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_vimeo_link'][0] . '" target="_blank" class="fa fa-vimeo" data-toogle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_youtube_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_youtube_link'][0] . '" target="_blank" class="fa fa-youtube" data-toogle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_dribbble_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_dribbble_link'][0] . '" target="_blank" class="fa fa-dribbble" data-toogle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_deviantart_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_deviantart_link'][0] . '" target="_blank" class="fa fa-deviantart" data-toogle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_reddit_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_reddit_link'][0] . '" target="_blank" class="fa fa-reddit" data-toogle="tooltip" data-html="true" ></a>';
			}
			if ( isset( $extra_info['staff_member_behance_link'][0] ) ) {
				$output .= '<a href="' . $extra_info['staff_member_behance_link'][0] . '" target="_blank" class="fa fa-behance" data-toogle="tooltip" data-html="true" ></a>';
			}
			$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '</div></div></div>';
		if ( $hover == 'false' ) {
			$style = '.specific_' . $specific_id . ' .pro-team-member:hover > figure{padding:0px; border:none; -webkit-transform: scale(1);  transform: scale(1);  -moz-transform: scale(1); -o-transform: scale(1); -ms-transform: scale(1); margin-bottom: 16px !important; }';
			$style .= '.specific_' . $specific_id . ' .pro-team-member:hover > .about, .specific_' . $specific_id . ' .pro-team-member:hover > .social{top:200px;}.specific_' . $specific_id . ' .pro-team-member:hover > h4{  -webkit-transform: scale(1);transform: scale(1);-moz-transform: scale(1);-o-transform: scale(1);-ms-transform: scale(1);}';
			webuild_add_inline_style( $style );
		}
	}

	return $output;
}

add_shortcode( 'pro_staff', 'pro_staff' );

// check if user is still using old shortcodes
if ( !shortcode_exists( 'vc_staff' ) ) {
    add_shortcode( 'vc_staff', 'pro_staff' );
} 

/**
 *
 * PRO Staff carousel
 * @since 1.0.0
 * @version 1.0.0
 *
 */

function pro_staff_carousel( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'hover_effect'         => 'no',
		'staff_groups'         => '',
		'posts_per_line'       => '4',
		'heading_color'        => '#262626',
		'text_color'           => '#647886',
		'job_color'            => '#262626',
		'border_color'         => '#f7c605',
		'scroll'               => 'yes',
		'arrow_color'          => '#fff',
		'arrow_bg_color'       => '#2c3e50',
		'arrow_bg_hover_color' => '#f7c605'
	), $atts ) );


	if ( $hover_effect == "" ) {
		$hover_effect = "no";
	}
	if ( $posts_per_line == "" ) {
		$posts_per_line = 4;
	}
	if ( $heading_color == "" ) {
		$heading_color = "#262626";
	}
	if ( $text_color == "" ) {
		$text_color = "#647886";
	}
	if ( $job_color == "" ) {
		$job_color = "#262626";
	}
	if ( $border_color == "" ) {
		$border_color = "#f7c605";
	}
	if ( $scroll == "" ) {
		$scroll = "yes";
	}
	if ( $arrow_color == "" ) {
		$arrow_color = "#fff";
	}
	if ( $arrow_bg_color == "" ) {
		$arrow_bg_color = "#2c3e50";
	}
	if ( $arrow_bg_hover_color == "" ) {
		$arrow_bg_hover_color = "#f7c605";
	}
	if ( $scroll == "yes" ) {
		$auto = 'true';
	} else {
		$auto = "false";
	}
	if ( $hover_effect == "yes" ) {
		$hover = 'true';
	} else {
		$hover = "false";
	}
	#GET POSTS FOR specific team
	if ( $staff_groups ) {
		$group = get_term( $staff_groups, 'groups' );
	}
	$args = array(
		'post_type'      => 'pro_staff',
		'posts_per_page' => - 1,
	);
	//only if group is set
	if ( $group ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'groups',
				'field'    => 'slug',
				'terms'    => $group->slug
			)
		);
	}
	$loop        = new WP_Query( $args );
	$specific_id = rand( 1000, 10000 );
	if ( $posts_per_line === '1' ) {
		$size_class = '6" style="margin-left:25%;';
	} else {
		$size_class = '12';
	}
	$output = "";
	$output .= '<div class="pro-team-carousel specific_' . $specific_id . '">';
	foreach ( $loop->posts as $members ) {
		#GET CUSTOM INFO ON STAFF
		$border_color_style = $border_color ? 'style="border-color:' . $border_color . ' !important;"' : '';
		$extra_info         = get_post_custom( $members->ID );
		$output .= '<div>';
		$output .= '<div class="pro-team-member col-md-' . $size_class . '">';
		$output .= '<figure ' . $border_color_style . '>';
		$output .= '<span class="outline"></span>';
		$attachment_image_src = wp_get_attachment_image_src( get_post_thumbnail_id( $members->ID ), 'full' );
		$output .= '<img src="' . esc_url($attachment_image_src[0]) . '" alt="<b>' . $members->post_title . '</b>" />';
		$output .= '</figure>';
		$output .= '<h4 style="color:' . $heading_color . ';">' . $members->post_title . '</h4>';
		$members_terms = wp_get_post_terms( $members->ID, 'staff-categories' );
		$output .= '<h6 style="color:' . $job_color . ';">' . $members_terms[0]->name . '</h6>';
		$output .= '<div class="about" style="color:' . $text_color . ';">' . $extra_info["staff_member_description"][0] . '</div>';
		$output .= '<div class="social">';
	
		if ( isset( $extra_info['staff_member_website_url'][0] ) ) {
			$output .= '<a href="' . $extra_info['staff_member_website_url'][0] . '" target="_blank" class="fa fa-globe" data-toggle="tooltip" data-html="true" ></a>';
		}
		//$output .= '<a href="mailto:' . $extra_info['staff_member_email'][0] . '" target="_blank" class="fa fa-envelope" data-toggle="tooltip" data-html="true" ></a>';
		if ( isset( $extra_info['staff_member_email_adress'][0] ) ) {
			$output .= '<a href="mailto:' . $extra_info['staff_member_email_adress'][0] . '" target="_blank" class="fa fa-envelope" data-toggle="tooltip" data-html="true" ></a>';
		}
		if ( isset( $extra_info['staff_member_facebook_link'][0] ) ) {
			$output .= '<a href="' . $extra_info['staff_member_facebook_link'][0] . '" target="_blank" class="fa fa-facebook" data-toogle="tooltip" data-html="true" ></a>';
		}
		if ( isset( $extra_info['staff_member_twitter_link'][0] ) ) {
			$output .= '<a href="' . $extra_info['staff_member_twitter_link'][0] . '" target="_blank" class="fa fa-twitter" data-toogle="tooltip" data-html="true" ></a>';
		}
		if ( isset( $extra_info['staff_member_linkedin_link'][0] ) ) {
			$output .= '<a href="' . $extra_info['staff_member_linkedin_link'][0] . '" target="_blank" class="fa fa-linkedin" data-toogle="tooltip" data-html="true" ></a>';
		}
		if ( isset( $extra_info['staff_member_skype_link'][0] ) ) {
			$output .= '<a href="' . $extra_info['staff_member_skype_link'][0] . '" target="_blank" class="fa fa-skype" data-toogle="tooltip" data-html="true" ></a>';
		}
		if ( isset( $extra_info['staff_member_vimeo_link'][0] ) ) {
			$output .= '<a href="' . $extra_info['staff_member_vimeo_link'][0] . '" target="_blank" class="fa fa-vimeo" data-toogle="tooltip" data-html="true" ></a>';
		}
		if ( isset( $extra_info['staff_member_youtube_link'][0] ) ) {
			$output .= '<a href="' . $extra_info['staff_member_youtube_link'][0] . '" target="_blank" class="fa fa-youtube" data-toogle="tooltip" data-html="true" ></a>';
		}
		if ( isset( $extra_info['staff_member_dribbble_link'][0] ) ) {
			$output .= '<a href="' . $extra_info['staff_member_dribbble_link'][0] . '" target="_blank" class="fa fa-dribbble" data-toogle="tooltip" data-html="true" ></a>';
		}
		if ( isset( $extra_info['staff_member_deviantart_link'][0] ) ) {
			$output .= '<a href="' . $extra_info['staff_member_deviantart_link'][0] . '" target="_blank" class="fa fa-deviantart" data-toogle="tooltip" data-html="true" ></a>';
		}
		if ( isset( $extra_info['staff_member_reddit_link'][0] ) ) {
			$output .= '<a href="' . $extra_info['staff_member_reddit_link'][0] . '" target="_blank" class="fa fa-reddit" data-toogle="tooltip" data-html="true" ></a>';
		}
		if ( isset( $extra_info['staff_member_behance_link'][0] ) ) {
			$output .= '<a href="' . $extra_info['staff_member_behance_link'][0] . '" target="_blank" class="fa fa-behance" data-toogle="tooltip" data-html="true" ></a>';
		}
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
	}
	$output .= '</div>';
	if ( $hover == 'false' ) {
		$style = '.specific_' . $specific_id . ' .pro-team-member:hover > figure{padding:0px; border:2px solid;' . $border_color . '; -webkit-transform: scale(1);  transform: scale(1);  -moz-transform: scale(1); -o-transform: scale(1); -ms-transform: scale(1); margin-bottom: 16px !important; }';
		$style .= '.specific_' . $specific_id . ' .pro-team-member:hover > .about, .specific_' . $specific_id . ' .pro-team-member:hover > .social{top:200px;}.specific_' . $specific_id . ' .pro-team-member:hover > h4{  -webkit-transform: scale(1);transform: scale(1);-moz-transform: scale(1);-o-transform: scale(1);-ms-transform: scale(1);}';
		$style .= '';
		webuild_add_inline_style( $style );
	}
	$style = '.specific_' . $specific_id . ' > button {background-color:' . $arrow_bg_color . ';}.specific_' . $specific_id . ' > button:hover{background-color:' . $arrow_bg_hover_color . ';-webkit-transition: background-color 0.2s linear;-moz-transition: background-color 0.2s linear;-ms-transition: background-color 0.2s linear;-o-transition: background-color 0.2s linear;transition: background-color 0.2s linear;}';
	webuild_add_inline_style( $style );
	$style = '.slick-prev, .slick-next{color:' . $arrow_color . ' !important;}';
	webuild_add_inline_style( $style );

	$output .= '<script type="text/javascript">
          jQuery(".specific_' . $specific_id . '").slick({
            slidesToShow: ' . $posts_per_line . ',
            sliderToScroll: 1,
            arrows: true,
            lazyLoad: "ondemand",
            autoplay: ' . $auto . ',
            arrows: true,
            dots: true,
            responsive: [
	            {
			      breakpoint: 1024,
			      settings: {
			        slidesToShow: 3,
			        slidesToScroll: 3
			      }
			    },
			    {
			      breakpoint: 600,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 2
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    }
		    ]
          });
      </script>';

	return $output;
}

add_shortcode( 'pro_staff_carousel', 'pro_staff_carousel' );

// check if user is still using old shortcodes
if ( !shortcode_exists( 'vc_staff_carousel' ) ) {
    add_shortcode( 'vc_staff_carousel', 'pro_staff_carousel' );
} 
