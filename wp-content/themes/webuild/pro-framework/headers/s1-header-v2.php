<?php
global $apro_options;  // declare the global options
$include_path = 'pro-framework/headers/';
$transparent = $apro_options["transparent-header"];
?>
<header id="masthead" class="<?php if ( $transparent ) {
	echo 'transparent-header';
} ?> site-header style-1 header-v3 ">
	<?php
	if ( $apro_options['show-top-header'] ) {
		get_template_part( $include_path . '/top' );
	}; ?>
	<nav id="top-menu" class="navbar hidden-mobile">
		<div class="container">
			<div class="header-top">
				<div class="center">
					<?php get_template_part( $include_path . '/includes/logo' ) ?>
				</div>
			</div>
		</div>
		<div class="container header-bottom">
			<?php if ( $apro_options['show-search-icon'] ) { ?>
				<div class="pull-right">
					<?php get_template_part( $include_path . '/includes/search' ) ?>
				</div>
			<?php }; ?>
			<div class="pull-right">
				<?php
				if ( class_exists( 'Woocommerce' ) && $apro_options['show-woocommerce-cart'] ) {
					get_template_part( $include_path . '/includes/cart' );
				};
				?>
			</div>
			<div class="primary-menu">
				<div class="menu-class navbar-centered">
					<?php webuild_main_menu() ?>
				</div>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
</header>
<!-- #masthead -->