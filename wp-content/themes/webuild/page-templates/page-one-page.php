<?php
/**
 *
 * Template Name: One-Page Template
 *
 */
get_header();
?>
	<div class="container cont-padding">
		<div class="row">
			<div class="col-md-12">
				<?php
				if ( have_posts() ) : ?>
					<?php while( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<!-- col-md-12 -->
		</div>
		<!-- row -->
	</div><!-- container-->
<?php
//
// Fixed Navigation
// -------------------------------------------------------------------------------------------
$webuild_location = apply_filters( 'webuild_one_page_location', 'one_page' );
if ( ( $webuild_locations = get_nav_menu_locations() ) && isset( $webuild_locations[ $webuild_location ] ) ) {
	$webuild_menu_object = wp_get_nav_menu_object( $webuild_locations[ $webuild_location ] );
	if ( is_object( $webuild_menu_object ) ) {
		$webuild_menu_items = wp_get_nav_menu_items( $webuild_menu_object->term_id );
		$webuild_nav_list = '<nav id="pro-fixed-nav">';
		$webuild_nav_list .= '<ul>';
		if ( ! empty( $webuild_menu_items ) ) {
			foreach ( $webuild_menu_items as $webuild_menu_item ) {
				$webuild_nav_list .= '<li><a href="' . $webuild_menu_item->url . '" data-toggle="tooltip" data-original-title="' . $webuild_menu_item->title . '" data-placement="left"></a></li>';
			}
		}
		$webuild_nav_list .= '</ul>';
		$webuild_nav_list .= '</nav><!-- /pro-fixed-nav -->';
		echo wp_kses_post( $webuild_nav_list );
	}
}
?>
<?php get_footer(); ?>