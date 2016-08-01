<?php
/**
 *
 * Get Bootstrap Column
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_get_bootstrap' ) ) {
	function webuild_get_bootstrap( $columns = 1, $device = 'md', $force = false ) {
		global $webuild_blog_column;
		$columns = ( ! empty( $webuild_blog_column ) && ! $force ) ? $webuild_blog_column : $columns;
		// $device   = ( webuild_get_option( 'non_responsive' ) ) ? 'md' : $device;
		$bootstrap_columns = array(
			1  => 'col-' . $device . '-12',
			2  => 'col-' . $device . '-6',
			3  => 'col-' . $device . '-4',
			4  => 'col-' . $device . '-3',
			5  => 'col-' . $device . '-five',
			6  => 'col-' . $device . '-2',
			7  => 'col-' . $device . '-seven',
			8  => 'col-' . $device . '-eight',
			9  => 'col-' . $device . '-nine',
			10 => 'col-' . $device . '-ten',
			11 => 'col-' . $device . '-eleven',
			12 => 'col-' . $device . '-1',
		);
		$bootstrap_columns = apply_filters( 'webuild_get_bootstrap_columns', $bootstrap_columns );

		return $bootstrap_columns[ $columns ];
	}
}
/**
 *
 * Get Bootstrap Col
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_get_bootstrap_col' ) ) {
	function webuild_get_bootstrap_col( $width = '' ) {
		$width = explode( '/', $width );
		$width = ( $width[0] != '1' ) ? $width[0] * floor( 12 / $width[1] ) : floor( 12 / $width[1] );

		return $width;
	}
}
/**
 *
 * Get Icon
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_icon_class' ) ) {
	function webuild_icon_class( $icon, $before = false ) {
		if ( empty( $icon ) ) {
			return null;
		}
		$icon = 'pro-in ' . substr( $icon, 0, 2 ) . ' ' . $icon;

		return $icon;
	}
}
/**
 *
 * Admin option enabled
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function enabled( $option_val ) {
	if ( $option_val == 'yes' ) {
		return true;
	};

	return false;
}

/**
 *
 * Get option adapted to redux
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_get_option' ) ) {
	function webuild_get_option( $name, $default = '' ) {
		global $apro_options;
		$option = $default;
		if ( isset( $apro_options[ $name ] ) && $apro_options[ $name ] ) {
			$option = $apro_options[ $name ];
		}

		return $option;
	}
}
/**
 *
 * Get menu elements
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function webuild_get_menu_count( $depth = 0 ) {
	$menu_name = 'primary';
	$top_lvl = array();
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items( $menu->term_id );
		foreach ( (array) $menu_items as $key => $menu_item ) {
			if ( $menu_item->menu_item_parent != 0 ) {
				continue;
			}
			$top_lvl[] = $menu_item->ID;
			//$title = $menu_item->title;
			//$url = $menu_item->url;
		}
	}

	return $top_lvl;
}

/**
 *
 * Get menu position for centered logo layout
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function after_item( $depth = 0 ) {
	global $apro_options;
	$menu = webuild_get_menu_count();
	if ( isset( $apro_options['logo_after'] ) ) {
		$after_id = $menu[ $apro_options['logo_after'] + 1 ];
	} else {
		$count = count( $menu );
		$after_id = $menu[ ceil( $count / 2 ) - 1 ];
	}

	return $after_id;
}

/**
 *
 * Check if logo should be in the middle of the menu
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function middle_logo() {
	if ( get_header_layout() == 's2-header-v2' ) {
		return true;
	}

	return false;
}

/**
 *
 * Get header layout
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function get_header_layout() {
	global $apro_options;

	//$apro_options['header-layout'] = 'Logo centered, Menu on sides';
	return $apro_options['header-layout'];
}

/**
 *
 * Get logo for centered logo menu
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function get_middle_logo() {
	global $apro_options;
	// end the previous li;
	$output = '';
	$output .= '</li><li class="logo logo-inline-menu">';
	if ( $apro_options['logo-upload']['url'] ) {
		$output .= '<a href="' . esc_url(home_url('/')) . '"><img src="' . $apro_options['logo-upload']['url'] . '" alt="' . get_bloginfo( 'name' ) . '" class="normal"/>';
		if ( $apro_options['logo-upload-retina'] ) {
			$output .= '<img style="width:' . $apro_options['logo-upload']['width'] . 'px;max-height:' . $apro_options['logo-upload']['height'] . 'px; height: auto !important" src="' . $apro_options['logo-upload-retina']['url'] . '" alt="' . get_bloginfo( 'name' ) . '" class="retina"/>';
		};
		$output .= '</a>';
	} else {
		$output .= '<a href="' . esc_url(home_url('/')) . '"><img src="' . get_template_directory_uri() . '/images/logo.png" alt="' . get_bloginfo( 'name' ) . '" class="normal"/><img style="width:110px;max-height:40px; height: auto !important" src="' . get_template_directory_uri() . '/images/logo@2x.png" alt="' . get_bloginfo( 'name' ) . '" class="retina"/></a>';
	}
	$output .= '</li>';

	return $output;
}

/**
 *
 * If the menu should have the extra classes.
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function normal_classes() {
	global $apro_options;
	if ( $apro_options['header-layout'] == 's3-header-v2' ) {
		return true;
	}

	return false;
}

/**
 *
 * Is compact menu
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function is_compact_menu() {
	global $apro_options;
	if ( $apro_options['header-layout'] == 's3-header-v1' || $apro_options['header-layout'] == 's3-header-v2' || is_page( 1064 ) ) {
		return true;
	}

	return false;
}

/**
 *
 * CSS Compress
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_css_compress' ) ) {
	function webuild_css_compress( $css ) {
		$css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
		$css = str_replace( ': ', ':', $css );
		$css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
		$css = str_replace( '<style>', '', $css );
		$css = str_replace( '</style>', '', $css );

		return $css;
	}
}
/**
 *
 * is js_composer activated
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'is_vc_activated' ) ) {
	function is_vc_activated() {
		if ( class_exists( 'Vc_Manager' ) && defined( 'WPB_VC_VERSION' ) && version_compare( WPB_VC_VERSION, '4.2.3', '>=' ) ) {
			return true;
		} else {
			return false;
		}
	}
}
/**
 *
 * is woocommerce activated
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) {
			return true;
		} else {
			return false;
		}
	}
}
/**
 *
 * is woocommerce shop
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'is_woocommerce_shop' ) ) {
	function is_woocommerce_shop() {
		if ( is_woocommerce_activated() && is_shop() ) {
			return true;
		} else {
			return false;
		}
	}
}
/**
 *
 * Font CSS
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_get_animations' ) ) {
	function webuild_get_animations() {
		$animations = array(
			'',
			// fading_entrances
			'fadeIn',
			'fadeInLeft',
			'fadeInRight',
			'fadeInUp',
			'fadeInDown',
			// attention_seekers
			'bounce',
			'flash',
			'pulse',
			'shake',
			'swing',
			'tada',
			'wobble',
			// bouncing_entrances
			'bounceIn',
			'bounceInLeft',
			'bounceInRight',
			'bounceInUp',
			'bounceInDown',
		);
		$animations = apply_filters( 'webuild_animations', $animations );

		return $animations;
	}
}
/**
 *
 * Set WPAUTOP for shortcode output
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_set_wpautop' ) ) {
	function webuild_set_wpautop( $content, $force = true ) {
		if ( $force ) {
			$content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
		}

		return do_shortcode( shortcode_unautop( $content ) );
	}
}
/**
 *
 * HTML Entities for Escape Shortcode Characters "[" and "]"
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_htmlentities' ) ) {
	function webuild_htmlentities( $text ) {
		return str_replace( array( '[', ']' ), array( '&#091;', '&#093;' ), htmlentities( $text ) );
	}
}
/**
 *
 * Inline Style Store
 * @since 1.0.0
 * @version 1.0.0
 *
 */
