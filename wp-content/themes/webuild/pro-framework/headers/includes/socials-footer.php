<?php global $apro_options;  // declare the global options 
//printr($apro_options);
?>
<ul class="footer-socials">
	<?php
	$socials = array(
		'facebook',
		'flickr',
		'rss',
		'twitter',
		'vimeo',
		'youtube',
		'instagram',
		'pinterest',
		'tumblr',
		'google-plus',
		'dribbble',
		'digg',
		'linkedin',
		'skype',
		'deviantart',
		'yahoo',
		'reddit',
		'paypal',
		'dropbox',
		'envelope-o'
	);
	foreach ( $socials as $social ) {
		if ( isset( $apro_options[ 'fa-' . $social ] ) && $apro_options[ 'fa-' . $social ] ) {
			?>
			<li>
				<a href="<?php echo esc_url( $apro_options[ 'fa-' . $social ] ); ?>"
				   <?php if ( $apro_options['open-social-icons-window'] ){ ?>target="_blank" <?php }; ?>>
					<i class="fa fa-<?php echo esc_attr( $social ); ?>"></i>
				</a>
			</li>
			<?php
		}
	};
	?>
</ul>