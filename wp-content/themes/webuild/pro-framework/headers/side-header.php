<?php
global $apro_options;  // declare the global options
$include_path = 'pro-framework/headers/';
?>
<nav id="mp-menu" class="mp-menu primary-menu">
	<div class="mp-level">
		<h2><i class="pro-in fa fa-globe"></i><?php esc_html_e( 'Menu', THEME_NAME ) ?></h2>
		<?php webuild_main_menu() ?>
	</div>
</nav>