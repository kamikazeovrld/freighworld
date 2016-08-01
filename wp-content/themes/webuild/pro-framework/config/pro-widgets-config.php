<?php


/**
 *
 * Flickr Widget
 * @since 1.0.0
 * @version 1.0.0
 *


 */
class PRO_Flickr_Widget extends WP_Widget {


	function __construct() {
		$widget_ops = array( 'classname' => 'webuild_widget_flickr', 'description' => 'Flickr Photo Stream Widget' );
		parent::__construct( 'flickr_webuild_widget', '- Flickr Photo Stream', $widget_ops );
	}


	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		echo wp_kses_post( $before_widget );
		if ( ! empty( $title ) ) {
			echo wp_kses_post( $before_title . $title . $after_title );
		}
		echo '<div class="webuild_flickr_widget">';
		$source = ( $instance['type'] == 'set' ) ? 'source=user_set&set=' : 'source=user&user=';
		echo '<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=' . $instance['count'] . '&display=' . $instance['ordering'] . '&size=' . $instance['size'] . '&' . $source . $instance['flickr_id'] . '"></script>';
		echo '</div><div class="clear"></div>';
		echo wp_kses_post( $after_widget );
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['type'] = $new_instance['type'];
		$instance['flickr_id'] = $new_instance['flickr_id'];
		$instance['count'] = $new_instance['count'];
		$instance['ordering'] = $new_instance['ordering'];
		$instance['size'] = $new_instance['size'];

		return $instance;
	}


	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
				'title'     => '',
				'type'      => 'user',
				'flickr_id' => '52617155@N08',
				'count'     => '9',
				'ordering'  => 'random',
				'size'      => 's',
			)
		);
		$title = $instance['title'];
		$type = $instance['type'];
		$flickr_id = $instance['flickr_id'];
		$count = $instance['count'];
		$ordering = $instance['ordering'];
		$size = $instance['size'];
		webuild_get_field( array(
			'id'    => $this->get_field_name( 'title' ),
			'name'  => $this->get_field_name( 'title' ),
			'type'  => 'text',
			'title' => 'Widget Title'
		), $title );
		webuild_get_field( array(
			'id'    => $this->get_field_name( 'flickr_id' ),
			'name'  => $this->get_field_name( 'flickr_id' ),
			'type'  => 'text',
			'title' => 'Flickr User ID',
			'info'  => 'Find your Flickr ID <a href="http://idgettr.com/" target="_blank">idGettr</a>'
		), $flickr_id );
		webuild_get_field( array(
			'id'    => $this->get_field_name( 'count' ),
			'name'  => $this->get_field_name( 'count' ),
			'type'  => 'text',
			'title' => 'Count'
		), $count );
		webuild_get_field( array(
			'id'      => $this->get_field_name( 'ordering' ),
			'name'    => $this->get_field_name( 'ordering' ),
			'type'    => 'select',
			'title'   => 'Ordering your images',
			'options' => array( 'latest' => 'Latest', 'random' => 'Random' )
		), $ordering );
		webuild_get_field( array(
			'id'      => $this->get_field_name( 'size' ),
			'name'    => $this->get_field_name( 'size' ),
			'type'    => 'select',
			'title'   => 'Size of your images',
			'options' => array(
				's' => 'Small square box',
				't' => 'Thumbnail size',
				'm' => 'Medium size'
			)
		), $size );
	}


}


/**
 *
 * Tab Widget
 * @since 1.0.0
 * @version 1.0.0
 *


 */
class PRO_Tab_Widget extends WP_Widget {


	function __construct() {
		$widget_ops = array(
			'classname'   => 'pro-tabs-widget',
			'description' => 'Popular posts, recent post and comments.'
		);
		parent::__construct( 'tabs_webuild_widget', 'Pro - Tabs', $widget_ops );
	}


