<?php
global $apro_options;
$class = $apro_options['top-header-right-cont'] == "navigation" ? 'right' : 'left';
?>
<div class="top-actual-menu <?php echo esc_attr( $class ) ?>">
	<?php webuild_top_menu() ?>
</div>