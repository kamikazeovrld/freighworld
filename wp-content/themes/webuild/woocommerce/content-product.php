<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
global $product, $woocommerce_loop, $apro_options;
// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}
// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );
}
// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}
// Increase loop count
$woocommerce_loop['loop'] ++;
// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}
$classes[] = webuild_get_bootstrap( $woocommerce_loop['columns'] );
?>
<div <?php post_class( $classes ); ?>>
	<div class="product-wrapper">
		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

		<?php
		if ( $product->is_on_sale() ) :
			echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale"><span class="sale-bg"></span><span class="sale-text">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span></span>', $post, $product );
		endif;
		?>
		<div class="image-wrapper">
			<div class="product-image">
				<a class="image-link" href="<?php the_permalink(); ?>">
					<?php echo webuild_woocommerce_get_product_thumbnail(); ?>
				</a>
				<div class="actions">
					<div class="action-buttons">
						<div class="add-to-links">
							<?php
							if ( $apro_options['woo-wishlist'] ) {
								echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
							}
							if ( $apro_options['woo-compare'] ) {
								echo do_shortcode( '[yith_compare_button]' );
							}
							?>
						</div>
						<div class="add-to-cart">
							<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
						</div>
					</div>
				</div>
				<div class="shadow"></div>
			</div>
		</div>
		<div class="bottom-info">
			<h2 class="product-name-listview">
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
			</h2>
			<?php
			if ( $apro_options['woo-product-price'] || is_single() ) {
				woocommerce_template_loop_price();
			};
			woocommerce_template_loop_rating();
			?>
		</div>
	</div>
</div>