	function widget( $args, $instance ) {
		global $post;
		extract( $args );
		$posts = $instance['posts'];
		$comments = $instance['comments'];
		$tags_count = $instance['tags'];
		$show_popular_posts = isset( $instance['show_popular_posts'] ) ? 'true' : 'false';
		$show_recent_posts = isset( $instance['show_recent_posts'] ) ? 'true' : 'false';
		$show_comments = isset( $instance['show_comments'] ) ? 'true' : 'false';
		$show_tags = isset( $instance['show_tags'] ) ? 'true' : 'false';
		if ( isset( $instance['orderby'] ) ) {
			$orderby = $instance['orderby'];
		} else {
			$orderby = 'Highest Comments';
		}
		echo wp_kses_post( $before_widget );
		?>
		<div class="tab-holder tabs-widget">
			<div class="tab-hold tabs-wrapper">
				<ul id="tabs" class="tabset tabs">
					<?php if ( $show_popular_posts == 'true' ): ?>
						<li><a href="#tab-popular"><?php echo esc_html__( 'Popular', THEME_NAME ); ?></a></li>
					<?php endif; ?>


					<?php if ( $show_recent_posts == 'true' ): ?>
						<li><a href="#tab-recent"><?php echo esc_html__( 'Recent', THEME_NAME ); ?></a></li>
					<?php endif; ?>


					<?php if ( $show_comments == 'true' ): ?>
						<li><a href="#tab-comments"><i class="fa fa-comment"></i></a></li>
					<?php endif; ?>
				</ul>
				<div class="tab-box tabs-container">
					<?php if ( $show_popular_posts == 'true' ): ?>
						<div id="tab-popular" class="tab tab_content" style="display: none;">
							<?php
							if ( $orderby == 'Highest Comments' ) {
								$order_string = '&orderby=comment_count';
							} else {
								$order_string = '&meta_key=webuild_post_views_count&orderby=meta_value_num';
							}
							$popular_posts = new WP_Query( 'showposts=' . $posts . $order_string . '&order=DESC&ignore_sticky_posts=1' );
							if ( $popular_posts->have_posts() ): ?>
								<ul class="news-list contains-posts">
									<?php while( $popular_posts->have_posts() ): $popular_posts->the_post(); ?>
										<li>
											<?php if ( has_post_thumbnail() ): ?>
												<div class="image">
													<a href="<?php the_permalink(); ?>">
														<?php the_post_thumbnail( 'tiny' ); ?>
													</a>
												</div>
											<?php endif; ?>
											<div class="post-holder">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												<div class="meta">
													<?php echo '<span class="post-date"><i class="fa fa-clock-o"></i> ' . get_the_date() . '</span>'; ?>
												</div>
											</div>
										</li>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>
					<?php endif; ?>


					<?php if ( $show_recent_posts == 'true' ): ?>
						<div id="tab-recent" class="tab tab_content" style="display: none;">
							<?php
							$recent_posts = new WP_Query( 'showposts=' . $tags_count . '&ignore_sticky_posts=1' );
							if ( $recent_posts->have_posts() ):
								?>
								<ul class="news-list contains-posts">
									<?php while( $recent_posts->have_posts() ): $recent_posts->the_post(); ?>
										<li>
											<?php if ( has_post_thumbnail() ): ?>
												<div class="image">
													<a href="<?php the_permalink(); ?>">
														<?php the_post_thumbnail( 'tiny' ); ?>
													</a>
												</div>
											<?php endif; ?>
											<div class="post-holder">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												<div class="meta">
													<?php echo '<span class="post-date"><i class="fa fa-clock-o"></i> ' . get_the_date() . '</span>'; ?>
												</div>
											</div>
										</li>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>
					<?php endif; ?>


					<?php if ( $show_comments == 'true' ): ?>
						<div id="tab-comments" class="tab tab_content" style="display: none;">
							<ul class="news-list tab-comments">
								<?php
								$number = $instance['comments'];
								global $wpdb;
								$recent_comments = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved, comment_type, comment_author_url, SUBSTRING(comment_content,1,110) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT $number";
								$the_comments = $wpdb->get_results( $recent_comments );
								foreach ( $the_comments as $comment ) { ?>
									<li>
										<div class="image">
											<a class="author">
												<?php echo get_avatar( $comment, '40' ); ?>
												<p><?php echo strip_tags( $comment->comment_author ); ?> <?php esc_html_e( 'says', THEME_NAME ); ?>
													:</p>
											</a>
										</div>
										<div class="post-holder">
											<div class="meta">
												<a class="comment-text-side"
												   href="<?php echo esc_url(get_permalink( $comment->ID )); ?>#comment-<?php echo esc_attr( $comment->comment_ID ); ?>"
												   title="<?php echo strip_tags( $comment->comment_author ); ?> on <?php echo $comment->post_title; ?>"><?php echo webuild_string_limit_words( strip_tags( $comment->com_excerpt ), 12 ); ?>
													...</a>
											</div>
										</div>
									</li>
								<?php } ?>
							</ul>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
		echo wp_kses_post( $after_widget );
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['posts'] = $new_instance['posts'];
		$instance['comments'] = $new_instance['comments'];
		$instance['tags'] = $new_instance['tags'];
		$instance['show_popular_posts'] = $new_instance['show_popular_posts'];
		$instance['show_recent_posts'] = $new_instance['show_recent_posts'];
		$instance['show_comments'] = $new_instance['show_comments'];
		$instance['show_tags'] = $new_instance['show_tags'];
		$instance['orderby'] = $new_instance['orderby'];

		return $instance;
	}


