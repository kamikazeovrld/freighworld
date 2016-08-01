<?php
/**
 * Template Name: Right Sidebar Page
 */
get_header(); ?>
<?php
global $apro_options;
$rsidebar = $apro_options["sidebar-right"];

//$rsidebar = ($rsidebar != '') ? $apro_options['sidebar-right'] : '';
$layout = 'right';
?>
	<div class="container cont-padding">
		<div class="row">
			<div class="col-md-9">
				<?php
				// Start the Loop.
				if ( have_posts() ) : ?>
					<?php while( have_posts() ) : the_post(); ?>
						<?php
						the_content();
						?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<!-- col-md-9 -->
			<?php webuild_page_sidebar( 'right', $layout, $rsidebar ); ?>
		</div>
		<!-- row -->
	</div><!-- container-fluid-->
<?php
get_footer();

