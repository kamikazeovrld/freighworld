<?php
/**
 *
 * PRO Blog
 * @since 1.0.0
 * @version 1.1.0
 *
 */

function pro_blog( $atts, $content = '', $id = '' ) {
	global $wp_query, $paged, $post, $webuild_blog_column, $webuild_blog_image_size;
	extract( shortcode_atts( array(
		'id'      => '',
		'class'   => '',
		'cats'    => 0,
		'limit'   => '10',
		'type'    => 'default',
		'nav'     => '',
		'columns' => 3,
		'size'    => '',
	), $atts ) );
	$id                      = ( $id ) ? ' id="' . $id . '"' : '';
	$class                   = ( $class ) ? ' ' . $class : '';
	$blog_layout             = ( $type == 'grid' || $type == 'masonry' ) ? 'masonry' : 'default blog-layout-' . $type;
	$data_layout             = ( $type == 'grid' ) ? 'fitRows' : 'masonry';
	$webuild_blog_column     = $columns;
	$webuild_blog_image_size = $size;
	if ( is_front_page() || is_home() ) {
		$paged = ( get_query_var( 'paged' ) ) ? intval( get_query_var( 'paged' ) ) : intval( get_query_var( 'page' ) );
	} else {
		$paged = intval( get_query_var( 'paged' ) );
	}
	// Query args
	$args = array(
		'posts_per_page' => $limit,
		'paged'          => $paged,
	);
	// Nav args
	$nav_args = array(
		'size'           => $size,
		'columns'        => $columns,
		'nav'            => $nav,
		'template'       => $type,
		'posts_per_page' => $limit,
		'isotope'        => ( $type == 'default' || $type == 'medium' || $type == 'small' ) ? '0' : '1',
	);
	if ( $cats ) {
		$args['cat']     = $cats;
		$nav_args['cat'] = $cats;
	}
	$tmp_query = $wp_query;
	$wp_query = new WP_Query( $args );
	ob_start();
	if ( have_posts() ) :
		echo '<div' . $id . ' class="blog-' . $blog_layout . $class . '">';
		if ( $type == 'masonry' || $type == 'grid' ) {
			echo '<div class="isotope-container">';
			echo '<div class="isotope-loading pro-loader"></div>';
			echo '<div class="isotope-wrapper">';
			echo '<div class="row isotope-blog isotope-loop" data-layout="' . $data_layout . '">';
			while( have_posts() ) : the_post();
				get_template_part( 'page-templates/page-blog', 'masonry' );
			endwhile;
			echo '</div><!-- isotope-blog -->';
			webuild_paging_nav( $nav_args );
			echo '</div><!-- isotope-wrapper -->';
			echo '</div><!-- isotope-container -->';
		} else {
			// loop posts
			while( have_posts() ) : the_post();
				global $more;
				$more = 0;
				if ( $type == 'default' ) {
					get_template_part( 'post-formats/content', get_post_format() );
				} else {
					get_template_part( 'page-templates/page-blog', $type );
				}
			endwhile;
			// loop nav
			webuild_paging_nav( $nav_args );
		}
		echo '</div>';
	else:
		echo '<span class="fa fa-warning-sign"></span> please check settings.';
	endif;
	wp_reset_query();
	wp_reset_postdata();
	$wp_query = $tmp_query;
	$output = ob_get_clean();

	return $output;
}

add_shortcode( 'pro_blog', 'pro_blog' );

// check if user is still using old shortcodes
if ( !shortcode_exists( 'webuild_blog' ) ) {
    add_shortcode( 'webuild_blog', 'pro_blog' );
}