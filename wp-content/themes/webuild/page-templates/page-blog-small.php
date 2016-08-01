<?php
/**
 *
 * Blog Layout "Alternative"
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col-md-4">
			<div class="entry-meta">
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
						echo wp_kses_post( $webuild_title );
						break;
					case 'gallery':
						echo webuild_post_gallery( get_the_content() );
						break;
					default:
						webuild_post_thumbnail();
						break;
				} ?>
			</div>
			</header>
		</div>
		<div class="col-md-8">
			<header class="entry-header">
				<?php
				if ( $post_format != 'link' ) {
					the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><h2 class="entry-title">', '</h2></a>' );
				}
				?>
				<div class="entry-category"><?php webuild_post_categories(); ?></div>
			</header>
			<div class="post-excerpt entry-summary">
				<?php the_excerpt(); ?>
			</div>
			<div class="entry-meta-footer bottom">
				<?php webuild_medium_type_meta(); ?>
			</div>
		</div>
	</div>
</article>
<!-- /post-standard -->