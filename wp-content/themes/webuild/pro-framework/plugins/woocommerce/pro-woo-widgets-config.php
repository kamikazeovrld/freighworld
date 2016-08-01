<?php

/**
 *
 * Copy of includes/widgets/class-wc-widget-product-categories.php
 *
 * Class - WC_Widget_Product_Categories
 * Product Categories Widget
 *
 * @author        WooThemes
 * @category    Widgets
 * @package    WooCommerce/Widgets
 * @version    2.1.0
 * @extends    WC_Widget
 */
class PRO_WC_Widget_Product_Categories extends WP_Widget {


	public $cat_ancestors;

	public $current_cat;

	public $widget_cssclass;

	public $widget_description;

	public $widget_id;

	public $widget_name;

	public $settings;


	/**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass = 'webuild_woocommerce widget_product_categories';
		$this->widget_description = esc_html__( 'Pro - A list or dropdown of product categories.', 'woocommerce' );
		$this->widget_id = 'webuild_woocommerce_product_categories';
		$this->widget_name = esc_html__( 'Pro - WooCommerce Product Categories', 'woocommerce' );
		$this->settings = array(
			'title'              => array(
				'type'  => 'text',
				'std'   => esc_html__( 'Product Categories', 'woocommerce' ),
				'label' => esc_html__( 'Title', 'woocommerce' )
			),
			'orderby'            => array(
				'type'    => 'select',
				'std'     => 'name',
				'label'   => esc_html__( 'Order by', 'woocommerce' ),
				'options' => array(
					'order' => esc_html__( 'Category Order', 'woocommerce' ),
					'name'  => esc_html__( 'Name', 'woocommerce' )
				)
			),
			'count'              => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => esc_html__( 'Show post counts', 'woocommerce' )
			),
			'image'              => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => esc_html__( 'Show category image', 'woocommerce' )
			),
			'hierarchical'       => array(
				'type'  => 'checkbox',
				'std'   => 1,
				'label' => esc_html__( 'Show hierarchy', 'woocommerce' )
			),
			'show_children_only' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => esc_html__( 'Only show children of the current category', 'woocommerce' )
			)
		);
		$widget_ops = array(
			'classname'   => $this->widget_cssclass,
			'description' => $this->widget_description
		);
		parent::__construct($this->widget_id, $this->widget_name, $widget_ops);
		//$this->WP_Widget( $this->widget_id, $this->widget_name, $widget_ops );
		add_action( 'save_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );
	}

	/**
	 * get_cached_widget function.
	 */
	function get_cached_widget( $args ) {
		$cache = wp_cache_get( apply_filters( 'woocommerce_cached_widget_id', $this->widget_id ), 'widget' );
		if ( ! is_array( $cache ) ) {
			$cache = array();
		}
		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];

