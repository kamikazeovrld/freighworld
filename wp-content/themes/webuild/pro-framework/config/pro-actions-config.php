<?php
/**
 *
 * After Theme Supports
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_after_setup_theme' ) ) {
	function webuild_after_setup_theme() {
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1170;
		}
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'gallery',
			'video',
			'audio',
			'link',
			'quote',
			'status',
			'chat'
		) );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		//add_theme_support( 'custom-background' );
		//add_theme_support( 'custom-header' );
		remove_theme_support( 'custom-header' );
		//$custom_image_sizes = webuild_get_option( 'custom_image_sizes' );
		$custom_image_sizes = webuild_get_images_custom_sizes();
		if ( ! empty( $custom_image_sizes ) ) {
			foreach ( $custom_image_sizes as $size ) {
				$crop = ( ! empty( $size['crop'] ) ) ? true : false;
				add_image_size( sanitize_title( $size['name'] ), $size['size']['width'], $size['size']['height'], $crop );
			}
		}
		register_nav_menus( array(
			'primary'     => esc_html__( 'Primary Menu', THEME_NAME ),
			'top_menu'    => esc_html__( 'Top Menu', THEME_NAME ),
			'one_page'    => esc_html__( 'One Page Menu', THEME_NAME ),
			'footer_menu' => esc_html__( 'Footer Menu', THEME_NAME ),
		) );
		load_theme_textdomain( THEME_NAME , THEME_DIR . '/languages' );
	}

	add_action( 'after_setup_theme', 'webuild_after_setup_theme' );
}
/**
 *
 * Allow SVG in wordpress
 * @since 1.0.0
 * @version 1.1.0
 *
 */
if ( ! function_exists( 'webuild_custom_upload_mimes' ) ) {
	function webuild_custom_upload_mimes( $existing_mimes = array() ) {
		$existing_mimes['svg'] = 'mime/type';

		return $existing_mimes;
	}

	add_filter( 'upload_mimes', 'webuild_custom_upload_mimes' );
}
/**
 *
 * Ajax Pagination
 * @since 1.0.0
 * @version 1.1.0
 *
 */
