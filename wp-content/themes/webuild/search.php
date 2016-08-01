<?php
/**
 *
 * The template for displaying search pages.
 * @since 1.0.0
 * @version 1.0.0
 *
 */
get_header(); ?>
<div class="container cont-padding">
	<div class="row">
		<?php
		if ( have_posts() ) {
			?>
			<div class="col-md-9">
				<?php
				// loop posts
				while( have_posts() ) : the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>"
							                           rel="bookmark"><?php the_title(); ?></a></h2>
							<div class="entry-meta">
								<?php webuild_posted_on(); ?>
							</div>
						</header>
						<!-- /entry-header -->
						<div class="entry-summary"><?php the_excerpt(); ?></div>
						<!-- /entry-summary -->
					</article><!-- /post-standard -->
					<?php
				endwhile;
				// pagination
				webuild_paging_nav( array( 'nav' => 'archive' ) );
				?>
			</div>
			<?php webuild_page_sidebar(); ?>
			<?php
		} else {
			// If no content, include the "No posts found" template.
			get_template_part( 'post-formats/content', 'none' );
		};
		?>
	</div>
</div>
<?php get_footer(); ?>

