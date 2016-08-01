<?php
/**
 *
 * PRO Portfolio
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function pro_portfolio( $atts, $content = '', $id = '' ) {
	global $wp_query, $paged, $post;
	$defaults = array(
		'id'                  => '',
		'class'               => '',
		'cats'                => 0,
		'style'               => '',
		'columns'             => '',
		'layout'              => '',
		'limit'               => '',
		'nav'                 => '',
		'model'               => '',
		'size'                => '',
		'no_filter'           => '',
		'filter_align'        => '',
		'filter_shape'        => '',
		'filter_color'        => '',
		'filter_hover_color'  => '',
		'filter_border_width' => '',
	);
	extract( shortcode_atts( $defaults, $atts ) );
	$is_row = ( $style == 'default' ) ? ' row' : '';
	if ( is_front_page() || is_home() ) {
		$paged = ( get_query_var( 'paged' ) ) ? intval( get_query_var( 'paged' ) ) : intval( get_query_var( 'page' ) );
	} else {
		$paged = intval( get_query_var( 'paged' ) );
	}
	// Query
	$args = array(
		'posts_per_page' => $limit,
		'post_type'      => 'portfolio',
		'paged'          => $paged,
	);
	if ( $cats ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'portfolio-category',
				'field'    => 'ids',
				'terms'    => explode( ',', $cats )
			)
		);
	}
	$tmp_query = $wp_query;
	$wp_query = new WP_Query( $args );
	ob_start();
	if ( have_posts() ) :
		echo '<div class="portfolio-loop portfolio-' . $style . ' portfolio-model-' . $model . '">';
		// custom colors
		$portfolio_class = '';
		$loader_class = '';
		if ( $filter_color || $filter_hover_color || $filter_border_width ) {
			$custom_style = '';
			$portfolio_uniqid = uniqid();
			if ( $filter_hover_color ) {
				$custom_style .= '.portfolio-' . $portfolio_uniqid . ' a:hover,';
				$custom_style .= '.portfolio-' . $portfolio_uniqid . ' a.active{';
				$custom_style .= 'color:' . $filter_hover_color . '!important;';
				$custom_style .= 'border-color:' . $filter_hover_color . '!important;';
				$custom_style .= '}';
			}
			if ( $filter_color || $filter_border_width ) {
				$custom_style .= '.portfolio-' . $portfolio_uniqid . ' a{';
				$custom_style .= ( $filter_color ) ? 'color:' . $filter_color . '!important;border-color:' . $filter_color . '!important;' : '';
				$custom_style .= ( $filter_border_width ) ? 'border-width:' . webuild_esc_string( $filter_border_width ) . 'px!important;' : '';
				$custom_style .= '}';
			}
			// add inline style
			webuild_add_inline_style( $custom_style );
			$portfolio_class = ' portfolio-' . $portfolio_uniqid;
			$loader_class = ' loader-' . $portfolio_uniqid;
		}
		// isotope-container
		echo '<div class="isotope-container">';
		echo '<div class="isotope-loading pro-loader' . $loader_class . '"></div>';
		// isotope-wrapper
		echo '<div class="isotope-wrapper">';
		// isotope-filter
		if ( ! $no_filter ) {
			$filter_args = array(
				'echo'     => 0,
				'title_li' => '',
				'style'    => 'none',
				'taxonomy' => 'portfolio-category',
				'walker'   => new Walker_Portfolio_List_Categories(),
			);
			if ( $cats ) {
				$exp_cats = explode( ',', $cats );
				$new_cats = array();
				foreach ( $exp_cats as $cat_value ) {
					$has_children = get_term_children( $cat_value, 'portfolio-category' );
					if ( ! empty( $has_children ) ) {
						$new_cats[] = implode( ',', $has_children );
					} else {
						$new_cats[] = $cat_value;
					}
				}
				$filter_args['include'] = implode( ',', $new_cats );
			}
			$filter_args = wp_parse_args( $args, $filter_args );
			echo '<div class="container">';
			echo '<div class="isotope-filter isotope-filter-' . $filter_shape . ' text-' . $filter_align . $portfolio_class . '">';
			echo '<a href="#" data-filter="*" class="active">' . esc_html__( 'All', THEME_NAME ) . '</a>';
			echo wp_list_categories( $filter_args );
			echo '</div>';
			echo '</div>';
		}
		// isotope-portfolio
		echo '<div class="isotope-portfolio isotope-loop' . $is_row . '" data-layout="' . $layout . '">';
		while( have_posts() ) : the_post();
			$item_args = array(
				'columns' => $columns,
				'model'   => $model,
				'size'    => $size,
			);
			pro_portfolio_item( $item_args );
		endwhile;
		echo '</div>'; // isotope-portfolio
		// portfolio-pagination
		if ( $nav != 'hide' ) {
			$nav_args = array(
				'isotope'        => 1,
				'post_type'      => 'portfolio',
				'nav'            => $nav,
				'posts_per_page' => $limit,
				'columns'        => $columns,
				'model'          => $model,
				'size'           => $size,
			);
			if ( $cats ) {
				$nav_args['cat'] = $cats;
			}
			webuild_paging_nav( $nav_args );
		}
		echo '<div class="clear"></div>'; // isotope-wrapper
		echo '</div>'; // isotope-wrapper
		echo '</div>'; // isotope-container
		echo '</div>';
	else:
		echo '<span class="fa fa-warning-sign"></span> nothing any portfolio item.';
	endif;
	wp_reset_query();
	wp_reset_postdata();
	$wp_query = $tmp_query;
	$output = ob_get_clean();

	return $output;
}

add_shortcode( 'pro_portfolio', 'pro_portfolio' );

// check if user is still using old shortcodes
if ( !shortcode_exists( 'webuild_portfolio' ) ) {
    add_shortcode( 'webuild_portfolio', 'pro_portfolio' );
}