if ( ! function_exists( 'webuild_ajax_pagination' ) ) {
	function webuild_ajax_pagination() {
		$type       = ( ! empty( $_POST['post_type'] ) ) ? $_POST['post_type'] : 'post';
		$template   = ( ! empty( $_POST['template'] ) ) ? $_POST['template'] : 'default';
		$query_args = array(
			'paged'          => $_POST['paged'],
			'posts_per_page' => $_POST['posts_per_page'],
			'posts_per_page' => $_POST['posts_per_page'],
			'post_type'      => $type,
		);
		if ( isset($_POST['cat']) ) {
			$query_args['cat'] = $_POST['cat'];
		}
		query_posts( $query_args );
		while( have_posts() ) : the_post();
			if ( $type == 'post' ) {
				global $webuild_blog_image_size, $webuild_blog_column;
				$webuild_blog_image_size = $_POST['size'];
				$webuild_blog_column     = $_POST['columns'];
				if ( $template != 'default' ) {
					$template = ( $template == 'grid' ) ? 'masonry' : $template;
					get_template_part( 'page-templates/page-blog', $template );
				} else {
					get_template_part( 'post-formats/content', get_post_format() );
				}
			}
		endwhile;
		wp_reset_query();
		die();
	}

	add_action( 'wp_ajax_ajax-pagination', 'webuild_ajax_pagination' );
	add_action( 'wp_ajax_nopriv_ajax-pagination', 'webuild_ajax_pagination' );
}
/**
 *
 * Comments for Portfolio Items
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_portfolio_comment_form' ) ) {
	function webuild_portfolio_comment_form() {
	}

	add_action( 'webuild_portfolio_item_end', 'webuild_portfolio_comment_form' );
}
if ( ! function_exists( 'webuild_display_post_author' ) ) :
	function webuild_display_post_author() {
		$user_url = get_the_author_meta( 'user_url' );
		$avatar   = get_avatar( get_the_author_meta( 'ID' ), 85 );
		?>
		<div class="pro-fancy-separator title-left fancy-author-title">
			<h5 class="pro-fancy-title"><?php esc_html_e( 'About the author', THEME_NAME ); ?><span
					class="separator-holder separator-right"></span></h5>
		</div>
		<div class="entry-author">
			<?php
			if ( $avatar ) {
				echo '<div class="wf-td entry-author-img">';
				if ( $user_url ) {
					printf( '<a href="%s" class="alignleft">%s</a>', esc_url( $user_url ), $avatar );
				} else {
					echo str_replace( "class='", "class='alignleft ", $avatar );
				}
				echo '</div>';
			}
			?>
			<div class="entry-author-info">
				<p class="h5-size"><?php the_author_meta( 'display_name' ); ?></p>
				<p class="text-normal"><?php the_author_meta( 'description' ); ?></p>
			</div>
		</div>
		<?php
	}
endif;
/**
 *
 * Post Format Content After
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_post_format_content_after' ) ) {
	function webuild_post_format_content_after( $post = null ) {
		global $apro_options;
		webuild_link_pages();
		if ( is_single() ) {
			?>
			<div class="entry-footer">
				<?php do_action( 'webuild_single_content_after', $post ); ?>
				<?php
				if ( $apro_options['blog_author_info'] ) {
					webuild_display_post_author();
				} ?>
				<?php if ( $apro_options['blog_recent_posts'] ) { ?>
					<?php
					$single_recents = webuild_get_option( 'single_recents' );
					$single_title   = webuild_get_option( 'single_recents_title' );
					$type           = ( ! empty( $single_recents ) ) ? $single_recents : 'random';
					$title          = ( ! empty( $single_title ) ) ? $single_title : ucfirst( $type ) . ' Posts';
					$operation      = true;
					$args           = array(
						'post_type'           => 'post',
						'ignore_sticky_posts' => 1,
						'posts_per_page'      => $apro_options['related_posts_number'],
					);
					switch ( $type ) {
						case 'commented':
							$args['orderby'] = 'comment_count';
							break;
						case 'random':
							$args['orderby'] = 'rand';
							break;
						case 'related':
							$tags = wp_get_post_tags( $post->ID );
							$ids  = array();
							if ( ! empty( $tags ) ) {
								foreach ( $tags as $term ) {
									$ids[] = $term->term_id;
								}
							} else {
								$operation = false;
							}
							$args['tag__in']      = $ids;
							$args['post__not_in'] = array( $post->ID );
							$args['orderby']      = 'rand';
							break;
						default:
							$args['orderby'] = 'date';
							break;
					}
					$q = new WP_Query( $args );
					$size = array( 60, 60 );
					if ( $q->have_posts() && $operation === true ) {
						echo '<div class="pro-fancy-separator title-left fancy-posts-title"><h5 class="pro-fancy-title">' . $title . '<span class="separator-holder separator-right"></span></h5></div>';
						echo '<section class="row round-images  related-posts">';
						while( $q->have_posts() ) : $q->the_post();
							setup_postdata( $post );
							echo '<div class="col-md-6"><div class="borders"><article class="post-format-standard"><div class="post-image"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
							echo get_the_post_thumbnail( $q->ID, $size );
							echo '</a></div><div class="post-content"><h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_title() . '</a></h4> <time datetime="' . esc_attr( get_the_date( 'c' ) ) . '"> ' . esc_html( get_the_date() ) . '</time></div></article></div></div>';
						endwhile;
						echo '</section>';
					}
					wp_reset_postdata();
					?><!-- entry-recents -->
				<?php } ?>
			</div><!-- /entry-footer -->
			<?php
		}
	}

	add_action( 'webuild_post_format_content_after', 'webuild_post_format_content_after' );
}
/**
 *
 * Portofolio Format Content After
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_portfolio_format_content_after' ) ) {
	function webuild_portfolio_format_content_after( $post = null ) {
		global $apro_options;
		if ( is_single() ) {
			?>
			<?php if ( $apro_options['portfolio_recent_posts'] ) { ?>
				<?php
				$single_recents = webuild_get_option( 'portfolio_single_recents' );
				$single_title   = webuild_get_option( 'portfolio_single_recents_title' );
				$type           = ( ! empty( $single_recents ) ) ? $single_recents : 'random';
				$title          = ( ! empty( $single_title ) ) ? $single_title : ucfirst( $type ) . ' Posts';
				$operation      = true;
				$args           = array(
					'post_type'           => 'portfolio',
					'ignore_sticky_posts' => 1,
					'posts_per_page'      => $apro_options['portfolio_related_posts_number'],
				);
				switch ( $type ) {
					case 'commented':
						$args['orderby'] = 'comment_count';
						break;
					case 'random':
						$args['orderby'] = 'rand';
						break;
					case 'related':
						$tags = wp_get_post_tags( $post->ID );
						$ids  = array();
						if ( ! empty( $tags ) ) {
							foreach ( $tags as $term ) {
								$ids[] = $term->term_id;
							}
						} else {
							$operation = false;
						}
						$args['tag__in']      = $ids;
						$args['post__not_in'] = array( $post->ID );
						$args['orderby']      = 'rand';
						break;
					default:
						$args['orderby'] = 'date';
						break;
				}
				$q = new WP_Query( $args );
				if ( $q->have_posts() && $operation === true ) {
					echo '<div class="related-posts"><h2 class="related-title">' . $title . '</h2><ul>';
					while( $q->have_posts() ) : $q->the_post();
						setup_postdata( $post );
						echo '<li><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_title() . '</a> <time datetime="' . esc_attr( get_the_date( 'c' ) ) . '">- ' . esc_html( get_the_date() ) . '</time></li>';
					endwhile;
					echo '</ul></div>';
				}
				wp_reset_postdata();
				?><!-- entry-recents -->
			<?php }
		}
	}

	add_action( 'webuild_portfolio_format_content_after', 'webuild_portfolio_format_content_after' );
}
/**
 *
 * Flush Rewrites for Custom Post Types
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_apro_flush_rewrites' ) ) {
	function webuild_apro_flush_rewrites() {
		if ( get_option( 'apro_rewrite_flush' ) === false ) {
			global $wp_rewrite;
			$wp_rewrite->flush_rules();
			update_option( 'apro_rewrite_flush', true );
		}
	}

	add_action( 'wp_loaded', 'webuild_apro_flush_rewrites' );
}
/**
 *
 * Flush Rewrites for Portfolio Slug
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_apro_flush_redux_save' ) ) {
	function webuild_apro_flush_redux_save( $options, $changed ) {
		$needs_rewrite = array(
			'portfolio-item-slug',
			'portfolio-category-slug',
			'portfolio-tag-slug',
		);
		//check to see if any changed option needs flushing the permalinks
		$flag = false;
		foreach ( $needs_rewrite as $option ) {
			if ( in_array( $option, array_keys( $changed ) ) ) {
				$flag = true;
			}
		}
		if ( $flag ) {
			delete_option( 'apro_rewrite_flush' );
		}
	}

	add_action( 'redux/options/' . REDUX_OPTION_NAME . '/saved', 'webuild_apro_flush_redux_save', 10, 2 );
}
/**
 *
 * Switch Theme Flush Rewrite
 * @since 2.1.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_switch_theme' ) ) {
	function webuild_switch_theme() {
		delete_option( 'apro_rewrite_flush' );
	}

	add_action( 'switch_theme', 'webuild_switch_theme', 10, 2 );
}
add_action( 'wp_head', 'webuild_set_post_views' );
if ( ! function_exists( 'webuild_set_post_views' ) ) {
	function webuild_set_post_views() {
		global $post;
		if ( 'post' == get_post_type() && is_single() ) {
			$postID = $post->ID;
			if ( ! empty( $postID ) ) {
				$count_key = 'webuild_post_views_count';
				$count     = get_post_meta( $postID, $count_key, true );
				if ( $count == '' ) {
					$count = 0;
					delete_post_meta( $postID, $count_key );
					add_post_meta( $postID, $count_key, '0' );
				} else {
					$count ++;
					update_post_meta( $postID, $count_key, $count );
				}
			}
		}
	}
}
if ( ! function_exists( 'webuild_space_before_head' ) ) {
	function webuild_space_before_head() {
		global $apro_options;
		echo $apro_options['space-before-head'];
	}

	add_action( 'wp_head', 'webuild_space_before_head' );
};
if ( ! function_exists( 'webuild_space_before_body' ) ) {
	function webuild_space_before_body() {
		global $apro_options;
		echo $apro_options['space-before-body'];
	}

	add_action( 'wp_footer', 'webuild_space_before_body' );
};

if ( ! function_exists( 'webuild_activate_mu_plugins' ) ) {
	function webuild_activate_mu_plugins() {
		$mu_plugins_dir = WP_CONTENT_DIR . '/mu-plugins';
		$plugin_dir     = $mu_plugins_dir . '/webuild-posts.php';
		$theme_dir      = get_template_directory() . '/pro-framework/plugins/webuild-posts/webuild-posts.php';

		if ( ! is_dir( $mu_plugins_dir ) ) {
			wp_mkdir_p( $mu_plugins_dir );
		}
		if ( ! file_exists( $plugin_dir ) ) {
			if ( ! copy( $theme_dir, $plugin_dir ) ) {
				echo "failed to copy $theme_dir to $plugin_dir ...\n";
			}
		}
	}

	add_action( 'after_switch_theme', 'webuild_activate_mu_plugins' );
};

function webuild_add_custom_style_to_main_style() {
	global $apro_options;
	$custom_css = '.transparent-theme-form input[type="text"]:focus, .transparent-theme-form input[type="email"]:focus, .transparent-theme-form textarea:focus,.transparent-theme-form select:focus{border-color:' . $apro_options["primary-color"];
	wp_add_inline_style( 'webuild-main-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'webuild_add_custom_style_to_main_style', 12 );