<?php
/**
 *
 * The template for displaying posts in the Image post format
 * @since 1.0
 * @version 1.2.0
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	$webuild_format = webuild_post_format_link_helper( get_the_content(), get_the_title() );
	$webuild_title = $webuild_format['title'];
	?>
	<div class="row">
		<div class="col-md-12">
			<?php // if has post thumbnail, add link for thumbnail
			if ( has_post_thumbnail() ) {
				$webuild_link = webuild_get_link_attributes( $webuild_title );
				webuild_post_thumbnail( $webuild_link );
			} ?>
			<div class="col-md-12" style="padding-left:0px;padding-right:0px;">
				<?php webuild_full_top_meta( $post ); ?>
			</div>
			<div class="border">
				<?php if ( ! is_single() ) : ?>
					<div class="post-excerpt entry-summary"><?php global $apro_options; echo sin_excerpt($apro_options['excerpt-length']); ?></div><!-- /entry-summary -->
				<?php else : ?>
					<div
						class="post-excerpt entry-content"><?php echo get_the_content( esc_html__( 'Read More', THEME_NAME ) ); ?></div><!-- /entry-content -->
					<div class="entry-meta-footer">
						<?php webuild_post_tags(); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php do_action( 'webuild_post_format_content_after', $post ); ?>
</article><!-- /post-link -->