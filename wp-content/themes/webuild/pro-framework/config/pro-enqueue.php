<?php
/**
 *
 * Admin Enqueue
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function webuild_admin_scripts() {
	wp_register_script( 'webuild-royalslider', THEME_URI . '/js/vendor/jquery.royalslider.min.js', array( 'jquery' ), '9.5.1', true );
	wp_enqueue_media();
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_style( 'webuild-chosen', FRAMEWORK_ASSETS . '/css/chosen.css', array(), '3.0.3', 'all' );
	wp_enqueue_style( 'pro-framework', FRAMEWORK_ASSETS . '/css/pro-framework.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'pro-alert', FRAMEWORK_ASSETS . '/css/pro-alert.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'wp-jquery-ui-dialog' );
	wp_enqueue_style( 'pro-font-awesome', THEME_URI . '/css/vendor/font-awesome.css' );
	wp_enqueue_style( 'webuild-icomoon', THEME_URI . '/css/vendor/icomoon.css' );
	wp_enqueue_script( 'pro-framework', FRAMEWORK_ASSETS . '/js/pro-framework.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'webuild-chosen', FRAMEWORK_ASSETS . '/js/chosen.jquery.min.js', array( 'jquery' ), '1.0.0', true );
}

add_action( 'admin_enqueue_scripts', 'webuild_admin_scripts' );
/**
 * Enqueue styles
 * @since 1.0.0
 * @version 1.0.0
 */
function webuild_styles() {
	global $apro_options;
	wp_register_style( 'webuild-dynamic', get_template_directory_uri() . '/css/dynamic.css' );
	wp_register_style( 'webuild-bootstrap', THEME_URI . '/css/vendor/bootstrap.css' );
	wp_register_style( 'webuild-main-style', THEME_URI . '/css/style.css' );
	wp_register_style( 'webuild-pro-framework', FRAMEWORK_ASSETS . '/css/pro-framework.css', array(), '1.0.0', 'all' );
	wp_register_style( 'webuild-shortcodes', THEME_URI . '/css/vendor/shortcodes.css' );
	wp_register_style( 'webuild-pro-font-awesome', THEME_URI . '/css/vendor/font-awesome.css' );
	wp_register_style( 'webuild-icomoon', THEME_URI . '/css/vendor/icomoon.css' );
	wp_register_style( 'webuild-responsive', THEME_URI . '/css/responsive.css' );
	wp_register_style( 'webuild-slick', '//cdn.jsdelivr.net/jquery.slick/1.5.6/slick.css' );
	wp_register_style( 'webuild-royalslider', THEME_URI . '/css/vendor/royalslider.css' );
	wp_register_style( 'webuild-royalslider', THEME_URI . '/css/vendor/royalslider.css' );
	wp_enqueue_style( 'webuild-royalslider' );
	wp_enqueue_style( 'webuild-reset', get_stylesheet_uri() );
	wp_enqueue_style( 'webuild-bootstrap' );
	wp_enqueue_style( 'webuild-pro-font-awesome' );
	wp_enqueue_style( 'webuild-pro-framework' );
	wp_enqueue_style( 'webuild-pro-fancybox', THEME_URI . '/css/vendor/fancybox.css', array(), null );
	wp_enqueue_style( 'webuild-shortcodes' );
	wp_enqueue_style( 'webuild-menu' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style( 'webuild-slick' );
	wp_enqueue_style( 'webuild-icomoon' );
	wp_enqueue_style( 'webuild-main-style' );
	wp_enqueue_style( 'webuild-responsive' );
	wp_enqueue_style( 'webuild-dynamic' );
	wp_add_inline_style( 'webuild-dynamic', page_modified_css() );
	wp_add_inline_style( 'webuild-dynamic', webuild_custom_css() );
	if ( is_child_theme() ) {
		wp_enqueue_style( 'webuild-webuild', get_stylesheet_uri() );
	}
}

add_action( 'wp_enqueue_scripts', 'webuild_styles');
/**
 * Enqueue scripts
 */
function webuild_scripts() {
	global $apro_options;
	if ( ! is_admin() ) {
		$dev = false;
		// Register
		wp_register_script( 'webuild-royalslider', THEME_URI . '/js/vendor/jquery.royalslider.min.js', array( 'jquery' ), '9.5.1', true );
		wp_register_script( 'webuild-modernizr', THEME_URI . '/js/vendor/modernizr.custom.js', array(), '1.0.0' );
		wp_register_script( 'webuild-bootstrap', THEME_URI . '/js/vendor/bootstrap.min.js', array( 'jquery' ), '1.0.0', true );
		wp_register_script( 'webuild-menu', THEME_URI . '/js/menu.js', array( 'jquery' ), '1.0.0', true );
		
		if ( $dev ) {
			wp_register_script( 'webuild-plugins-waypoints', THEME_URI . '/js/vendor/waypoints.min.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'webuild-plugins-fancybox', THEME_URI . '/js/vendor/fancybox.min.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'webuild-plugins-isotope', THEME_URI . '/js/vendor/isotope.min.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'webuild-plugins-tooltip', THEME_URI . '/js/vendor/tooltip.min.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'webuild-plugins-imagesloaded', THEME_URI . '/js/vendor/images-loaded.min.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'webuild-plugins-scrollto', THEME_URI . '/js/vendor/jquery.scrollTo.min.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'webuild-plugins-localScroll', THEME_URI . '/js/vendor/jquery.localScroll.min.js', array(
				'jquery',
				'webuild-plugins-scrollto'
			), '1.0.0', true );
			wp_register_script( 'webuild-plugins-exists', THEME_URI . '/js/vendor/exists.min.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'webuild-plugins-hoverIntent', THEME_URI . '/js/vendor/hoverIntent.min.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'webuild-plugins-superfish', THEME_URI . '/js/vendor/custom.superfish.min.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'webuild-plugins-stellar', THEME_URI . '/js/vendor/jquery.stellar.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'webuild-plugins-transit', THEME_URI . '/js/vendor/jquery.transit.min.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'webuild-plugins-transit', THEME_URI . '/js/vendor/jquery.transit.min.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'webuild-plugins-customSelect', THEME_URI . '/js/vendor/customSelect.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'webuild-plugins-throttledresize', THEME_URI . '/js/vendor/jquery.throttledresize.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'webuild-plugins-debouncedresize', THEME_URI . '/js/vendor/jquery.debouncedresize.js', array( 'jquery' ), '1.0.0', true );
			wp_register_script( 'webuild-plugins-match-height', THEME_URI . '/js/vendor/jquery-match-height.js', array( 'jquery' ), '1.0.0', true );
		} else {
			wp_register_script( 'webuild-plugins-min', THEME_URI . '/js/jquery.plugins.min.js', array( 'jquery' ), '1.0.0', true );
		}
		wp_register_script( 'webuild-script', THEME_URI . '/js/jquery.script.js', array( 'jquery' ), '1.0.0', true );

		// Enqueue
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'webuild-bootstrap' );
		wp_enqueue_script( 'webuild-modernizr' );
		wp_enqueue_script( 'webuild-slick', '//cdn.jsdelivr.net/jquery.slick/1.5.6/slick.min.js', array( 'jquery' ), '1.0.0', false );
		// Enqueue
		if ( $apro_options['enable-share'] && $apro_options['addthis-id'] ) {
			wp_enqueue_script( 'webuild-addthis', '//s7.addthis.com/js/300/addthis_widget.js#pubid=' . esc_attr( $apro_options['addthis-id'] ) . '#asyncload', array( 'jquery' ), '1.0.0', false );
		};
		if ( $dev ) {
			wp_enqueue_script( 'webuild-menu' );
			wp_enqueue_script( 'webuild-plugins-waypoints' );
			wp_enqueue_script( 'webuild-plugins-fancybox' );
			wp_enqueue_script( 'webuild-plugins-isotope' );
			wp_enqueue_script( 'webuild-plugins-tooltip' );
			wp_enqueue_script( 'webuild-plugins-imagesloaded' );
			wp_enqueue_script( 'webuild-plugins-scrollto' );
			wp_enqueue_script( 'webuild-plugins-localScroll' );
			wp_enqueue_script( 'webuild-plugins-exists' );
			wp_enqueue_script( 'webuild-plugins-hoverIntent' );
			wp_enqueue_script( 'webuild-plugins-superfish' );
			wp_enqueue_script( 'webuild-plugins-stellar' );
			wp_enqueue_script( 'webuild-plugins-transit' );
			wp_enqueue_script( 'webuild-plugins-customSelect' );
			wp_enqueue_script( 'webuild-plugins-throttledresize' );
			wp_enqueue_script( 'webuild-plugins-debouncedresize' );
		} else {
			wp_enqueue_script( 'webuild-plugins-min' );
		}
		wp_enqueue_script( 'webuild-script' ); // wp
		wp_localize_script( 'webuild-script', 'webuild_ajax', array(
			'ajaxurl'      => admin_url( 'admin-ajax.php' ),
			'sticky'       => $apro_options['sticky-header'],
			'compactMenu'  => is_compact_menu(),
			'footerEffect' => (bool) $apro_options['footer-fixed-effect'],
			'footerForm'   => (bool) $apro_options['show-footer-form'],
			'showFooter'   => (bool) $apro_options['show-footer']
		) );
	};
}