	function form( $instance ) {
		$defaults = array(
			'posts'              => 3,
			'comments'           => '3',
			'tags'               => 20,
			'show_popular_posts' => 'on',
			'show_recent_posts'  => 'on',
			'show_comments'      => 'on',
			'show_tags'          => 'on',
			'orderby'            => 'Highest Comments'
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>">Popular Posts Order By:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"
			        name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>" class="widefat"
			        style="width:100%;">
				<option <?php if ( 'Highest Comments' == $instance['orderby'] ) {
					echo 'selected="selected"';
				} ?>>Highest Comments
				</option>
				<option <?php if ( 'Highest Views' == $instance['orderby'] ) {
					echo 'selected="selected"';
				} ?>>Highest Views
				</option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'posts' ) ); ?>">Number of popular posts:</label>
			<input class="widefat" type="text" style="width: 30px;"
			       id="<?php echo esc_attr( $this->get_field_id( 'posts' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'posts' ) ); ?>"
			       value="<?php echo esc_attr( $instance['posts'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'tags' ) ); ?>">Number of recent posts:</label>
			<input class="widefat" type="text" style="width: 30px;"
			       id="<?php echo esc_attr( $this->get_field_id( 'tags' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'tags' ) ); ?>"
			       value="<?php echo esc_attr( $instance['tags'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'comments' ) ); ?>">Number of comments:</label>
			<input class="widefat" type="text" style="width: 30px;"
			       id="<?php echo esc_attr( $this->get_field_id( 'comments' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'comments' ) ); ?>"
			       value="<?php echo esc_attr( $instance['comments'] ); ?>"/>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_popular_posts'], 'on' ); ?>
			       id="<?php echo
			       esc_attr( $this->get_field_id( 'show_popular_posts' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'show_popular_posts' ) ); ?>"/>
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_popular_posts' ) ); ?>">Show popular
				posts</label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_recent_posts'], 'on' ); ?>
			       id="<?php echo esc_attr( $this->get_field_id( 'show_recent_posts' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'show_recent_posts' ) ); ?>"/>
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_recent_posts' ) ); ?>">Show recent posts</label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['show_comments'], 'on' ); ?>
			       id="<?php echo esc_attr( $this->get_field_id( 'show_comments' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'show_comments' ) ); ?>"/>
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_comments' ) ); ?>">Show comments</label>
		</p>
	<?php }


}


/**
 *
 * Blog Posts
 * @since 1.0.0
 * @version 1.0.0
 *


 */
class PRO_Blog_Posts_Widget extends WP_Widget {


	function __construct() {
		$widget_ops = array(
			'classname'   => 'webuild_widget_custom_posts',
			'description' => 'Recent, Popular, Related Blog Posts'
		);
		parent::__construct( 'blog_posts_webuild_widget', '- Blog Posts', $widget_ops );
	}