			return true;
		}

		return false;
	}


	/**
	 * Cache the widget
	 *
	 * @param string $content
	 */
	public function cache_widget( $args, $content ) {
		$cache[ $args['widget_id'] ] = $content;
		wp_cache_set( apply_filters( 'woocommerce_cached_widget_id', $this->widget_id ), $cache, 'widget' );
	}


	/**
	 * Flush the cache
	 *
	 * @return void
	 */
	public function flush_widget_cache() {
		wp_cache_delete( apply_filters( 'woocommerce_cached_widget_id', $this->widget_id ), 'widget' );
	}


	/**
	 * update function.
	 *
	 * @see WP_Widget->update
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		if ( ! $this->settings ) {
			return $instance;
		}
		foreach ( $this->settings as $key => $setting ) {
			if ( isset( $new_instance[ $key ] ) ) {
				$instance[ $key ] = sanitize_text_field( $new_instance[ $key ] );
			} elseif ( 'checkbox' === $setting['type'] ) {
				$instance[ $key ] = 0;
			}
		}
		$this->flush_widget_cache();

		return $instance;
	}

	/**
	 *
	 * Abstract WC_Widget
	 **/
	/**
	 * form function.
	 *
	 * @see WP_Widget->form
	 *
	 * @param array $instance
	 */
	public function form( $instance ) {
		if ( ! $this->settings ) {
			return;
		}
		foreach ( $this->settings as $key => $setting ) {
			$value = isset( $instance[ $key ] ) ? $instance[ $key ] : $setting['std'];
			switch ( $setting['type'] ) {
				case "text" :
					?>
					<p>
						<label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $setting['label']; ?></label>
						<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>"
						       name="<?php echo $this->get_field_name( $key ); ?>" type="text"
						       value="<?php echo esc_attr( $value ); ?>"/>
					</p>
					<?php
					break;
				case "number" :
					?>
					<p>
						<label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $setting['label']; ?></label>
						<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>"
						       name="<?php echo $this->get_field_name( $key ); ?>" type="number"
						       step="<?php echo esc_attr( $setting['step'] ); ?>"
						       min="<?php echo esc_attr( $setting['min'] ); ?>"
						       max="<?php echo esc_attr( $setting['max'] ); ?>"
						       value="<?php echo esc_attr( $value ); ?>"/>
					</p>
					<?php
					break;
				case "select" :
					?>
					<p>
						<label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $setting['label']; ?></label>
						<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>"
						        name="<?php echo $this->get_field_name( $key ); ?>">
							<?php foreach ( $setting['options'] as $option_key => $option_value ) : ?>
								<option
									value="<?php echo esc_attr( $option_key ); ?>" <?php selected( $option_key, $value ); ?>><?php echo esc_html( $option_value ); ?></option>
							<?php endforeach; ?>
						</select>
					</p>
					<?php
					break;
				case "checkbox" :
					?>
					<p>
						<input id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>"
						       name="<?php echo esc_attr( $this->get_field_name( $key ) ); ?>" type="checkbox"
						       value="1" <?php checked( $value, 1 ); ?> />
						<label for="<?php echo $this->get_field_id( $key ); ?>"><?php echo $setting['label']; ?></label>
					</p>
					<?php
					break;
			}
		}
	}

	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 * @access public
	 *
	 * @param array $args
	 * @param array $instance
	 *
	 * @return void
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		global $wp_query, $post;
		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$c = ! empty( $instance['count'] );
		$i = ! empty( $instance['image'] );
		$h = ! empty( $instance['hierarchical'] );
		$s = ! empty( $instance['show_children_only'] );
		$o = $instance['orderby'] ? $instance['orderby'] : 'order';
		$dropdown_args = array( 'hide_empty' => false );
		$list_args = array( 'show_count'   => $c,
		                    'hierarchical' => $h,
		                    'taxonomy'     => 'product_cat',
		                    'hide_empty'   => false
		);
		// Menu Order
		$list_args['menu_order'] = false;
		if ( $o == 'order' ) {
			$list_args['menu_order'] = 'asc';
		} else {
			$list_args['orderby'] = 'title';
		}
		// Setup Current Category
		$this->current_cat = false;
		$this->cat_ancestors = array();
		if ( is_tax( 'product_cat' ) ) {
			$this->current_cat = $wp_query->queried_object;
			$this->cat_ancestors = get_ancestors( $this->current_cat->term_id, 'product_cat' );
		} elseif ( is_singular( 'product' ) ) {
			$product_category = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent' ) );
			if ( $product_category ) {
				$this->current_cat = end( $product_category );
				$this->cat_ancestors = get_ancestors( $this->current_cat->term_id, 'product_cat' );
			}
		}
		// Show Siblings and Children Only
		if ( $s && $this->current_cat ) {
			// Top level is needed
			$top_level = get_terms(
				'product_cat',
				array(
					'fields'       => 'ids',
					'parent'       => 0,
					'hierarchical' => true,
					'hide_empty'   => false
				)
			);
			// Direct children are wanted
			$direct_children = get_terms(
				'product_cat',
				array(
					'fields'       => 'ids',
					'parent'       => $this->current_cat->term_id,
					'hierarchical' => true,
					'hide_empty'   => false
				)
			);
			// Gather siblings of ancestors
			$siblings = array();
			if ( $this->cat_ancestors ) {
				foreach ( $this->cat_ancestors as $ancestor ) {
					$ancestor_siblings = get_terms(
						'product_cat',
						array(
							'fields'       => 'ids',
							'parent'       => $ancestor,
							'hierarchical' => false,
							'hide_empty'   => false
						)
					);
					$siblings = array_merge( $siblings, $ancestor_siblings );
				}
			}
			if ( $h ) {
				$include = array_merge( $top_level, $this->cat_ancestors, $siblings, $direct_children, array( $this->current_cat->term_id ) );
			} else {
				$include = array_merge( $direct_children );
			}
			$dropdown_args['include'] = implode( ',', $include );
			$list_args['include'] = implode( ',', $include );
			if ( empty( $include ) ) {
				return;
			}
		} elseif ( $s ) {
			$dropdown_args['depth'] = 1;
			$dropdown_args['child_of'] = 0;
			$dropdown_args['hierarchical'] = 1;
			$list_args['depth'] = 1;
			$list_args['child_of'] = 0;
			$list_args['hierarchical'] = 1;
		}
		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		include_once( FRAMEWORK_PLUGIN_DIR . '/woocommerce/class-product-cat-list-walker.php' );
		$list_args['walker'] = new PRO_WC_Product_Cat_List_Walker;
		$list_args['title_li'] = '';
		$list_args['pad_counts'] = 1;
		$list_args['display_image'] = $i;
		$list_args['show_option_none'] = esc_html__( 'No product categories exist.', 'woocommerce' );
		$list_args['current_category'] = ( $this->current_cat ) ? $this->current_cat->term_id : '';
		$list_args['current_category_ancestors'] = $this->cat_ancestors;
		echo '<ul class="product-categories">';
		wp_list_categories( apply_filters( 'woocommerce_product_categories_widget_args', $list_args ) );
		echo '</ul>';
		echo $after_widget;
	}

}


/**
 *
 * PROFramework Woo Widgets Config
 * @since 1.0.0
 * @version 1.0.0
 *
 */
function woo_custom_widgets_init() {
	register_widget( 'PRO_WC_Widget_Product_Categories' );
}

add_action( 'widgets_init', 'woo_custom_widgets_init', 2 );

