<?php
/**
 *
 * Header
 * @since 1.0.0
 * @version 1.1.0
 */
if ( ! function_exists( 'webuild_header' ) ) {
	function webuild_header() {
		global $apro_options;
		if ( $apro_options['page-header-switch'] ) {
			get_template_part( 'pro-framework/headers/' . $apro_options['header-layout'] );
			get_template_part( 'pro-framework/headers/mobile-header' );
			if ( $apro_options['sticky-header'] && $apro_options['header-layout'] != 'one-page-menu' ) {
				get_template_part( 'pro-framework/headers/sticky-header' );
			}
		}
	}
}
/**
 *
 * Slider
 * @since 1.0.0
 * @version 1.1.0
 * TODO - make it general
 */
if ( ! function_exists( 'webuild_rev_slider' ) ) {
	function webuild_rev_slider( $base, $position, $slider ) {
		if ( $slider != 'no-slider' && $base == $position ) {
			echo '<div class="pro-slider">';
			echo do_shortcode( '[rev_slider ' . $slider . ']' );
			echo '</div>';
		}
	}
}
/**
 *
 * Title bar
 * @since 1.0.0
 * @version 1.1.0
 */
if ( ! function_exists( 'webuild_title_bar' ) ) {
	function webuild_title_bar() {
		global $apro_options;
		if ( $apro_options['page-title-bar'] ) {
			get_template_part( 'pro-framework/template-parts/image-header' );
		}
	}
}
/**
 *
 * Preloader
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'webuild_loader' ) ) {
	function webuild_loader( ) {
		global $apro_options;
		$output = $cont_bg = $loader_bg = '';
		if ( $apro_options['load-bg'] ) {
			$cont_bg .= 'style="' . webuild_redux_bg_css( $apro_options['load-bg'] ) . '"';
		}
		if ( isset( $apro_options['loader-circle-color'] ) ) {
			$loader_bg = 'background-color:' . $apro_options['loader-circle-color'] . ';';
		}
		if ( $apro_options['loader-circle'] ) {
			$loader_bg .= webuild_redux_bg_css( $apro_options['loader-circle'] );
		}
		$output = '<div id="preloader" ' . $cont_bg . '><div class="preloader-image" style="' . $loader_bg . '"><div class="img-cont"></div></div></div>';

		return $output;
	}
}
/**
 *
 * Pro logo
 * @since 1.0.0
 * @version 1.1.0
 */
if ( ! function_exists( 'webuild_output_logo' ) ) {
	function webuild_output_logo( $logo, $retina ) {
		global $apro_options;
		$output = '';
		if ( $logo['url'] ) {
			$output .= '<div class="logo"><a href="' . esc_url(home_url('/')) . '"><img src="' . $logo['url'] . '" alt="' . get_bloginfo( 'name' ) . '" class="normal"/>';
			if ( $retina ) {
				$output .= '<img style="width:' . $logo['width'] . 'px;max-height:' . $logo['height'] . 'px; height: auto !important" src="' . $retina['url'] . '" alt="' . get_bloginfo( 'name' ) . '" class="retina"/>';
			};
			$output .= '</a></div>';
		} else {
			// APRO default theme logo
			$output .= '<div class="logo"><a href="' . esc_url(home_url('/')) . '"><img src="' . get_template_directory_uri() . '/images/logo.png" alt="' . get_bloginfo( 'name' ) . '" class="normal"/><img style="width:110px;max-height:40px; height: auto !important" src="' . get_template_directory_uri() . '/images/logo@2x.png" alt="' . get_bloginfo( 'name' ) . '" class="retina"/></a></div>';
		}
		echo wp_kses_post( $output );
	}
}
/**
 *
 * Favicons
 * @since 1.0.0
 * @version 1.1.0
 * TODO - make it general
 */
if ( ! function_exists( 'webuild_favicons' ) ) {
	function webuild_favicons() {
		global $apro_options;
		if ( isset( $apro_options['favicon'] ) && $apro_options['favicon'] ) {
			echo '<link rel="shortcut icon" href="' . $apro_options['favicon']['url'] . '" type="image/x-icon" />';
		}
		if ( isset( $apro_options['iphone-icon']['url'] ) && $apro_options['iphone-icon']['url'] ) {
			echo '<link rel="apple-touch-icon-precomposed" href="' . $apro_options['iphone-icon']['url'] . '">';
		}
		if ( isset( $apro_options['iphone-icon-retina']['url'] ) && $apro_options['iphone-icon-retina']['url'] ) {
			echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . $apro_options['iphone-icon-retina']['url'] . '">';
		}
		if ( isset( $apro_options['ipad-icon']['url'] ) && $apro_options['ipad-icon']['url'] ) {
			echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . $apro_options['ipad-icon']['url'] . '">';
		}
		if ( isset( $apro_options['ipad-icon-retina']['url'] ) && $apro_options['ipad-icon-retina']['url'] ) {
			echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . $apro_options['ipad-icon-retina']['url'] . '">';
		}
	}
}
/**
 *
 * Blog Get Author
 * @since 1.0.0
 * @version 1.1.0
 *
 */