	function widget( $args, $instance ) {
		global $wp_query, $paged, $post;
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		echo wp_kses_post( $before_widget );
		if ( ! empty( $title ) ) {
			echo wp_kses_post( $before_title . $title . $after_title );
		}
		echo '<div class="webuild_blog_posts_widget">';
		// Query
		$args = array(
			'posts_per_page' => $instance['limit'],
			'post_type'      => 'post',
		);
		if ( $instance['cats'] ) {
			$args['cat'] = $instance['cats'];
		}
		switch ( $instance['type'] ) {
			case 'commented':
				$args['orderby'] = 'comment_count';
				break;
			case 'random':
				$args['orderby'] = 'rand';
				break;
			case 'related':
				$tags = wp_get_post_tags( $post->ID );
				$ids = array();
				if ( ! empty( $tags ) ) {
					foreach ( $tags as $term ) {
						$ids[] = $term->term_id;
					}
				} else {
					$operation = false;
				}
				$args['tag__in'] = $ids;
				$args['post__not_in'] = array( $post->ID );
				$args['orderby'] = 'rand';
				break;
			default:
				$args['orderby'] = 'date';
				break;
		}
		$tmp_query = $wp_query;
		$wp_query = new WP_Query( $args );
		if ( have_posts() ) :
			$with_image = ( ! empty( $instance['display_image'] ) ) ? ' class="with-image"' : '';
			echo '<ul' . $with_image . '>';
			while( have_posts() ) : the_post();
				$format = ( get_post_format() ) ? get_post_format() : 'standard';
				$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'tiny' );
				$image = ( ! empty( $image ) ) ? '<img src="' . esc_url($image[0]) . '" alt="' . get_the_title() . '" />' : '';
				$image = ( $instance['display_image'] ) ? $image : '';
				$categories = get_the_category();
				$post_cats = array();
				if ( ! empty( $categories ) ) {
					foreach ( $categories as $category ) {
						$post_cats[] = $category->name;
					}
				}
				$post_cats = implode( ' &bull; ', $post_cats );
				$li_class = '';
				if ( empty( $image ) ) {
					$li_class = 'class="no-image"';
				}
				echo '<li ' . $li_class . '>';
				echo '<a href="' . esc_url(get_permalink()) . '" title="' . get_the_title() . '">' . $image . get_the_title() . '</a>';
				echo ( $instance['display_date'] ) ? '<span class="post-date"><i class="fa fa-clock-o"></i> ' . get_the_date() . '</span>' : '';
				echo ( $instance['display_category'] ) ? '<span class="post-category"><i class="fa fa-folder-o"></i> ' . $post_cats . '</span>' : '';
				echo '</li>';
			endwhile;
			echo '</ul>';
		endif;
		//wp_reset_query();
		wp_reset_postdata();
		$wp_query = $tmp_query;
		echo '</div><div class="clear"></div>';
		echo wp_kses_post( $after_widget );
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['type'] = $new_instance['type'];
		$instance['cats'] = $new_instance['cats'];
		$instance['limit'] = $new_instance['limit'];
		$instance['display_image'] = $new_instance['display_image'];
		$instance['display_date'] = $new_instance['display_date'];
		$instance['display_category'] = $new_instance['display_category'];

		return $instance;
	}


	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
			'title'            => '',
			'type'             => 'random',
			'cats'             => 0,
			'limit'            => 5,
			'display_image'    => 1,
			'display_date'     => 1,
			'display_category' => 0,
		) );
		$title = $instance['title'];
		$type = $instance['type'];
		$cats = $instance['cats'];
		$limit = $instance['limit'];
		$display_image = $instance['display_image'];
		$display_date = $instance['display_date'];
		$display_category = $instance['display_category'];
		// WIDGET TITLE
		webuild_get_field( array(
			'id'    => $this->get_field_name( 'title' ),
			'name'  => $this->get_field_name( 'title' ),
			'type'  => 'text',
			'title' => 'Widget Title'
		), $title );
		webuild_get_field( array(
			'id'      => $this->get_field_name( 'type' ),
			'name'    => $this->get_field_name( 'type' ),
			'type'    => 'select',
			'title'   => 'Type',
			'options' => array(
				'recent'    => 'Recent Posts',
				'related'   => 'Related Posts',
				'random'    => 'Random Posts',
				'commented' => 'Most Commented Posts',
				'loved'     => 'Most Loved Posts'
			)
		), $type );
		webuild_get_field( array(
			'id'    => $this->get_field_name( 'limit' ),
			'name'  => $this->get_field_name( 'limit' ),
			'type'  => 'text',
			'title' => 'Number of posts to show:'
		), $limit );
		webuild_get_field( array(
			'id'    => $this->get_field_name( 'display_image' ),
			'name'  => $this->get_field_name( 'display_image' ),
			'type'  => 'checkbox',
			'label' => 'Display post image ?'
		), $display_image );
		webuild_get_field( array(
			'id'    => $this->get_field_name( 'display_date' ),
			'name'  => $this->get_field_name( 'display_date' ),
			'type'  => 'checkbox',
			'label' => 'Display post date ?'
		), $display_date );
		webuild_get_field( array(
			'id'    => $this->get_field_name( 'display_category' ),
			'name'  => $this->get_field_name( 'display_category' ),
			'type'  => 'checkbox',
			'label' => 'Display post category ?'
		), $display_category );
	}


}


