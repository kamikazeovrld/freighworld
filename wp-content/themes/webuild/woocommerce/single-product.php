<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
get_header( 'shop' );
global $apro_options;
$layout = $apro_options["woo-single-layout"];
$sidebar = $apro_options["woo-single-sidebar"];
if ( $layout == 'full' || $layout == 'full-100' ) {
	$webuild_page_column = '12';
} else if ( $layout == 'left' || $layout == 'right' ) {
	$webuild_page_column = '9';
} else if ( $layout == 'both' ) {
	$webuild_page_column = '6';
}
$container = $layout == 'full-100' ? "container-fluid" : "container";
?>
	<div class="<?php echo esc_attr( $container ); ?> cont-padding">
		<div class="row">
			<?php webuild_page_sidebar( 'left', $layout, $sidebar ); ?>
			<div class="col-md-<?php echo esc_attr( $webuild_page_column ) ?>">
				<div class="page-content">
					<?php
					/**
					 * woocommerce_before_main_content hook
					 *
					 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action( 'woocommerce_before_main_content' );
					?>
					<?php while( have_posts() ) : the_post(); ?>
						<?php wc_get_template_part( 'content', 'single-product' ); ?>
					<?php endwhile; // end of the loop. ?>
					<?php
					/**
					 * woocommerce_after_main_content hook
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action( 'woocommerce_after_main_content' );
					?>
				</div>
				<!-- /page-content -->
			</div>
			<!-- /colmd -->
			<?php webuild_page_sidebar( 'right', $layout, $sidebar ); ?>
		</div>
	</div>
<?php get_footer( 'shop' ); ?>