<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
get_header( 'shop' );
global $apro_options;
$shop_id = wc_get_page_id( 'shop' );
$layout = $apro_options["woo-shop-layout"];
$sidebar = $apro_options["woo-sidebar"];
$webuild_page_column = '12';
if ( $layout == 'full' || $layout == 'full-100' ) {
	$webuild_page_column = '12';
} else if ( $layout == 'left' || $layout == 'right' ) {
	$webuild_page_column = '9';
} else if ( $layout == 'both' ) {
	$webuild_page_column = '6';
}
$container = $layout == 'full-100' ? "container-fluid" : "container";
?>
<?php do_action( 'woocommerce_before_main_content' ); ?>
	<div class="woocommerce-top">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row">
				<div class="col-md-12">
					<?php
					if ( have_posts() ) {
						do_action( 'woocommerce_before_shop_loop' );
					}; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="<?php echo esc_attr( $container ); ?> cont-padding">
		<div class="row">
			<?php webuild_page_sidebar( 'left', $layout, $sidebar ); ?>
			<div class="col-md-<?php echo esc_attr( $webuild_page_column ) ?>">
				<div class="page-content">
					<?php do_action( 'woocommerce_archive_description' ); ?>
					<?php if ( have_posts() ) : ?>
						<?php woocommerce_product_loop_start(); ?>
						<?php woocommerce_product_subcategories(); ?>
						<?php while( have_posts() ) : the_post(); ?>
							<?php wc_get_template_part( 'content', 'product' ); ?>
						<?php endwhile; // end of the loop. ?>
						<?php woocommerce_product_loop_end(); ?>
						<?php do_action( 'woocommerce_after_shop_loop' ); ?>
					<?php elseif ( ! woocommerce_product_subcategories( array(
						'before' => woocommerce_product_loop_start( false ),
						'after'  => woocommerce_product_loop_end( false )
					) )
					) : ?>
						<?php wc_get_template( 'loop/no-products-found.php' ); ?>
					<?php endif; ?>
				</div>
			</div>
			<?php webuild_page_sidebar( 'right', $layout, $sidebar ); ?>
		</div>
	</div>
<?php do_action( 'woocommerce_after_main_content' ); ?>
<?php get_footer( 'shop' ); ?>