if ( ! function_exists( 'webuild_author' ) ) {
	function webuild_author() {
		$id = get_the_author_meta( 'ID' );
		echo '<span class="entry-profile"><span class="img-profile">' . get_avatar( $id ) . '</span><span class="col"><span class="entry-author-link">' . esc_html__( 'By:', THEME_NAME ) . '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url( $id )) . '" rel="author">' . get_the_author() . '</a></span></span><span class="entry-date">' . esc_html( get_the_date( 'M jS, Y' ) ) . '</span></span></span>';
	}
}
/**
 *
 * Blog Full Top
 * @since 1.0.0
 * @version 1.1.0
 *
 */
if ( ! function_exists( 'webuild_full_top_meta' ) ) {
	function webuild_full_top_meta( $post ) {
		// format
		$post_format = get_post_format();
		$header_class = $post_format ? '' : 'border-left';
		echo '<header class="entry-header-top ' . $header_class . '">';
		if(!is_single()){
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		// details
		$id = get_the_author_meta( 'ID' );
		echo '<span class="entry-profile"><span class="col"><span class="entry-author-link"><strong>' . esc_html__( 'By:', THEME_NAME ) . '</strong><span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url( $id )) . '" rel="author">' . get_the_author() . '</a></span></span><span class="entry-date"><strong>Posted: </strong>' . esc_html( get_the_date( 'M jS, Y' ) ) . '</span></span></span>';
		// comments
		echo '<span class="entry-categories"><strong>In:</strong> ';
		$cat = wp_get_post_categories( $post->ID );
		$k   = count( $cat );
		foreach ( $cat as $c ) {
			$categories = get_category( $c );
			$k -= 1;
			if ( $k == 0 ) {
				echo '<a href="' . get_category_link( $categories->term_id ) . '" class="categories-name">' . $categories->name . '</a>';
			} else {
				echo '<a href="' . get_category_link( $categories->term_id ) . '" class="categories-name">' . $categories->name . ', </a>';
			}
		}
		echo '</span>';
		if ( ! is_search() ) {
			if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="entry-comments-link">';
				comments_popup_link( esc_html__( '0', THEME_NAME ), esc_html__( '1', THEME_NAME ), esc_html__( '%', THEME_NAME ) );
				echo '</span>';
			}
		}
		echo '</header>';
	}
}
/**
 *
 * Blog Get Comments
 * @since 1.0.0
 * @version 1.1.0
 *
 */
if ( ! function_exists( 'webuild_comments' ) ) {
	function webuild_comments() {
		if ( ! is_search() ) {
			if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="entry-comments-link pull-right">';
				comments_popup_link( esc_html__( '0', THEME_NAME ), esc_html__( '1', THEME_NAME ), esc_html__( '%', THEME_NAME ) );
				echo '</span>';
			}
		}
	}
}
/**
 *
 * Blog Get Post Format
 * @since 1.0.0
 * @version 1.1.0
 *
 */
if ( ! function_exists( 'webuild_post_format' ) ) {
	function webuild_post_format() {
		$post_format = get_post_format();
		if ( $post_format ) {
			echo '<span class="entry-format-' . $post_format . '">';
			echo '<a class="categ-type" href="' . esc_url( get_post_format_link( $post_format ) ) . '">' . get_post_format_string( $post_format ) . '</a>';
			echo '</span>';
		}
	}
}
/**
 *
 * Blog Get Post Categories
 * @since 1.0.0
 * @version 1.1.0
 *
 */
if ( ! function_exists( 'webuild_post_categories' ) ) {
	function webuild_post_categories() {
		if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && webuild_categorized_blog() ) {
			esc_html_e( 'Posted in:', THEME_NAME );
			echo '<span>' . get_the_category_list( ', ' ) . '</span>';
		}
	}
}
/**
 *
 * Page Featured Image
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_page_featured_image' ) ) {
	function webuild_page_featured_image() {
		if ( post_password_required() || ! has_post_thumbnail() ) {
			return;
		}
		$size = apply_filters( 'webuild_page_featured_image_size', 'full' );
		echo '<div class="entry-image">';
		the_post_thumbnail( $size );
		echo '</div><!-- entry-image -->';
	}
}
/**
 *
 * Blog Get Tags
 * @since 1.0.0
 * @version 1.1.0
 *
 */
