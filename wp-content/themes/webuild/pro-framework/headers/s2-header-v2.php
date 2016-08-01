<?php
global $apro_options;  // declare the global options
$include_path = 'pro-framework/headers/';
$transparent = $apro_options["transparent-header"];
?>
<header id="masthead" class="<?php if ( $transparent ) {
	echo 'transparent-header';
} ?> site-header style-2 header-v3">
	<?php
	if ( $apro_options['show-top-header'] ) {
		get_template_part( $include_path . '/top' );
	}; ?>
	<nav id="top-menu" class="navbar  hidden-mobile">
		<div class="container">
			<div class="header-top">
				<div class="primary-menu">
					<div class="menu-class navbar-nav center">
						<?php webuild_main_menu() ?>
					</div>
				</div>
			</div>
		</div>
	</nav>
</header>
<!-- #masthead -->