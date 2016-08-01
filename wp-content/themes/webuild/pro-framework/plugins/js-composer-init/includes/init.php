<?php
/**
 *
 * Visual Composer Plugin before init
 *
 */

$dir = FRAMEWORK_INCLUDE_DIR . '/shortcodes/vc';
vc_set_shortcodes_templates_dir( $dir );

if( ! function_exists( 'pro_vc_before_init' ) ) {
  function pro_vc_before_init() {

    vc_set_as_theme(true);
    vc_set_default_editor_post_types( array( 'page', 'post', 'portfolio' ) );

    include_once( FRAMEWORK_PLUGIN_DIR . '/js-composer-init/includes/map.php' );

  }
  add_action( 'vc_before_init', 'pro_vc_before_init' );
}

/**
 *
 * Visual Composer Plugin after init
 *
 */
if( ! function_exists( 'pro_vc_after_init' ) ) {
  function pro_vc_after_init() {

    if( ! vc_license()->isActivated() ) {
      remove_action( 'upgrader_pre_download', array( vc_updater(), 'preUpgradeFilter' ) );
    }

  }
  add_action( 'vc_after_init', 'pro_vc_after_init' );
}