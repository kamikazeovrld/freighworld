<?php
/**
 * For full documentation, please visit: http://docs.reduxframework.com/
 * For a more extensive sample-config file, you may look at:
 * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
 */
if ( ! class_exists( 'Redux' ) ) {
	return;
}
global $allowed_html;
// This is your option name where all the Redux data is stored.
$opt_name = "apro_options";
/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */
$theme = wp_get_theme(); // For use with some settings. Not necessary.
$args = array(
	'opt_name'              => 'apro_options',
	'use_cdn'               => true,
	'page_slug'             => 'webuild_options',
	'page_title'            => 'Theme Options',
	'update_notice'         => true,
	'intro_text'            => '',
	'footer_text'           => '<p>Support for the WeBuild Theme <a href="https://support.netbee.co/" target="_blank">here</a></p>',
	'admin_bar'             => true,
	'class'                 => 'apro_options',
	'menu_type'             => 'menu',
	'menu_title'            => 'Theme Options',
	'allow_sub_menu'        => true,
	'page_parent_post_type' => 'your_post_type',
	'customizer'            => false,
	'default_mark'          => '',
	'hints'                 => array(
		'icon_position' => 'right',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color' => 'light',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'duration' => '500',
				'event'    => 'mouseleave unfocus',
			),
		),
	),
	'output'                => true,
	'output_tag'            => true,
	'settings_api'          => true,
	'cdn_check_time'        => '1440',
	'page_icon'             => 'icon-themes',
	'compiler'              => true,
	'page_permissions'      => 'manage_options',
	'save_defaults'         => true,
	'show_import_export'    => false,
	'transient_time'        => '3600',
	'network_sites'         => true,
	'display_name'          => '<img width="173" height="70" src="' . get_template_directory_uri() . '/images/proadvertise-retina-logo.png">',
	'dev_mode'              => false,
	'display_version'       => $theme->get( 'Version' )
);
// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
$args['share_icons'][] = array(
	'url'   => 'https://www.facebook.com/proadvertise.co.uk',
	'title' => 'Like us on Facebook',
	'icon'  => 'fa fa-facebook'
);
$args['share_icons'][] = array(
	'url'   => 'https://twitter.com/NetBee_co',
	'title' => 'Follow us on Twitter',
	'icon'  => 'fa fa-twitter'
);
$args['share_icons'][] = array(
	'url'   => 'https://www.youtube.com/user/proadvertise',
	'title' => 'Find us on LinkedIn',
	'icon'  => 'fa fa-youtube'
);
Redux::setArgs( $opt_name, $args );
/*
 * ---> END ARGUMENTS
 */
/*
 * ---> START HELP TABS
 */
$tabs = array(
	array(
		'id'      => 'redux-help-tab-1',
		'title'   => esc_html__( 'Theme Information 1', 'admin_folder' ),
		'content' => wp_kses(__( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' ),$allowed_html)
	),
	array(
		'id'      => 'redux-help-tab-2',
		'title'   => esc_html__( 'Theme Information 2', 'admin_folder' ),
		'content' => wp_kses(__( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' ),$allowed_html)
	)
);
Redux::setHelpTab( $opt_name, $tabs );
// Set the help sidebar
$content = wp_kses(__( '<p>This is the sidebar content, HTML is allowed.</p>', 'admin_folder' ),$allowed_html);
Redux::setHelpSidebar( $opt_name, $content );
/*
 * <--- END HELP TABS
 */
/*
 *
 * ---> START SECTIONS
 *
 */
$sections = array(
	'general',
	'page-loader',
	'header',
	'logo',
	'menu',
	'footer',
	'page-title-bar',
	'typography',
	'styling',
	'blog',
	'portfolio',
	'social-media',
	'sidebar',
	'advanced',
	'404',
	'woocommerce',
	'theme-update'
);
foreach ( $sections as $section ) {
	include 'options-sections/' . $section . '.php';
}
/*
 * <--- END SECTIONS
 */
add_filter( 'redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3 );
function compiler_action( $options, $css ) {
	$css = modified_css( $options, $css );
	// Demo of how to use the dynamic CSS and write your own static CSS file
	$filename = get_template_directory() . '/css/dynamic' . '.css';
	global $wp_filesystem;
	if ( empty( $wp_filesystem ) ) {
		require_once( ABSPATH . '/wp-admin/includes/file.php' );
		WP_Filesystem();
	}
	if ( $wp_filesystem ) {
		$wp_filesystem->put_contents( $filename, $css, FS_CHMOD_FILE // predefined mode settings for WP files
		);
	}
}

function newIconFont() {
	// Uncomment this to remove elusive icon from the panel completely
	wp_register_style( 'redux-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css', array(), time(), 'all' );
	wp_enqueue_style( 'redux-font-awesome' );
}

add_action( 'redux/page/' . $opt_name . '/enqueue', 'newIconFont' );