/**
 *
 * Flickr Widget
 * @since 1.0.0
 * @version 1.0.0
 *


 */
class PRO_DownloadsBtns_Widget extends WP_Widget {


	function __construct() {
		$widget_ops = array( 'classname' => 'webuild_widget_download_btns', 'description' => 'Download buttons' );
		parent::__construct( 'download_btns_webuild_widget', 'Pro - Download buttons', $widget_ops );
	}


	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$uniqid = uniqid();
		$custom_style = '';
		$custom_style .= '.brochure-box-' . $uniqid . '{';
		$custom_style .= ( $instance['btn_color'] ) ? 'background-color:' . $instance['btn_color'] . ';' : '';
		$custom_style .= '}';
		//hover
		$custom_style .= '.brochure-box-' . $uniqid . ':hover{';
		$custom_style .= ( $instance['btn_color_hover'] ) ? 'background-color:' . $instance['btn_color_hover'] . ';' : '';
		$custom_style .= '}';
		$custom_style .= '.brochure-box__text' . $uniqid . '{';
		$custom_style .= 'color:' . $instance['icon_bg_color'] . ';';
		$custom_style .= '}';
		$custom_style .= '.brochure-box-' . $uniqid . ':hover .brochure-box__text' . $uniqid . '{';
		$custom_style .= 'color:' . $instance['icon_bg_color_hover'] . '!important;';
		$custom_style .= '}';
		$custom_style .= '.brochure-box-' . $uniqid . ' i{';
		$custom_style .= ( $instance['icon_color'] ) ? 'color:' . $instance['icon_color'] . ';' : '';
		$custom_style .= '}';
		$custom_style .= '.brochure-box-' . $uniqid . ':hover i{';
		$custom_style .= 'color:' . $instance['icon_color_hover'] . '!important;';
		$custom_style .= '}';
		// add inline style
		webuild_add_inline_style( $custom_style );
		echo wp_kses_post( $before_widget );
		if ( ! empty( $title ) ) {
			echo wp_kses_post( $before_title . $title . $after_title );
		}
		echo '<div class="webuild_download_btns_widget">';
		echo '<div class="brochure-box-cont">';
		echo '<a class="brochure-box brochure-box-' . $uniqid . '" href="' . $instance['link'] . '" target="_blank">';
		if ( $instance['icon_class'] ) {
			echo '<i class="fa  ' . $instance['icon_class'] . '"></i>';
		};
		if ( $instance['btn_text'] ) {
			echo '<h5 class="brochure-box__text brochure-box__text' . $uniqid . '">' . $instance['btn_text'] . '</h5>';
		}
		echo '</a>';
		echo '</div>';
		echo '</div><div class="clear"></div>';
		echo wp_kses_post( $after_widget );
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['link'] = $new_instance['link'];
		$instance['btn_text'] = $new_instance['btn_text'];
		$instance['icon_class'] = $new_instance['icon_class'];
		$instance['icon_color'] = $new_instance['icon_color'];
		$instance['icon_color_hover'] = $new_instance['icon_color_hover'];
		$instance['icon_bg_color']       = $new_instance['icon_bg_color'];
		$instance['icon_bg_color_hover'] = $new_instance['icon_bg_color_hover'];
		$instance['btn_color'] = $new_instance['btn_color'];
		$instance['btn_color_hover'] = $new_instance['btn_color_hover'];

