<?php
/**
 *
 * Set body class
 * @since 1.0.0
 * @version 1.0.0
 *
 */

if ( ! function_exists( 'pro_theme_name_wp_title' ) ) {
	function pro_theme_name_wp_title( $title, $sep ) {
	    if ( is_feed() ) {
	        return $title;
	    }
	     
	    global $page, $paged;

	    $title_page = $title;
	 
	    // Add the blog name
	    $title .= get_bloginfo( 'name', 'display' );
	 
	    // Add the blog description for the home/front page.
	    $site_name = get_bloginfo( 'name', 'display' );
	    $site_description = get_bloginfo( 'description', 'display' );
	    if ( $site_description && ( is_home() || is_front_page() ) ) {
	        $title .= " - $site_description";
	    } else {
	    	$title = "$title_page - $site_name";
	    }
	 
	    // Add a page number if necessary:
	    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
	        $title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
	    }
	    return $title;
	}
	add_filter( 'wp_title', 'pro_theme_name_wp_title', 10, 2 );
}



if ( ! function_exists( 'webuild_body_class_names' ) ) {
	function webuild_body_class_names( $classes ) {
		global $apro_options;
		$boxed_layout = $apro_options['layout-type'] == 'boxed' ? 'boxed' : '';
		$sticky_header = $apro_options['sticky-header'] ? 'sticky-header' : '';
		$slider_effect = '';
		$top_bar_tablets = $apro_options['hide-top-bar-tablets'] ? 'no-tablet-top-bar' : '';
		$top_bar_mobiles = $apro_options['hide-top-bar-mobiles'] ? 'no-mobile-top-bar' : '';
		$classes[] = "$boxed_layout $sticky_header $top_bar_tablets $top_bar_mobiles";

		return $classes;
	}

	add_filter( 'body_class', 'webuild_body_class_names' );
}
/**
 *
 * Get main menu
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'webuild_main_menu' ) ) {
	function webuild_main_menu( $onepage = false ) {
		global $apro_options;
		if ( $apro_options['page_menu'] ) {
			wp_nav_menu( array( 'menu' => $apro_options['page_menu'], 'mega' => true ) );
		} else {
			if ( $onepage ) {
				if ( has_nav_menu( 'one_page' ) ) {
					wp_nav_menu( array( 'theme_location' => 'one_page', 'mega' => true ) );
				}
			} else {
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu( array( 'theme_location' => 'primary', 'mega' => true ) );
				}
			}
		}
	}
}
/**
 *
 * Get side menu start markup
 * @since 1.0.0
 * @version 1.0.0
 */
function side_menu_start( $type ) {
	$from = ( $type == 'side-header-right' ) ? 'right' : 'left';
	echo '<div class="mp-pusher ' . $from . '" id="mp-pusher">';
	get_template_part( 'pro-framework/headers/side-header' );
	echo '<div class="scroller"><div class="inner-scroller">';
	get_template_part( 'pro-framework/headers/includes/side-menu-logo' );
}

/**
 *
 * Get side menu closing markup
 * @since 1.0.0
 * @version 1.0.0
 */
function side_menu_end() {
	echo '</div></div></div>';
}

/**
 *
 * Get top menu
 * @since 1.0.0
 * @version 1.0.0
 */
function webuild_top_menu() {
	$menu_name = 'top_menu';
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		echo '<div class="right-navbar-nav">';
			wp_nav_menu( array( 'theme_location' => 'top_menu', 'container' => false, 'menu_class' => 'nav navbar-nav' ) );
		echo '</div>';
	};
}

/**
 *
 * Get search box
 * @since 1.0.0
 * @version 1.0.0
 */
function webuild_search_box() {
	?>
	<div class="search-box">
		<a href="#" class="close-box fa fa-plus"></a>
		<div class="form-holder">
			<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="text" class="form-control" name="s" id="search-field" placeholder="Search...">
				<input type="hidden" name="post_type" value="post"/>
			</form>
		</div>
	</div>
	<?php
}

