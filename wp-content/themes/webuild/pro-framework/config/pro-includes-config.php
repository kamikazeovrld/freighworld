<?php
/**
 *
 * Load all of shortcode from folder
 * @since 1.0.0
 * @version 1.1.0
 *
 */

//
// Require plugin.php to use is_plugin_active() below
// ----------------------------------------------------------------------------------------------------
if ( ! function_exists( 'is_plugin_active' ) ) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

//
// Load Shortcodes
// ----------------------------------------------------------------------------------------------------
foreach ( glob( FRAMEWORK_INCLUDE_DIR . '/shortcodes/pro_*.php' ) as $shortcode ) {
	include_once( get_template_directory() . '/pro-framework/includes/shortcodes/' . basename( $shortcode ));
}

//
// Custom Style Adapted
// ----------------------------------------------------------------------------------------------------
include_once( get_template_directory() . '/pro-framework/includes/custom-style.php');
//
// woocommerce integration
// ----------------------------------------------------------------------------------------------------
if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
	include_once( get_template_directory() . '/pro-framework/plugins/woocommerce/woocommerce-config.php');
	include_once( get_template_directory() . '/pro-framework/plugins/woocommerce/pro-woo-widgets-config.php');
}
//
// Visual Composer integration
// ----------------------------------------------------------------------------------------------------
if ( is_vc_activated() ) {
	include_once( get_template_directory() . '/pro-framework/plugins/js-composer-init/includes/init.php');
}
//
// WeBuild Theme Check
// ----------------------------------------------------------------------------------------------------
$username = webuild_get_option( 'themeforest-username' );
$apikey = webuild_get_option( 'themeforest-api-key' );
if ( ! empty( $username ) && ! empty( $apikey ) ) {
	include_once( get_template_directory() . '/pro-framework/plugins/webuild-theme-updater/webuild-theme-updater.php');
}