<?php
/**
 * Template Name: Right and Left Sidebar
 */
get_header(); ?>
<?php
global $apro_options;
$rsidebar = $apro_options["sidebar-right"];
$lsidebar = $apro_options["sidebar-left"];
$layout = 'both';
?>
	<div class="container cont-padding">
		<div class="row">
			<?php webuild_page_sidebar( 'left', $layout, $lsidebar ); ?>
			<div class="col-md-6">
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
			<!-- col-md-6 -->
			<?php webuild_page_sidebar( 'right', $layout, $rsidebar ); ?>
		</div>
		<!-- row -->
	</div><!-- container-fluid-->
<?php
get_footer();