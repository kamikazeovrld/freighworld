<?php
global $apro_options;
if ( ! is_404() && ! is_home() ) {
	?>
	<div class="page-title-cont container-fluid" <?php if ( $apro_options['page-title-fading'] ) {
		echo 'data-effect="parallax"';
	} ?>>
		<div class="row">
			<div class="page-header">
				<?php echo webuild_background( $apro_options['background-image-page-title'], $apro_options['page-title-parallax'] ); ?>
				<div class="overlay"></div>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-md-12 display-table">
							<div class="title-wrapper fadeIn">
								<?php if ( $apro_options['page-title-switch'] ) { ?>
									<h1>
										<?php
										if ( $apro_options['custom-title-switch'] ) {
											echo wp_kses_post( $apro_options['custom-title'] );
										} else {
											if ( is_category() ) :
												single_cat_title();
											elseif ( is_tag() ) :
												single_tag_title();
											elseif ( is_author() ) :
												printf( esc_html__( 'Author: %s', THEME_NAME ), '<span class="vcard">' . get_the_author() . '</span>' );
											elseif ( is_day() ) :
												printf( esc_html__( 'Day: %s', THEME_NAME ), '<span>' . get_the_date() . '</span>' );
											elseif ( is_month() ) :
												printf( esc_html__( 'Month: %s', THEME_NAME ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', THEME_NAME ) ) . '</span>' );
											elseif ( is_year() ) :
												printf( esc_html__( 'Year: %s', THEME_NAME ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', THEME_NAME ) ) . '</span>' );
											elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
												esc_html_e( 'Asides', THEME_NAME );
											elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
												esc_html_e( 'Galleries', THEME_NAME );
											elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
												esc_html_e( 'Images', THEME_NAME );
											elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
												esc_html_e( 'Videos', THEME_NAME );
											elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
												esc_html_e( 'Quotes', THEME_NAME );
											elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
												esc_html_e( 'Links', THEME_NAME );
											elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
												esc_html_e( 'Statuses', THEME_NAME );
											elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
												esc_html_e( 'Audios', THEME_NAME );
											elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
												esc_html_e( 'Chats', THEME_NAME );
											elseif ( is_search() ) :
												printf( esc_html__( 'Search Results for: %s', THEME_NAME ), get_search_query() );
											elseif ( is_woocommerce_shop() ) :
												$webuild_post_id = wc_get_page_id( 'shop' );
												echo get_the_title( $webuild_post_id );
											elseif ( is_archive() ) :
												esc_html_e( 'Archives', THEME_NAME );
											else :
												the_title();
											endif;
										}; ?>
									</h1>
								<?php }; ?>

								<?php if ( $apro_options['custom-slogan-switch'] ) { ?>
									<span> <?php echo wp_kses_post( $apro_options['custom-slogan'] ); ?> </span>
								<?php }; ?>
							</div>
							<?php
							// @todo don`t initialize breadcrumbs if on mobile device
							if ( $apro_options['display-breadcrumbs'] ) { ?>
								<div class="pro-breadcrumb <?php if ( $apro_options['hide-breadcrumbs-mobile'] ) {
									echo 'hidden-mobile';
								} ?>">
									<div class="pro-inner">
										<?php
										if ( function_exists( 'bcn_display' ) ) {
											bcn_display();
										}
										?>
									</div>
								</div>
							<?php }; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }; ?>