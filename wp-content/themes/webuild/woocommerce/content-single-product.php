<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
?>



<?php
/**
 * woocommerce_before_single_product hook
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );
if ( post_password_required() ) {
	echo get_the_password_form();

	return;
}
global $apro_options;
?>
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>"
     id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5">
				<?php
				/**
				 * woocommerce_before_single_product_summary hook
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );
				//woocommerce_show_product_images();
				?>
			</div>
			<div class="col-md-7">
				<div class="summary entry-summary">
					<?php
					woocommerce_template_single_title();
					woocommerce_template_single_price();
					woocommerce_template_single_rating();
					woocommerce_template_single_excerpt();
					woocommerce_template_single_add_to_cart();
					if ( $apro_options['woo-wishlist'] ) {
						echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
					}
					if ( $apro_options['woo-compare'] ) {
						echo do_shortcode( '[yith_compare_button]' );
					}
					woocommerce_template_single_meta();
					if ( $apro_options['enable-share'] && $apro_options['addthis-html'] ) {
						echo '<div class="clearfix"></div>';
						echo wp_kses_post( $apro_options['addthis-html'] );
					}
					?>
				</div>
				<!-- .summary -->
			</div>
			<!-- /col-md-7 -->
		</div>
		<!-- /row -->
		<div class="row">
			<div class="col-md-12">
				<?php
				/**
				 * woocommerce_after_single_product_summary hook
				 *
				 * @hooked woocommerce_output_product_data_tabs - 10
				 * @hooked woocommerce_output_related_products - 20
				 */
				do_action( 'woocommerce_after_single_product_summary' );
				?>
				<meta itemprop="url" content="<?php the_permalink(); ?>"/>
			</div>
		</div>
		<!-- /row -->
	</div>
</div><!-- #product-<?php the_ID(); ?> -->
<?php do_action( 'woocommerce_after_single_product' ); ?>

