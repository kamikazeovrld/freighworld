<?php
/** * The template for displaying the footer.
 * * Contains the closing of the #content div and all content after
 * * @package apro
 */
?>
<?php global $apro_options;  // declare the global options ?>
</div>
<!-- #content -->
<footer>
	<?php if ( $apro_options['show-footer-form'] ) { ?>
		<div class="top-footer footer-form">
			<?php echo webuild_background( $apro_options['background-image-form-area'], $apro_options['footer-form-background-parallax'] ); ?>
			<div class="container">
				<?php if ( $apro_options['show-footer-form'] ) { ?>
					<div class="row">
						<?php echo wp_kses_post( $apro_options['before-footer-form'] ); ?>
						<?php if ( $apro_options['footer-form-shortcode'] ) {
							echo do_shortcode( $apro_options['footer-form-shortcode'] );
						}; ?>
					</div>
				<?php }; ?>
				<?php if ( $apro_options['show-footer-contact-details'] ) {
					echo webuild_footer_contact_details();
				} ?>
			</div>
		</div>
	<?php }; ?>
	<div class="copyright-widgets-cont">
		<?php if ( $apro_options['show-footer'] ) {
			echo webuild_footer_widgets();
		}; ?>
		<?php if ( $apro_options['copyright-bar'] ) { ?>
			<div class="bott-footer copyright">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-md-5">
							<p class="copyright-text"><?php echo wp_kses_post( $apro_options['copyright-text'] ) ?></p>
						</div>
						<div class="col-xs-12 col-md-7">
							<?php if ( $apro_options['enable-to-top-script'] ) { ?>
								<div class="arrow-to-top"><b class="fa-angle-up"></b></div>
							<?php }; ?>
							<?php
							global $apro_options;  // declare the global options
							$include_path = 'pro-framework/headers';
							$cont_right   = $apro_options['footer-right-content'];
							switch ( $cont_right ) {
								case "contact-info":
									get_template_part( $include_path . '/includes/contact-info' );
									break;
								case "social-icons":
									get_template_part( $include_path . '/includes/socials-footer' );
									break;
								case "navigation":
									get_template_part( 'pro-framework/template-parts/footer-menu' );
									break;
								case "custom-content":
									echo wp_kses_post( $apro_options['copyright-custom-content'] );
									break;
								default:
									//leave-empty
							} ?>
						</div>
					</div>
				</div>
			</div>
		<?php }; ?>
	</div>
</footer>
<!-- #page -->
</div>
<?php
global $apro_options;
if($apro_options['sticky-header-full-width'] == true){
	$custom_style = '#header-sticky.fixed .container { width: 100%;}';
}
$custom_style .= '.primary-menu .navbar-nav > li > a {line-height: 100px;}';
$custom_style .= '.open-search:hover { color: '.$apro_options['main-menu-list-item-hover'].'; }';
$custom_style .= '.cart-info .shopping-cart:hover { color: '.$apro_options['main-menu-list-item-hover'].'; }';
webuild_add_inline_style( $custom_style );
wp_footer(); ?>
</body>
</html>