<?php

/**
 *
 * Template Name: Blank - No Header, No Footer
 *
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php global $apro_options;  // declare the global options ?>
	<title>
		<?php wp_title( '|', true, 'right' ); ?>
	</title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php webuild_rev_slider( 'above', $apro_options['slider-position'], $apro_options['slide-template'] ); ?>
	<div id="content" class="site-content">
		<?php
		if ( $apro_options['page-title-bar'] ) {
			get_template_part( 'pro-framework/template-parts/image-header' );
		}
		?>
		<div class="container cont-padding">
			<?php
			while( have_posts() ) : the_post();
				the_content();
			endwhile;
			?>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>

