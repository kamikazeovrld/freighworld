<?php
/**
 *
 * The Template for displaying all single posts.
 * @since 1.0.0
 * @version 1.0.0
 *
 */
get_header();
global $apro_options;
$rsidebar = $apro_options["sidebar-right"];
$lsidebar = $apro_options["sidebar-left"];
$layout = $apro_options["layout"];

if ( $layout == 'full' || $layout == 'full-100' ) {
	$webuild_page_column = '12';
} else if ( $layout == 'left' || $layout == 'right' ) {
	$webuild_page_column = '9';
} else if ( $layout == 'both' ) {
	$webuild_page_column = '6';
}
$container = $layout == 'full-100' ? "container-fluid" : "container";
?>
	<div class="single-portofolio">
		<div class="<?php echo esc_attr( $container ) ?> cont-padding">
			<div class="row">
				<?php webuild_page_sidebar( 'left', $layout, $lsidebar ); ?>
				<div class="col-md-<?php echo esc_attr( $webuild_page_column ); ?>">
					<div class="page-content">
						<?php
						while( have_posts() ) : the_post();
							the_content();
							do_action( 'webuild_portfolio_format_content_after', $post );
							webuild_link_pages();
							if ( ( $apro_options['show-comments-portofolio'] ) && ( comments_open() || '0' != get_comments_number() ) ) {
								comments_template( '', true );
							}
							do_action( 'webuild_portfolio_item_end' );
						endwhile;
						?>
					</div>
				</div>
				<?php
				if ( $apro_options['show-previous-next-pagination'] ) {
					// prev and next posts
					$webuild_prev = get_previous_post( true, null, 'portfolio-category' );
					$webuild_next = get_next_post( true, null, 'portfolio-category' );
					?>
					<nav class="nav-portfolio">
						<?php if ( ! empty( $webuild_prev ) ): ?>
							<a class="pro-prev" href="<?php echo esc_url(get_permalink( $webuild_prev->ID )); ?>">
								<i class="fa fa-chevron-left"></i>

			  <span class="pro-wrap">

				<span class="pro-title"><?php echo wp_kses_post( $webuild_prev->post_title ); ?></span>
				  <?php echo get_the_post_thumbnail( $webuild_prev->ID, array( 80, 80 ) ); ?>

			  </span>
							</a>
						<?php endif; ?>

						<?php if ( ! empty( $webuild_next ) ): ?>
							<a class="pro-next" href="<?php echo esc_url(get_permalink( $webuild_next->ID )); ?>">
								<i class="fa fa-chevron-right"></i>

			  <span class="pro-wrap">

				<span class="pro-title"><?php echo wp_kses_post( $webuild_next->post_title ); ?></span>
				  <?php echo get_the_post_thumbnail( $webuild_next->ID, array( 80, 80 ) ); ?>

			  </span>
							</a>
						<?php endif; ?>
					</nav>
				<?php }; ?>

				<?php webuild_page_sidebar( 'right', $layout, $rsidebar ); ?>
			</div>
		</div>
	</div>
<?php
get_footer();