if ( ! function_exists( 'webuild_post_tags' ) ) {
	function webuild_post_tags() {
		$posttags = get_the_tags();
		if ( $posttags ) {
			echo '<span class="entry-tags-list"><span class="icon" rel=""></span> ';
			$i = 1;
			$size = count( $posttags );
			foreach ( $posttags as $tag ) {
				echo '<a href="' . get_tag_link( $tag->term_id ) . '">';
				echo esc_attr($tag->name);
				echo '</a>';
				if ( $size != $i ) {
					echo ', ';
				}
				$i ++;
			}
			echo '</span>';
		}
	}
}
/**
 *
 * Blog Grid|Masonry meta
 * @since 1.0.0
 * @version 1.1.0
 *
 */
if ( ! function_exists( 'webuild_grid_type_meta' ) ) {
	function webuild_grid_type_meta() {
		global $post;
		echo '<span class="entry-author-link">' . esc_html__( 'By:', THEME_NAME ) . '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . get_the_author() . '</a></span></span><span class="entry-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><time class="entry-date" datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date( 'M jS, Y' ) ) . '</time></a></span>';
		if ( ! is_search() ) {
			if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="entry-comments-link pull-right">';
				comments_popup_link( esc_html__( '0', THEME_NAME ), esc_html__( '1', THEME_NAME ), esc_html__( '%', THEME_NAME ) );
				echo '</span>';
			}
		}
	}
}
/**
 *
 * Blog Medium meta
 * @since 1.0.0
 * @version 1.1.0
 *
 */
if ( ! function_exists( 'webuild_medium_type_meta' ) ) {
	function webuild_medium_type_meta() {
		global $post;
		if ( ! is_search() ) {
			if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="entry-comments-link">';
				comments_popup_link( esc_html__( '0', THEME_NAME ), esc_html__( '1', THEME_NAME ), esc_html__( '%', THEME_NAME ) );
				echo '</span>';
			}
		}
		echo '<span class="entry-author-link">' . esc_html__( 'By:', THEME_NAME ) . '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . get_the_author() . '</a></span></span>';
		$post_format = get_post_format();
		if ( $post_format ) {
			echo '<span class="entry-format-' . $post_format . '">';
			echo '<a href="' . esc_url( get_post_format_link( $post_format ) ) . '">' . get_post_format_string( $post_format ) . '</a>';
			echo '</span>';
		}
		echo '<span class="entry-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><time class="entry-date" datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date( 'M jS, Y' ) ) . '</time></a></span>';
	}
}
/**
 *
 * Blog Post Meta
 * @since 1.0.0
 * @version 1.1.0
 *
 */
