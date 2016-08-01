<?php
global $apro_options;  // declare the global options
$include_path = 'pro-framework/headers';
$transparent = $apro_options["transparent-header"];
?>
<header id="masthead" class="<?php if ( $transparent ) {
	echo 'transparent-header';
} ?> site-header style-1 header-v1">
	<?php
	if ( $apro_options['show-top-header'] ) {
		get_template_part( $include_path . '/top' );
	}; ?>
	<nav id="top-menu" class="navbar hidden-mobile">
		<div class="container">
			<div class="header-top">
				<div class="pull-left">
					<?php get_template_part( $include_path . '/includes/logo' ); ?>
				</div>
				<div class="pull-right">
					<?php
					if ( class_exists( 'Woocommerce' ) && $apro_options['show-woocommerce-cart'] ) {
						get_template_part( $include_path . '/includes/cart' );
					};
					?>
				</div>
				<?php if ( $apro_options['show-search-icon'] ) { ?>
					<div class="pull-right">
						<?php get_template_part( $include_path . '/includes/search' ) ?>
					</div>
				<?php }; ?>
			</div>
		</div>
		<div class="container header-bottom">
			<div class="primary-menu">
				<div class="menu-class navbar-right">
					<?php webuild_main_menu() ?>
				</div>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
</header>
<!-- #masthead -->