<?php global $apro_options;  // declare the global options ?>
<div class="contact-info">
	<?php if ( $apro_options['telephone'] ) { ?>
		<ul class="nav navbar-nav">
			<li>
				<a href="<?php echo esc_url( 'tel:' . $apro_options['telephone'] ) ?>"><i
						class="fa fa-phone"></i>&nbsp; <?php echo wp_kses_post( $apro_options['telephone'] ); ?></a>
			</li>
		</ul>
	<?php }; ?>

	<?php if ( $apro_options['email'] ) { ?>
		<ul class="nav navbar-nav">
			<li>
				<a href="<?php echo esc_url( 'mailto:' . $apro_options['email'] ) ?>">
					<i class="fa fa-envelope-o"></i>&nbsp; <?php echo wp_kses_post( $apro_options['email'] ); ?>
				</a>
			</li>
		</ul>
	<?php }; ?>
</div>