global $webuild_inline_styles;
$webuild_inline_styles = array();
if ( ! function_exists( 'webuild_add_inline_style' ) ) {
	function webuild_add_inline_style( $style ) {
		global $webuild_inline_styles;
		array_push( $webuild_inline_styles, $style );
	}
}
/**
 *
 * Categorized Blog
 * Find out if blog has more than one category.
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_categorized_blog' ) ) {
	function webuild_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'webuild_category_count' ) ) ) {
			$all_the_cool_cats = get_categories( array( 'hide_empty' => 1 ) );
			$all_the_cool_cats = count( $all_the_cool_cats );
			set_transient( 'webuild_category_count', $all_the_cool_cats );
		}
		if ( 1 !== (int) $all_the_cool_cats ) {
			return true;
		} else {
			return false;
		}
	}
}
/**
 *
 * Get Data
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function data_query( $type = '', $query_args = array() ) {
	$options = array();
	switch ( $type ) {
		case 'pages':
		case 'page':
			$pages = get_pages( $query_args );
			if ( ! empty( $pages ) ) {
				foreach ( $pages as $page ) {
					$options[ $page->ID ] = $page->post_title;
				}
			}
			break;
		case 'posts':
		case 'post':
			$posts = get_posts( $query_args );
			if ( ! empty( $posts ) ) {
				foreach ( $posts as $post ) {
					$options[ $post->ID ] = $post->post_title;
				}
			}
			break;
		case 'tags':
		case 'tag':
			$tags = get_terms( $query_args['taxonomies'], $query_args['args'] );
			if ( ! empty( $tags ) ) {
				foreach ( $tags as $tag ) {
					$options[ $tag->term_id ] = $tag->name;
				}
			}
			break;
		case 'categories':
		case 'category':
			$categories = get_categories( $query_args );
			if ( ! empty( $categories ) ) {
				foreach ( $categories as $category ) {
					$options[ $category->term_id ] = $category->name;
				}
			}
			break;
		case 'custom':
		case 'callback':
			if ( is_callable( $query_args['function'] ) ) {
				$options = call_user_func( $query_args['function'], $query_args['args'] );
			}
			break;
	}

	return $options;
}

/**
 *
 * Element attributes
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function el_attributes( $id, $el_attributes = array() ) {
	$attributes = array();
	if ( $el_attributes !== false ) {
		$el_attributes = ( is_string( $el_attributes ) || is_numeric( $el_attributes ) ) ? array( 'data-depend-id' => $id . '_' . $el_attributes ) : $el_attributes;
		$el_attributes = ( empty( $el_attributes ) && isset( $id ) ) ? array( 'data-depend-id' => $id ) : $el_attributes;
	}
	$attributes = wp_parse_args( $attributes, $el_attributes );
	$atts = '';
	if ( ! empty( $attributes ) ) {
		foreach ( $attributes as $key => $value ) {
			$atts .= ' ' . $key . '="' . $value . '"';
		}
	}

	return $atts;
}

/**
 *
 * Checked
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function is_checked( $helper = '', $current = '', $type = 'checked', $echo = false ) {
	if ( is_array( $helper ) && in_array( $current, $helper ) ) {
		$result = ' ' . $type . '="' . $type . '"';
	} else if ( $helper == $current ) {
		$result = ' ' . $type . '="' . $type . '"';
	} else {
		$result = '';
	}
	if ( $echo ) {
		echo wp_kses_post( $result );
	}

	return $result;
}

if ( ! function_exists( 'webuild_get_field' ) ) {
	function webuild_get_field( $field = array(), $value = '' ) {
		$output = "";
		// check for field type
		if ( isset( $field['type'] ) ) {
			switch ( $field['type'] ) {
				case "text":
					$output .= '<p class="' . $field['class'] . '">';
					$output .= '<label for="' . $field['id'] . '">' . esc_html__($field['title'], THEME_NAME ) . '</label>';
					$output .= '<input class="widefat ' . $field['class'] . '" id="' . $field['id'] . '" name="' . $field['name'] . '" type="text" value="' . $value . '" />';
					$output .= '</p>';
					break;
				case "select":
					$output .= '<p class="' . $field['class'] . '">';
					$output .= '<label for="' . $field['id'] . '">' . esc_html__($field['title'], THEME_NAME );
					$output .= '<select class="widefat" id="' . $field['id'] . '" name="' . $field['name'] . '" type="text">';
					foreach ( $field['options'] as $key_option => $value_option ) {
						$selected = ( $key_option == $value ) ? 'selected' : '';
						$output .= '<option value="' . $key_option . '" ' . $selected . '>' . esc_html__( '' . $value_option, THEME_NAME ) . '</option>';
					}
					$output .= '</select></label>';
					$output .= '</p>';
					break;
				case "checkbox":
					$checked = ( $value ) ? 'checked="checked"' : '';
					$label = ( isset( $field['label'] ) ) ? $field['label'] : '';
					echo '<p>';
					echo '<label><input type="checkbox" name="' . $field['name'] . '" value="1"' . $checked . '/> ' . $label . '</label>';
					echo '</p>';
					break;
			}
			if ( isset( $field['info'] ) ) {
				$output .= '<span>' . $field['info'] . '</span>';
			}
			echo $output;
		} else {
			echo '<p><span class="label label-danger">Field type is not available.</span></p>';
		}
	}
}


/**
 *
 * Walker Category
 * @since 1.0.0
 * @version 1.1.0
 *
 */
