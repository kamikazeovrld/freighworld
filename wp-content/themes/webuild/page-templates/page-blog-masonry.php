<?php
/**
 *
 * Blog Layout "Masonry"
 *
 */
global $apro_options;
?>
<article
	id="post-<?php the_ID(); ?>" <?php post_class( 'isotope-item ' . webuild_get_bootstrap( $apro_options['blog_column'] ) ); ?>>
	<?php
	$post_format = get_post_format();
	switch ( $post_format ) {
		case 'audio':
			webuild_post_thumbnail();
			echo webuild_post_media( get_the_content() );
			break;
		case 'video':
			echo webuild_post_media( get_the_content() );
			break;
		case 'link':
			$webuild_format = webuild_post_format_link_helper( get_the_content(), get_the_title() );
			$webuild_title = $webuild_format['title'];
			// if has post thumbnail, add link for thumbnail
			if ( has_post_thumbnail() ) {
				$webuild_link = webuild_get_link_attributes( $webuild_title );
				webuild_post_thumbnail( $webuild_link );
			}
			break;
		case 'gallery':
			echo webuild_post_gallery( get_the_content() );
			break;
		default:
			webuild_post_thumbnail();
			break;
	}
	global $more;
	$more = 0;
	?>
	<div class="blog-masonry-border">
		<header class="entry-header">
			<?php if ( ! is_single() && $post_format != 'link' ) {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			} ?>

			<?php if ( $post_format == 'link' ) {
				echo wp_kses_post( $webuild_title );
			} ?>
			<div class="entry-category"><?php webuild_post_categories(); ?></div>
		</header>
		<!-- /entry-header -->
		<div class="post-excerpt entry-summary">
			<?php the_excerpt(); ?>
		</div>
		<div class="entry-meta-footer">
			<?php webuild_grid_type_meta(); ?>
		</div>
	</div>
</article>
<!-- /post-standard -->