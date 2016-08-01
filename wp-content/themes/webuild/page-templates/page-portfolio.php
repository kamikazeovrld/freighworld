<?php
/**
 *
 * Page Loop
 *
 */
global $apro_options;
$webuild_blog_layout = 'default';
$webuild_blog_class = 'default blog-layout-' . $webuild_blog_layout;
$rsidebar = $apro_options["sidebar-right"];
$lsidebar = $apro_options["sidebar-left"];

if ( is_archive() ) {
	$layout = $apro_options['layout-archive-pages'];
} else {
	$layout = $apro_options["layout"];
}
if ( $layout == 'full' || $layout == 'full-100' ) {
	$webuild_page_column = '12';
} else if ( $layout == 'left' || $layout == 'right' ) {
	$webuild_page_column = '9';
} else if ( $layout == 'both' ) {
	$webuild_page_column = '6';
}
$container = $layout == 'full-100' ? "container-fluid" : "container";
?>
<div
	class="<?php echo esc_attr( $container ); ?> cont-padding page-layout-<?php echo esc_attr( $webuild_blog_layout ); ?> blog-<?php echo esc_attr( $webuild_blog_class ); ?>">
	<div class="row">
		<?php webuild_page_sidebar( 'left', $layout, $lsidebar ); ?>
		<div class="col-md-<?php echo esc_attr( $webuild_page_column ); ?>">
			<div class="page-content">
				<?php
				$taxonomies = array(
						'portfolio-category'
				);

				$args = array(
						'orderby'           => 'name',
						'order'             => 'ASC',
						'hide_empty'        => true,
						'exclude'           => array(),
						'exclude_tree'      => array(),
						'include'           => array(),
						'number'            => '',
						'fields'            => 'all',
						'slug'              => '',
						'parent'            => '',
						'hierarchical'      => true,
						'child_of'          => 0,
						'childless'         => false,
						'get'               => '',
						'name__like'        => '',
						'description__like' => '',
						'pad_counts'        => false,
						'offset'            => '',
						'search'            => '',
						'cache_domain'      => 'core'
				);

				$terms = get_terms($taxonomies, $args);
				$array = array();
				$k = 0;
				foreach($terms as $term){
					$array[$k] = $term->slug;
					$k++;
				}
				$args = array(
						'post_type' => 'portfolio',
						'posts_per_page' => 10,
						'tax_query' =>  array(
								array(
										'taxonomy' => 'portfolio-category',
										'field' => 'slug',
										'terms' => $array
								)
						)
				);
				query_posts( $args );

				while( have_posts() ) : the_post();
					// check blog type
					if ( $webuild_blog_layout == 'default' ) {
						get_template_part( 'post-formats/content', get_post_format() );
					} else {
						get_template_part( 'page-templates/page-blog', $webuild_blog_layout );
					}
				endwhile;
				// paginatio
				webuild_paging_nav();
				?>
			</div>
			<!-- page-content -->
		</div>
		<?php webuild_page_sidebar( 'right', $layout, $rsidebar ); ?>
	</div>
</div>