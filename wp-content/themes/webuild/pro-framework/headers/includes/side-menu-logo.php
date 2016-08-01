<?php
global $apro_options;  // declare the global options
$include_path = 'pro-framework/headers/';
?>
<header id="masthead" class="site-header style-4 header-v1">
	<div class="container">
		<div class="header-top">
			<?php if ( $apro_options['header-layout'] == 'side-header-right' ) { ?>
				<div class="pull-left">
					<?php get_template_part( $include_path . '/includes/logo' ) ?>
				</div>
				<div class="pull-right">
					<div id="trigger" class="menu-trigger">
						<div class="hamburger">
							<span></span>
							<span></span>
							<span></span>
						</div>
						<div class="cross">
							<span></span>
							<span></span>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<div class="pull-left">
					<div id="trigger" class="menu-trigger">
						<div class="hamburger">
							<span></span>
							<span></span>
							<span></span>
						</div>
						<div class="cross">
							<span></span>
							<span></span>
						</div>
					</div>
				</div>
				<div class="pull-right">
					<?php get_template_part( $include_path . '/includes/logo' ) ?>
				</div>
			<?php } ?>
		</div>
	</div>
	</nav>
</header>
<!-- #masthead -->