		return $instance;
	}


	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array(
				'title'               => '',
				'link'                => '',
				'btn_text'            => 'Download',
				'icon_class'          => 'fa-cloud-download',
				'icon_color'          => '#ffffff',
				'icon_color_hover'    => '#ffffff',
				'icon_bg_color'       => '#ffffff',
				'icon_bg_color_hover' => '#ffffff',
				'btn_color'           => '#ffffff',
				'btn_color_hover'     => '#ffffff',
			)
		);
		$title = $instance['title'];
		$link = $instance['link'];
		$btn_text = $instance['btn_text'];
		$icon_class = $instance['icon_class'];
		$icon_color       = $instance['icon_color'];
		$icon_color_hover = $instance['icon_color_hover'];
		$icon_bg_color = $instance['icon_bg_color'];
		$icon_bg_color_hover = $instance['icon_bg_color_hover'];
		$btn_color = $instance['btn_color'];
		$btn_color_hover = $instance['btn_color_hover'];
		echo
		"<script>
			( function( $ ){
				function initColorPicker( widget ) {
					widget.find( '.widget-color-picker > input' ).wpColorPicker( {
						change: _.throttle( function() { // For Customizer
							$(this).trigger( 'change' );
						}, 3000 )
					});
				}

				function onFormUpdate( event, widget ) {
					initColorPicker( widget );
				}

				$( document ).on( 'widget-added widget-updated', onFormUpdate );

				$( document ).ready( function() {
					$( '#widgets-right .widget:has(.color-picker)' ).each( function () {
						initColorPicker( $( this ) );
					} );
				} );
			}( jQuery ) );
			</script>";
		webuild_get_field( array(
			'id'    => $this->get_field_name( 'title' ),
			'name'  => $this->get_field_name( 'title' ),
			'type'  => 'text',
			'title' => 'Widget Title'
		), $title );
		webuild_get_field( array(
			'id'    => $this->get_field_name( 'link' ),
			'name'  => $this->get_field_name( 'link' ),
			'type'  => 'text',
			'title' => 'Download link'
		), $link );
		webuild_get_field( array(
			'id'    => $this->get_field_name( 'btn_text' ),
			'name'  => $this->get_field_name( 'btn_text' ),
			'type'  => 'text',
			'title' => 'Button text'
		), $btn_text );
		webuild_get_field( array(
			'id'    => $this->get_field_name( 'icon_class' ),
			'name'  => $this->get_field_name( 'icon_class' ),
			'type'  => 'text',
			'title' => 'Font awesome icon class'
		), $icon_class );
		webuild_get_field( array(
			'id'    => $this->get_field_name( 'icon_color' ),
			'name'  => $this->get_field_name( 'icon_color' ),
			'type'  => 'text',
			'title' => 'Icon color',
			'class' => 'widget-color-picker'
		), $icon_color );
		webuild_get_field( array(
			'id'    => $this->get_field_name( 'icon_color_hover' ),
			'name'  => $this->get_field_name( 'icon_color_hover' ),
			'type'  => 'text',
			'title' => 'Icon color hover',
			'class' => 'widget-color-picker'
		), $icon_color_hover );
		webuild_get_field( array(
			'id'    => $this->get_field_name( 'icon_bg_color' ),
			'name'  => $this->get_field_name( 'icon_bg_color' ),
			'type'  => 'text',
			'title' => 'Text color',
			'class' => 'widget-color-picker'
		), $icon_bg_color );
		webuild_get_field( array(
			'id'    => $this->get_field_name( 'icon_bg_color_hover' ),
			'name'  => $this->get_field_name( 'icon_bg_color_hover' ),
			'type'  => 'text',
			'title' => 'Text color hover',
			'class' => 'widget-color-picker'
		), $icon_bg_color_hover );
		webuild_get_field( array(
			'id'    => $this->get_field_name( 'btn_color' ),
			'name'  => $this->get_field_name( 'btn_color' ),
			'type'  => 'text',
			'title' => 'Button color',
			'class' => 'widget-color-picker'
		), $btn_color );
		webuild_get_field( array(
			'id'    => $this->get_field_name( 'btn_color_hover' ),
			'name'  => $this->get_field_name( 'btn_color_hover' ),
			'type'  => 'text',
			'title' => 'Button hover color',
			'class' => 'widget-color-picker'
		), $btn_color_hover );
	}


}


/**
 *
 * PROFramework Widgets Config
 * @since 1.0.0
 * @version 1.0.0
 *


 */
function custom_widgets_init() {
	register_widget( 'PRO_Blog_Posts_Widget' );
	register_widget( 'PRO_Flickr_Widget' );
	register_widget( 'PRO_Tab_Widget' );
	register_widget( 'PRO_DownloadsBtns_Widget' );
}

add_action( 'widgets_init', 'custom_widgets_init', 2 );


