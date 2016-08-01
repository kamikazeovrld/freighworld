<?php
/**
 * Pagination - Show numbered pagination for catalog pages.
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.2.2
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $wp_query;
if ( $wp_query->max_num_pages <= 1 ) {
	return;
}
?>
<nav class="page-pagination">
	<div class="pagination-shadow">
		<?php
		$links = paginate_links( apply_filters( 'woocommerce_pagination_args', array(
			'base'      => esc_url( str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ) ),
			'format'    => '',
			'current'   => max( 1, get_query_var( 'paged' ) ),
			'total'     => $wp_query->max_num_pages,
			'prev_text' => '&larr;',
			'next_text' => '&rarr;',
			'type'      => 'array',
			'end_size'  => 3,
			'mid_size'  => 3
		) ) );
		foreach ( $links as $link ) {
			echo wp_kses_post($link);
		}
		?>
	</div>
</nav>