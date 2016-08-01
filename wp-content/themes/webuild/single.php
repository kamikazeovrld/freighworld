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
$p_rsidebar = redux_post_meta( "apro_options", get_the_ID(), "sidebar-right" );
$p_lsidebar = redux_post_meta( "apro_options", get_the_ID(), "sidebar-right" );
$p_layout = redux_post_meta( "apro_options", get_the_ID(), "layout" );

$apro_options['single-sidebar-right'] = isset($apro_options['single-sidebar-right']);
$global_rsidebar  =  isset($apro_options['single-sidebar-right']) ? $apro_options['single-sidebar-right'] : NULL;
$global_lsidebar  =  isset($apro_options['single-sidebar-left']) ? $apro_options['single-sidebar-left'] : NULL;
$rsidebar = $p_rsidebar ? $p_rsidebar : $global_rsidebar;
$lsidebar = $p_lsidebar ? $p_lsidebar : $global_lsidebar;
$layout = $p_layout ? $p_layout : $apro_options['single-layout'];

if ( $layout == 'full' || $layout == 'full-100' ) {
	$webuild_page_column = '12';
} else if ( $layout == 'left' || $layout == 'right' ) {
	$webuild_page_column = '9';
} else if ( $layout == 'both' ) {
	$webuild_page_column = '6';
}
$container = $layout == 'full-100' ? "container-fluid" : "container";
?>
	<div class="<?php echo esc_attr( $container ) ?> cont-padding blog-default single-post">
		<div class="row">
			<?php webuild_page_sidebar( 'left', $layout, $lsidebar ); ?>
			<div class="col-md-<?php echo esc_attr( $webuild_page_column ); ?>">
				<div class="page-content">
					<?php
					while( have_posts() ) : the_post();
						get_template_part( 'post-formats/content', get_post_format() );
						if ( $apro_options['blog_single_nav'] ) {
							webuild_post_nav();
						}
						if ( 'open' == $post->comment_status && $apro_options['blog_comments'] ):
							comments_template( '', true );
						endif;
					endwhile;
					?>
				</div>
			</div>
			<?php webuild_page_sidebar( 'right', $layout, $rsidebar ); ?>
		</div>
	</div>
<?php
get_footer();