if ( ! function_exists( 'webuild_posted_on' ) ) {
	function webuild_posted_on() {
		global $post;
		if ( is_sticky() && is_home() && ! is_paged() ) {
			echo '<span class="entry-featured">' . esc_html__( 'Sticky', THEME_NAME ) . '</span>';
		}
		$post_format = get_post_format();
		if ( $post_format ) {
			echo '<span class="entry-format-' . $post_format . '">';
			echo '<a href="' . esc_url( get_post_format_link( $post_format ) ) . '">' . get_post_format_string( $post_format ) . '</a>';
			echo '</span>';
		}
		printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="entry-author-link"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
			esc_url( get_permalink() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date( 'M jS, Y' ) ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
		if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && webuild_categorized_blog() ) {
			echo '<span class="entry-cat-links">' . get_the_category_list( ', ' ) . '</span>';
		}
		if ( ! is_search() ) {
			if ( ! post_password_required() && ('open' == $post->comment_status) ) {
				echo '<span class="entry-comments-link">';
				comments_popup_link( esc_html__( '0', THEME_NAME ), esc_html__( '1', THEME_NAME ), esc_html__( '%', THEME_NAME ) );
				echo '</span>';
			}
			else {
				echo '<span class="entry-comments-link"><a href="javascript:void(0)">';
				esc_html_e( 'Comments are Off', THEME_NAME );
				echo '</a></span>';
			}
			$live_id = get_the_ID();
			$love_count = get_post_meta( $live_id, '_love_count', true );
			$love_count = ( ! empty( $love_count ) ) ? $love_count : 0;
			$is_loved = ( isset( $_COOKIE[ 'route_love_' . $live_id ] ) ) ? ' entry-loved' : '';
			echo '<span class="entry-love">';
			echo '<a href="#" class="entry-love-it' . $is_loved . '" data-post-id="' . $live_id . '"><span class="love-count">' . $love_count . '</span></a>';
			echo '</span>';
		}
		$tags = get_the_tags();
		if($tags) {
			echo '<span class="entry-tags">';
			foreach ($tags as $tag) {
				echo "<a href='" . $tag->slug . "'>" . $tag->name . "</a> ";
			}
			echo '</span>';
		}
		edit_post_link( esc_html__( 'Edit', THEME_NAME ), '<span class="entry-edit-link">', '</span>' );
	}
}
/**
 *
 * Post Navigation
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_post_nav' ) ) {
	function webuild_post_nav() {
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );
		if ( empty( $next ) && empty( $previous ) ) {
			return;
		}
		?>
		<nav class="post-navigation">
			<h3 class="nav-previous"><?php previous_post_link( '%link', '<i class="fa fa-angle-left"></i> ' . esc_html__( 'Previous Post', THEME_NAME ) . '<br /><strong><p>%title</p></strong>' ); ?></h3>

			<h3 class="nav-next"><?php next_post_link( '%link', esc_html__( 'Next Post', THEME_NAME ) . ' <i class="fa fa-angle-right"></i><br /><strong><p>%title</p></strong>' ); ?></h3>
			<div class="clear"></div>
		</nav>
		<?php
	}
}
/**
 *
 * Post Thumbnail
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_post_thumbnail' ) ) {
	function webuild_post_thumbnail( $link = '' ) {
		global $apro_options;
		if ( post_password_required() || ! has_post_thumbnail() ) {
			return;
		}
		global $webuild_blog_image_size;
		if ( is_search() ) {
			$webuild_blog_image_size = 'blog-small';
		}
		$size = ( empty( $webuild_blog_image_size ) ) ? $apro_options['blog_image_size'] : $webuild_blog_image_size;
		$link = ( empty( $link ) ) ? esc_url(get_permalink()) : $link;
		if ( is_singular() ) {
			if ( $apro_options['blog_featured_image'] ) {
				echo '<div class="entry-image">';
				$image_size = isset( $apro_options['blog_single_image_size'] ) ? $apro_options['blog_single_image_size'] : 'blog-small';
				the_post_thumbnail( $image_size );
				echo '</div><!-- entry-image -->';
			}
		} else {
			echo '<div class="entry-image">';
			echo '<a href="' . $link . '" class="post-thumbnail">';
			the_post_thumbnail( $size );
			echo '<span class="entry-image-overlay"></span>';
			echo '</a>';
			echo '</div><!-- entry-image -->';
		}
	}
}
/**
 *
 * Page Sidebar
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_page_sidebar' ) ) {
	function webuild_page_sidebar( $base = 'right', $layout = 'right', $sidebar_name = 'sidebar-1' ) {
		if ( $base == $layout || $layout == 'both' ) {
			echo '<div class="col-md-3 sidebar-cont">';
			echo '<div class="page-sidebar sidebar-' . $base . '">';
			echo '<aside class="sidebar">';
			if ( $sidebar_name ) {
				dynamic_sidebar( $sidebar_name );
			} else {
				get_sidebar();
			}
			echo '</aside>';
			echo '</div>';
			echo '</div>';
		}
	}
}
/**
 *
 * Global Button Class
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_get_button_class' ) ) {
	function webuild_get_button_class( $args = array() ) {
		$defaults = array(
			'type'  => 'flat',
			'shape' => 'rounded',
			'size'  => 'xs',
			'color' => 'flat-accent',
		);
		$classes = array();
		$args = wp_parse_args( $args, $defaults );
		foreach ( $args as $key => $value ) {
			$classes[] = 'pro-btn-' . $value;
		}

		return 'pro-btn ' . join( ' ', $classes );
	}
}
/**
 *
 * Link Pages
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_link_pages' ) ) {
	function webuild_link_pages( $args = '' ) {
		$defaults = array(
			'title'            => '<span class="pagination-title">' . esc_html__( 'Pages', THEME_NAME ) . '</span>',
			'before'           => '<div class="page-pagination">',
			'after'            => '</div>',
			'link_before'      => '',
			'link_after'       => '',
			'next_or_number'   => 'number',
			'separator'        => '',
			'nextpagelink'     => esc_html__( 'Next', THEME_NAME ),
			'previouspagelink' => esc_html__( 'Previous', THEME_NAME ),
			'pagelink'         => '%',
			'echo'             => 1
		);
		$r = wp_parse_args( $args, $defaults );
		$r = apply_filters( 'wp_link_pages_args', $r );
		ob_start();
		wp_link_pages();
		$pages = ob_get_clean();
		extract( $r, EXTR_SKIP );
		global $page, $numpages, $multipage, $more;
		$output = '';
		if ( $multipage ) {
			if ( 'number' == $next_or_number ) {
				$output .= $before;
				$output .= $title;
				for ( $i = 1; $i <= $numpages; $i ++ ) {
					$link = $link_before . str_replace( '%', $i, $pagelink ) . $link_after;
					$output .= ( $i == $page ) ? '<span class="current">' : '</span>';
					if ( $i != $page ) {
						$link = _wp_link_page( $i ) . $link . '</a>';
					}
					$link = apply_filters( 'wp_link_pages_link', $link, $i );
					$output .= $separator . $link;
				}
				$output .= $after;
			} elseif ( $more ) {
				$output .= $before;
				$i = $page - 1;
				if ( $i ) {
					$link = _wp_link_page( $i ) . $link_before . $previouspagelink . $link_after . '</a>';
					$link = apply_filters( 'wp_link_pages_link', $link, $i );
					$output .= $separator . $link;
				}
				$i = $page + 1;
				if ( $i <= $numpages ) {
					$link = _wp_link_page( $i ) . $link_before . $nextpagelink . $link_after . '</a>';
					$link = apply_filters( 'wp_link_pages_link', $link, $i );
					$output .= $separator . $link;
				}
				$output .= $after;
			}
		}
		$output = apply_filters( 'wp_link_pages', $output, $args );
		if ( $echo ) {
			echo wp_kses_post( $output );
		}

		return $output;
	}
}
/**
 *
 * Pagination
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_paging_nav' ) ) {
	function webuild_paging_nav( $args = array() ) {
		global $apro_options;
		if ( ! empty( $args['wp_query'] ) ) {
			$wp_query = $args['wp_query'];
			$max_num_pages = $wp_query->max_num_pages;
		} else if ( ! empty( $args['query'] ) ) {
			$max_num_query = new WP_Query( $args['query'] );
			$max_num_pages = $max_num_query->max_num_pages;
			//wp_reset_query();
			wp_reset_postdata();
		} else {
			$max_num_pages = $GLOBALS['wp_query']->max_num_pages;
		}
		$template = $apro_options['blog_layout'];
		$defaults = array(
			'nav'            => $apro_options['blog_pagination'],
			'template'       => $apro_options['blog_layout'],
			'posts_per_page' => get_option( 'posts_per_page' ),
			'size'           => $apro_options['blog_image_size'],
			'columns'        => $apro_options['blog_column'],
			'max_pages'      => $max_num_pages,
			'post_type'      => 'post',
			'isotope'        => ( $template == 'default' || $template == 'medium' || $template == 'small' ) ? '0' : '1',
		);
		$args = wp_parse_args( $args, $defaults );
		if ( $max_num_pages < 2 || $args['nav'] == 'hide' ) {
			return;
		}
		if ( $args['nav'] == 'load' ) {
			wp_enqueue_style( 'webuild-royalslider' );
			wp_enqueue_script( 'webuild-royalslider' );
			$uniqid = uniqid();
			$output = '<div class="ajax-pagination">';
			$output .= '<a href="#" class="ajax-load-more ' . webuild_get_button_class( array( 'size' => 'xxs' ) ) . '" data-token="' . $uniqid . '">';
			$output .= esc_html__( 'Load More', THEME_NAME );
			$output .= '<span class="pro-loader"></span>';
			$output .= '</a>';
			$output .= '</div>';
			unset( $args['query'] );
			wp_localize_script( 'webuild-script', 'webuild_load_more_' . $uniqid, $args );
			echo $output;
		} else {
			if ( is_front_page() || is_home() ) {
				$paged = ( get_query_var( 'paged' ) ) ? intval( get_query_var( 'paged' ) ) : intval( get_query_var( 'page' ) );
			} else {
				$paged = intval( get_query_var( 'paged' ) );
			}
			$paged = $paged ? $paged : 1;
			$pagenum_link = html_entity_decode( get_pagenum_link() );
			$query_args = array();
			$url_parts = explode( '?', $pagenum_link );
			if ( isset( $url_parts[1] ) ) {
				wp_parse_str( $url_parts[1], $query_args );
			}
			$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
			$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
			$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
			$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
			$links = paginate_links( array(
				'base'      => $pagenum_link,
				'format'    => $format,
				'total'     => $max_num_pages,
				'current'   => $paged,
				'mid_size'  => 1,
				'type'      => 'array',
				'add_args'  => array_map( 'urlencode', $query_args ),
				'prev_text' => esc_html__( 'Previous', THEME_NAME ),
				'next_text' => esc_html__( 'Next', THEME_NAME ),
			) );
			if ( $links ) {
				?>
				<div class="clear"></div>
				<nav class="pagination page-pagination">
					<div class="pagination-shadow">
						<?php
						foreach ( $links as $link ) {
							echo wp_kses_post($link);
						}
						?>
					</div>
				</nav>
				<?php
			}
		}
	}
}
/**
 *
 * Portfolio Item
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'pro_portfolio_item' ) ) {
	function pro_portfolio_item( $item_args ) {
		global $post;
		$post_id = get_the_ID();
		$post_options = get_post_meta( $post_id, '_custom_page_options', true );
		$custom_layout = apply_filters( 'webuild_custom_portfolio_item', '', $item_args );
		if ( ! empty( $custom_layout ) ) {
			echo wp_kses_post( $custom_layout );

			return;
		}
		$item_class = '';
		$item_category = '';
		$item_terms = get_the_terms( $post_id, 'portfolio-category' );
		if ( ! empty( $item_terms ) ) {
			$item_term = array_reverse( array_values( $item_terms ) );
			$item_class = ' ' . $item_term[0]->slug;
			$item_category = $item_term[0]->name;
		}
		extract( $item_args );
		echo '<div class="isotope-item pro-fade ' . webuild_get_bootstrap( $columns ) . $item_class . '">';
		echo '<div class="portfolio-item">';
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
		$thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $size );
		$lightbox_image = ( ! empty( $post_options['custom_lightbox_link'] ) ) ? $post_options['custom_lightbox_link'] : esc_url($large_image_url[0]);
		$lightbox_thumb = ( ! empty( $post_options['custom_thumbnail'] ) ) ? $post_options['custom_thumbnail'] : esc_url($thumb_image_url[0]);
		$custom_item_link = ( ! empty( $post_options['custom_item_link'] ) ) ? $post_options['custom_item_link'] : esc_url(get_permalink());
		$custom_item_link_target = ( ! empty( $post_options['custom_item_link_target'] ) ) ? ' target="_blank"' : '';
		$item_ajax_load_class = ( empty( $post_options['custom_item_link'] ) ) ? ' item-ajax-load' : '';
		echo '<div class="portfolio-item-info">';
		switch ( $model ) {
			case 'ajax':
				echo '<a href="' . $custom_item_link . '" class="portfolio-item-hover' . $item_ajax_load_class . '" data-post-id="' . get_the_ID() . '"' . $custom_item_link_target . '>';
				echo '<span class="portfolio-item-block">';
				echo '<span class="item-icon item-icon-wrapper"><i class="fa fa-level-up"></i></span>';
				echo '<span class="portfolio-item-title">' . get_the_title() . '</span>';
				echo '<span class="portfolio-item-categories">' . $item_category . '</span>';
				echo '</span>';
				echo '</a>';
				break;
			case 'gallery':
				echo '<a href="' . $lightbox_image . '" title="' . get_the_title() . '" class="portfolio-item-hover fancybox-thumb" data-thumbnail="' . $lightbox_thumb . '" data-fancybox-group="portfolio" data-post-id="' . get_the_ID() . '">';
				echo '<span class="portfolio-item-block">';
				echo '<span class="item-icon item-icon-wrapper"><i class="fa fa-camera"></i></span>';
				echo '<span class="portfolio-item-title">' . get_the_title() . '</span>';
				echo ( ! empty( $item_category ) ) ? '<span class="portfolio-item-categories">' . $item_category . '</span>' : '';
				echo '</span>';
				echo '</a>';
				break;
			case 'text':
				echo '<div class="portfolio-item-hover">';
				echo '<div class="portfolio-item-block">';
				echo '<div class="item-icon-wrapper">';
				echo '<a href="' . $custom_item_link . '" class="item-icon"' . $custom_item_link_target . '><i class="fa fa-chain"></i></a>';
				echo '<a href="' . $lightbox_image . '" title="' . get_the_title() . '" class="item-icon fancybox-thumb" data-thumbnail="' . $lightbox_thumb . '" data-fancybox-group="portfolio"><i class="fa fa-search"></i></a>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				break;
			default:
				echo '<div class="portfolio-item-hover">';
				echo '<div class="portfolio-item-block">';
				echo '<div class="item-icon-wrapper">';
				echo '<a href="' . $custom_item_link . '" class="item-icon"' . $custom_item_link_target . '><i class="fa fa-chain"></i></a>';
				echo '<a href="' . $lightbox_image . '" title="' . get_the_title() . '" class="item-icon fancybox-thumb" data-thumbnail="' . $lightbox_thumb . '" data-fancybox-group="portfolio"><i class="fa fa-search"></i></a>';
				echo '</div>';
				echo '<h3 class="portfolio-item-title">' . get_the_title() . '</h3>';
				echo '<span class="portfolio-item-categories">' . $item_category . '</span>';
				echo '</div>';
				echo '</div>';
				break;
		}
		echo '</div>';
		// post thumbnail
		if ( ! empty( $post_options['custom_thumbnail'] ) ) {
			echo '<img src="' . $post_options['custom_thumbnail'] . '" alt="' . get_the_title() . '" />';
		} else {
			the_post_thumbnail( $size );
		}
		echo '</div>';
		if ( $model == 'text' ) {
			echo '<div class="portfolio-item-description">';
			echo '<h4 class="item-title"><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></h4>';
			echo '<div class="item-date">' . get_the_date() . '</div>';
			echo ( ! empty( $post->post_excerpt ) ) ? '<div class="item-excerpt"><p>' . do_shortcode( $post->post_excerpt ) . '</p></div>' : '';
			echo '</div>';
		}
		echo '</div>';
	}
}
/**
 *
 * Comment Form
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_comment_form' ) ) {
	function webuild_comment_form() {
		ob_start();
		comment_form();
		$comment_form = ob_get_clean();
		$comment_form = str_replace( array(
			'id="submit"',
			'class="comment-form"'
		), array(
			'id="submit" class="pro-btn pro-comment-btn"',
			'class="comment-form pro-comment-form"'
		), $comment_form );

		return $comment_form;
	}
}
/**
 *
 * Disable default wordpress gallery styles
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_use_default_gallery_style' ) ) {
	function webuild_use_default_gallery_style() {
		return false;
	}

	add_filter( 'use_default_gallery_style', 'webuild_use_default_gallery_style' );
}
/**
 *
 * Post format "Gallery"
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_post_format_gallery' ) ) {
	function webuild_post_format_gallery( $content ) {
		$pattern = webuild_get_shortcode_regex( 'gallery' );
		preg_match( '/' . $pattern . '/s', $content, $media );
		if ( ! empty( $media[2] ) ) {
			$content = str_replace( $media[0], '', $content );
		}

		return $content;
	}

	add_filter( 'pro-post-format-gallery', 'webuild_post_format_gallery' );
}
/**
 *
 * Footer Area
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_footer_widgets' ) ) {
	function webuild_footer_widgets() {
		global $apro_options;
		$output = '';
		$widgets = $apro_options['footer-widgets'];
		if ( $widgets ) {
			$output .= '<div class="widgets">';
			$output .= '<div class="container">';
			$output .= '<div class="row">';
			switch ( $widgets ) {
				case 1:
					$widget = array( 'piece' => 1, 'class' => 'col-md-12' );
					break;
				case 2:
					$widget = array( 'piece' => 2, 'class' => 'col-md-6' );
					break;
				case 3:
					$widget = array( 'piece' => 3, 'class' => 'col-md-4' );
					break;
				case 4:
					$widget = array( 'piece' => 4, 'class' => 'col-md-3' );
					break;
				case 5:
					$widget = array( 'piece' => 6, 'class' => 'col-md-2' );
					break;
				case 6:
					$widget = array( 'piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 1 );
					break;
				case 7:
					$widget = array( 'piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 2 );
					break;
				case 8:
					$widget = array( 'piece' => 3, 'class' => 'col-md-3', 'layout' => 'col-md-6', 'queue' => 3 );
					break;
				case 9:
					$widget = array( 'piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 1 );
					break;
				case 10:
					$widget = array( 'piece' => 4, 'class' => 'col-md-2', 'layout' => 'col-md-6', 'queue' => 4 );
					break;
			}
			for ( $i = 1; $i < $widget["piece"] + 1; $i ++ ) {
				$widget_class = ( isset( $widget["queue"] ) && $widget["queue"] == $i ) ? $widget["layout"] : $widget["class"];
				$output .= '<div class="' . $widget_class . '">';
				ob_start();
				dynamic_sidebar( 'footer-' . $i );
				$output .= ob_get_clean();
				$output .= '</div>';
			}
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
		}

		return $output;
	}
}
/**
 * Footer Area
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_footer_contact_details' ) ) {
	function webuild_footer_contact_details() {
		global $apro_options;
		$output = '';
		$contact_details = $apro_options['contact-details'];
		if ( $contact_details ) {
			$cols = count( $contact_details );
			$output .= '<div class="row footer-contact-details">';
			foreach ( $contact_details as $item ) {
				$output .= '<div class="widget ' . webuild_get_bootstrap( $cols, 'md', true ) . '">';
				$output .= '<i class="icon" style="background:url(' . $item['image'] . ') no-repeat center center"></i>';
				$output .= '<h3>' . $item['title'] . '</h3>';
				$output .= ( $item['url'] ) ? '<a href="' . $item['url'] . '">' : '<p>';
				$output .= $item['description'];
				$output .= ( $item['url'] ) ? '</a>' : '</p>';
				$output .= '</div>';
			}
			$output .= '</div>';
		}

		return $output;
	}
}
/**
 *
 * Pro parallax
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_background' ) ) {
	function webuild_background( $background, $parallax ) {
		global $apro_options;
		$output = '';
		$atts   = '';
		$style  = '';
		if ( $background['background-image'] && $parallax ) {
			$atts .= 'data-image-type="parallax" data-stellar-ratio="0.5" ';
			$style = 'style="background-image:url(' . $background['background-image'] . ');"';
		} else {
			$css = webuild_redux_bg_css( $background );
			$style .= 'style="' . $css . '"';
		}
		$output .= '<div class="background-image" ' . $style . ' ' . $atts . '></div>';

		return $output;
	}
}
/**
 *
 * Add this share
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function webuild_share_after_post( $content ) {
	global $apro_options;
	if ( $apro_options['enable-share'] && $apro_options['addthis-html'] ) {
		if ( is_woocommerce_activated() && is_woocommerce() ) {
			return $content; //added in the template
		}
		if ( is_single() ) {
			$content .= $apro_options['addthis-html'];
		}
	}

	return $content;
}

add_filter( "the_content", "webuild_share_after_post" );
/**
 *
 * Global Button Class
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_get_button_class' ) ) {
	function webuild_get_button_class( $args = array() ) {
		$defaults = array(
			'type'  => 'flat',
			'shape' => 'rounded',
			'size'  => 'xs',
			'color' => 'flat-accent',
		);
		$classes = array();
		$args = wp_parse_args( $args, $defaults );
		foreach ( $args as $key => $value ) {
			$classes[] = 'pro-btn-' . $value;
		}

		return 'pro-btn ' . join( ' ', $classes );
	}
}
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
if ( ! function_exists( 'webuild_comment' ) ) {
	function webuild_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
				?>
				<li class="pingback">
				<div class="pingback-content">
					<span><?php esc_html_e( 'Pingback:', THEME_NAME ); ?></span>
					<?php comment_author_link(); ?>

					<?php edit_comment_link( esc_html__( '(Edit)', THEME_NAME ), ' ' ); ?>
				</div>
				<?php
				break;
			default :
				?>

			<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">



				<article id="div-comment-<?php comment_ID(); ?>">
					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth']
						) ) ); ?>
					</div>
					<!-- .reply -->
					<div class="comment-meta">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php
							/* translators: 1: date, 2: time */
							// TODO: add date/time format (for qTranslate)
							printf( esc_html__( '%1$s at %2$s', THEME_NAME ), get_comment_date(), get_comment_time() ); ?>
						</time>
						<?php edit_comment_link( esc_html__( '(Edit)', THEME_NAME ), ' ' ); ?>
					</div>
					<!-- .comment-meta -->
					<div class="comment-author vcard">
						<?php echo get_avatar( $comment, 60 ); ?>
						<?php printf( '<cite class="fn">%s</cite>', str_replace( 'href', 'target="_blank" href', get_comment_author_link() ) ); ?>
					</div>
					<!-- .comment-author .vcard -->
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php esc_html_e( 'Your comment is awaiting moderation.', THEME_NAME ); ?></em>
						<br/>
					<?php endif; ?>
					<div class="comment-content"><?php comment_text(); ?></div>
				</article>
				<?php
				break;
		endswitch;
	}
};
add_filter( 'comments_open', 'webuild_my_comments_open', 10, 2 );
function webuild_my_comments_open( $open, $post_id ) {
	global $apro_options;
	if ( $apro_options['allow-comments'] ) {
		$open = true;
	} else {
		$open = false;
	}

	return $open;
}