add_action( 'wp_enqueue_scripts', 'webuild_scripts' );
/**
 *
 * Enqueue Inline Styles
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_enqueue_inline_styles' ) ) {
	function webuild_enqueue_inline_styles() {
		global $webuild_inline_styles;
		if ( ! empty( $webuild_inline_styles ) ) {
			echo '<style id="custom-shortcode-css" type="text/css" scoped>' . webuild_css_compress( join( '', $webuild_inline_styles ) ) . '</style>';
		}
	}

	add_action( 'wp_footer', 'webuild_enqueue_inline_styles' );
}
/**
 *
 * Deque styles
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function webuild_deque_styles() {
	if ( wp_style_is( 'select2-css', $list = 'enqueued' ) ) {
		wp_dequeue_style( 'woocomposer-select2' ); // remove select2 from Ultimate_VC_Addons
	}
}

add_action( 'admin_print_styles', 'webuild_deque_styles' );
/**
 *
 * Deque scripts
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function webuild_dequeue_script() {
	if ( wp_script_is( 'select2-js', $list = 'enqueued' ) ) {
		wp_dequeue_script( 'woocomposer-select2-js' ); // remove select2 from Ultimate_VC_Addons
	}
}

add_action( 'wp_print_scripts', 'webuild_dequeue_script', 100 );
/**
 *
 * Custom css
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'webuild_custom_css' ) ) {
	function webuild_custom_css() {
		global $apro_options;
		$output = '';
		$output .= webuild_css_compress( $apro_options['pure-css-code'] );

		return $output;
	}
}

