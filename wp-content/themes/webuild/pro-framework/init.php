<?php
#-----------------------------------------------------------------#
# Default theme constants
#-----------------------------------------------------------------#
defined( 'THEME_NAME' ) or define('THEME_NAME', 'webuild' );
defined( 'THEME_DIR' ) or define( 'THEME_DIR', get_template_directory() );
defined( 'THEME_URI' ) or define( 'THEME_URI', get_template_directory_uri() );
defined( 'FRAMEWORK_DIR' ) or define( 'FRAMEWORK_DIR', THEME_DIR . '/pro-framework' );
defined( 'FRAMEWORK_URI' ) or define( 'FRAMEWORK_URI', THEME_URI . '/pro-framework' );
defined( 'FRAMEWORK_ASSETS' ) or define( 'FRAMEWORK_ASSETS', THEME_URI . '/pro-framework/assets' );
defined( 'FRAMEWORK_INCLUDE_DIR' ) or define( 'FRAMEWORK_INCLUDE_DIR', THEME_DIR . '/pro-framework/includes' );
defined( 'FRAMEWORK_INCLUDE_URI' ) or define( 'FRAMEWORK_INCLUDE_URI', THEME_URI . '/pro-framework/includes' );
defined( 'FRAMEWORK_PLUGIN_DIR' ) or define( 'FRAMEWORK_PLUGIN_DIR', THEME_DIR . '/pro-framework/plugins' );
defined( 'FRAMEWORK_PLUGIN_URI' ) or define( 'FRAMEWORK_PLUGIN_URI', THEME_URI . '/pro-framework/plugins' );
defined( 'FRAMEWORK_HEADERS_DIR' ) or define( 'FRAMEWORK_HEADERS_DIR', THEME_DIR . '/pro-framework/headers' );
defined( 'FRAMEWORK_HEADERS_URI' ) or define( 'FRAMEWORK_HEADERS_URI', THEME_URI . '/pro-framework/headers' );
defined( 'REDUX_OPTION_NAME' ) or define( 'REDUX_OPTION_NAME', 'apro_options' );
include_once( get_template_directory() . '/pro-framework/config/pro-redux-helpers.php');
include_once( get_template_directory() . '/pro-framework/config/pro-helper-functions.php');
// redux fields
include_once( get_template_directory() . '/admin/admin-init.php' );
Redux::init( REDUX_OPTION_NAME ); //https://github.com/reduxframework/redux-framework/issues/2306
include_once( get_template_directory() . '/pro-framework/classes/pro-framework-abstract.class.php');
include_once( get_template_directory() . '/pro-framework/classes/pro-framework-mega-menu-api.php');
include_once( get_template_directory() . '/pro-framework/classes/pro-framework-post-types-api.php');
// is admin init
function is_admin_init() {
	// admin class
	include_once( get_template_directory() . '/pro-framework/classes/pro-framework-actions-api.php');
}
add_action( 'admin_init', 'is_admin_init' );
// functions
include_once( get_template_directory() . '/pro-framework/config/pro-includes-config.php');
include_once( get_template_directory() . '/pro-framework/config/pro-enqueue.php');
include_once( get_template_directory() . '/pro-framework/config/pro-filters-config.php');
include_once( get_template_directory() . '/pro-framework/config/pro-actions-config.php');
include_once( get_template_directory() . '/pro-framework/config/pro-template-functions.php');
include_once( get_template_directory() . '/pro-framework/config/pro-front-end-functions.php');
include_once( get_template_directory() . '/pro-framework/config/pro-post-formats-helper.php');
include_once( get_template_directory() . '/pro-framework/classes/pro-framework-sidebars-api.php');
include_once( get_template_directory() . '/pro-framework/config/pro-widgets-config.php');

?>