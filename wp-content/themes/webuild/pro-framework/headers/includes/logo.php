<?php
global $apro_options;
$page_logo = $page_retina_logo = $transparent = false;
$transparent = $apro_options["transparent-header"];
$page_logo = $apro_options["logo-upload"];
$page_retina_logo = $apro_options["logo-upload-retina"];
if ( $page_logo ) {
	webuild_output_logo( $page_logo, $page_retina_logo );
} else if ( $transparent ) {
	webuild_output_logo( $apro_options['transparent-logo-upload'], $apro_options['transparent-logo-upload-retina'] );
} else {
	webuild_output_logo( $apro_options['logo-upload'], $apro_options['logo-upload-retina'] );
}
?>