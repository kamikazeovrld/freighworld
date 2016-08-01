<?php
/**
 * Template Name: Left Sidebar Page
 */
get_header();
global $apro_options;
$lsidebar = $apro_options["sidebar-left"];
$layout = 'left';
?>
	<div class="container cont-padding">
		<div class="row">
			<?php webuild_page_sidebar( 'left', $layout, $lsidebar ); ?>
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
		</div>
		<!-- row -->
	</div><!-- container-fluid-->
<?php
get_footer();

