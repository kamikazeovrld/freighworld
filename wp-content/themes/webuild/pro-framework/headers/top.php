<?php
global $apro_options;  // declare the global options 
$include_path = 'pro-framework/headers';
?>
<nav id="top-bar" class="navbar navbar-default">
	<div class="container">
		<div class="pull-left">
			<?php
			//language switch
			if ( $apro_options['language-switch'] && $apro_options['language-switch-position'] == 'left' ) {
				get_template_part( $include_path . '/includes/language-switch' );
			};
			$cont_left = $apro_options['top-header-left-cont'];
			switch ( $cont_left ) {
				case "contact-info":
					get_template_part( $include_path . '/includes/contact-info' );
					break;
				case "social-icons":
					get_template_part( $include_path . '/includes/socials' );
					break;
				case "navigation":
					get_template_part( $include_path . '/includes/top-menu' );
					break;
				case "custom-content":
					get_template_part( $include_path . '/includes/custom-content' );
					break;
			}
			?>
		</div>
		<div class="pull-right">
			<?php
			$cont_right = $apro_options['top-header-right-cont'];
			switch ( $cont_right ) {
				case "contact-info":
					get_template_part( $include_path . '/includes/contact-info' );
					break;
				case "social-icons":
					get_template_part( $include_path . '/includes/socials' );
					break;
				case "navigation":
					get_template_part( $include_path . '/includes/top-menu' );
					break;
				case "custom-content":
					echo wp_kses_post( $apro_options['top-header-custom-content'] );
					break;
			}
			//language switch
			if ( $apro_options['language-switch'] && $apro_options['language-switch-position'] == 'right' ) {
				get_template_part( $include_path . '/includes/language-switch' );
			};
			?>
		</div>
	</div>
	<!-- /.container-fluid -->
</nav>

