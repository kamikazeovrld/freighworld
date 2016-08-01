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
	<div class="<?php echo esc_attr( $container ) ?> cont-padding">
		<div class="row">
			<?php webuild_page_sidebar( 'left', $layout, $lsidebar ); ?>
			<div class="col-md-<?php echo esc_attr( $webuild_page_column ) ?>">
				<div class="page-content">
					<?php
					// Start the Loop.
					while( have_posts() ) : the_post();
						webuild_page_featured_image();
						the_content();
						do_action( 'webuild_page_end' );
					endwhile;
					global $post;
					if ( 'open' == $post->comment_status && $apro_options['blog_comments'] ):
						comments_template( '', true );
					endif;
					?>
				</div>
			</div>
			<?php webuild_page_sidebar( 'right', $layout, $rsidebar ); ?>
		</div>
	</div>
<?php
get_footer();