class Walker_Portfolio_List_Categories extends Walker_Category {


	function start_el( &$output, $category, $depth = 0, $args = array(), $current_object_id = 0 ) {
		$has_children = get_term_children( $category->term_id, 'portfolio-category' );
		if ( empty( $has_children ) ) {
			$cat_name = esc_attr( $category->name );
			$cat_name = apply_filters( 'list_cats', $cat_name, $category );
			$link = '<a href="#" data-filter=".' . strtolower( $category->slug ) . '">';
			$link .= $cat_name;
			$link .= '</a>';
			$output .= $link;
		}
	}


	function end_el( &$output, $page, $depth = 0, $args = array() ) {
	}


}

/**
 *
 * is wpml activated
 * @since 1.0.0
 * @version 1.1.0
 *
 */
if ( ! function_exists( 'is_wpml_activated' ) ) {
	function is_wpml_activated() {
		if ( class_exists( 'SitePress' ) ) {
			return true;
		} else {
			return false;
		}
	}
}
/**
 *
 * ESC String
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_esc_string' ) ) {
	function webuild_esc_string( $num ) {
		return preg_replace( '/\D/', '', $num );
	}
}
/**
 *
 * Get Page ID from Slug Insert
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_get_id_by_slug' ) ) {
	function webuild_get_id_by_slug( $slug ) {
		$page = get_page_by_path( $slug );

		return ( isset( $page ) ) ? $page->ID : null;
	}
}
/**
 *
 * CSS for redux bg field
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_redux_bg_css' ) ) {
	function webuild_redux_bg_css( $value = array() ) {
		$css = '';
		if ( ! empty( $value ) && is_array( $value ) ) {
			foreach ( $value as $key => $value ) {
				if ( ! empty( $value ) && $key != "media" ) {
					if ( $key == "background-image" ) {
						$css .= $key . ":url('" . $value . "');";
					} else {
						$css .= $key . ":" . $value . ";";
					}
				}
			}
		}

		return $css;
	}
}
/**
 *
 * Debuggin purposes
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function printr( $var ) {
	echo '<pre>';
	print_r( $var );
	echo '</pre>';
}

;

