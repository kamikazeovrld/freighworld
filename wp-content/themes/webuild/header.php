<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package apro
 */
?>
	<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<?php global $apro_options;  // declare the global options ?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php wp_title('') ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php
		if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
			webuild_favicons();
		}
		?>
		<?php wp_head(); ?>
	</head>
<body <?php body_class(); ?>>
<?php
if ( $apro_options['loader'] ) {
	echo webuild_loader();
}
?>

<div id="page" class="hfeed site">

<?php webuild_search_box(); ?>
<?php webuild_rev_slider( 'above', $apro_options['slider-position'], $apro_options['slide-template'] ); ?>
<?php webuild_header() ?>
<?php webuild_rev_slider( 'below', $apro_options['slider-position'], $apro_options['slide-template'] ); ?>
	<div id="content-wrapper" class="site-content">
<?php webuild_title_bar(); ?>