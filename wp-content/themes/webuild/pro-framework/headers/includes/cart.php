<?php global $woocommerce, $apro_options; ?>
<div class="cart-info">
	<div class="hover-helper">
		<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" class="shopping-cart"
		   title="<?php esc_html_e( 'View your shopping cart', 'woothemes' ); ?>">
			<i class="fa fa-shopping-cart"></i>

			<span class="badge animated bounceIn shopping-badge ">

				<?php echo wp_kses_post( $woocommerce->cart->cart_contents_count ); ?>

			</span>
		</a>
		<div class="cart-dropdown-cont">
			<?php include( FRAMEWORK_PLUGIN_DIR . '/woocommerce/woocommerce-ajax-cart.php' ) ?>
		</div>
	</div>

	<span class="price-result">

		<?php echo wp_kses_post( $woocommerce->cart->get_cart_total() ); ?>

	</span>
</div>