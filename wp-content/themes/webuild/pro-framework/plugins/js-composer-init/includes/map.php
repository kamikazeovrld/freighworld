<?php
/**
  * WPBakery Visual Composer Shortcodes settings
  *
  * @package VPBakeryVisualComposer
  *
 */

// Include Helpers
include_once( FRAMEWORK_PLUGIN_DIR . '/js-composer-init/includes/helpers.php' );
include_once( FRAMEWORK_PLUGIN_DIR . '/js-composer-init/includes/params.php' );
include_once( FRAMEWORK_PLUGIN_DIR . '/js-composer-init/includes/extends.php' );
include_once( FRAMEWORK_PLUGIN_DIR . '/js-composer-init/includes/templates.php' );

if ( ! function_exists( 'is_plugin_active' ) ) {
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // Require plugin.php to use is_plugin_active() below
}

// Column width
// ------------------------------------------------------------------------------------------
$column_width_list = array(
	esc_html__( '1 column - 1/12', 'js_composer' )    => '1/12',
	esc_html__( '2 columns - 1/6', 'js_composer' )    => '1/6',
	esc_html__( '3 columns - 1/4', 'js_composer' )    => '1/4',
	esc_html__( '4 columns - 1/3', 'js_composer' )    => '1/3',
	esc_html__( '5 columns - 5/12', 'js_composer' )   => '5/12',
	esc_html__( '6 columns - 1/2', 'js_composer' )    => '1/2',
	esc_html__( '7 columns - 7/12', 'js_composer' )   => '7/12',
	esc_html__( '8 columns - 2/3', 'js_composer' )    => '2/3',
	esc_html__( '9 columns - 3/4', 'js_composer' )    => '3/4',
	esc_html__( '10 columns - 5/6', 'js_composer' )   => '5/6',
	esc_html__( '11 columns - 11/12', 'js_composer' ) => '11/12',
	esc_html__( '12 columns - 1/1', 'js_composer' )   => '1/1'
);

// Animation
// ------------------------------------------------------------------------------------------
$vc_map_animation = array(
	'type'        => 'dropdown',
	'heading'     => 'Animation',
	'param_name'  => 'animation',
	'admin_label' => true,
	'value'       => webuild_get_animations(),
);
$vc_map_animation_delay = array(
	'type'             => 'vc_pro_textfield',
	'heading'          => 'Animation Delay',
	'param_name'       => 'animation_delay',
	'edit_field_class' => 'vc_col-md-6 vc_column',
	'placeholder'      => 0.1,
	'dependency'       => array( 'element' => 'animation', 'not_empty' => true )
);
$vc_map_animation_duration = array(
	'type'             => 'vc_pro_textfield',
	'heading'          => 'Animation Duration',
	'param_name'       => 'animation_duration',
	'edit_field_class' => 'vc_col-md-6 vc_column',
	'placeholder'      => 0.7,
	'dependency'       => array( 'element' => 'animation', 'not_empty' => true )
);
$vc_params_button_size = array(
	'XX Small' => 'xxs',
	'X Small'  => 'xs',
	'Small'    => 'sm',
	'Medium'   => 'md',
	'Large'    => 'lg',
	'X Large'  => 'xl',
	'XX Large' => 'xxl',
);
$vc_params_button_shape = array(
	'Square'  => 'square',
	'Rounded' => 'rounded',
	'Pill'    => 'pill',
	'Circle'  => 'circle',
);
$vc_params_button_type = array(
	'Flat'     => 'flat',
	'Outlined' => 'outlined',
	'3D'       => '3d',
);
$vc_params_button_align = array(
	'Select align' => '',
	'Left'         => 'left',
	'Center'       => 'center',
	'Right'        => 'right',
);
// Extras
// ------------------------------------------------------------------------------------------
$vc_map_id = array(
	'type'       => 'textfield',
	'heading'    => 'Extra ID',
	'param_name' => 'id'
);
$vc_map_class = array(
	'type'       => 'textfield',
	'heading'    => 'Extra Class',
	'param_name' => 'class'
);
$vc_map_style = array(
	'type'       => 'vc_pro_style_textarea',
	'heading'    => 'Extra Inline Style',
	'param_name' => 'in_style'
);
// Extras
// ------------------------------------------------------------------------------------------
$vc_map_extra_id = array(
	'type'       => 'textfield',
	'heading'    => 'Extra ID',
	'param_name' => 'id',
	'group'      => 'Extras'
);
$vc_map_extra_class = array(
	'type'       => 'textfield',
	'heading'    => 'Extra Class',
	'param_name' => 'class',
	'group'      => 'Extras'
);
$vc_map_extra_style = array(
	'type'       => 'vc_pro_style_textarea',
	'heading'    => 'Extra Inline Style',
	'param_name' => 'in_style',
	'group'      => 'Extras'
);
// Extras
// ------------------------------------------------------------------------------------------
$vc_map_defaults = array( $vc_map_id, $vc_map_class, $vc_map_style );
$vc_map_extra_defaults = array( $vc_map_extra_id, $vc_map_extra_class, $vc_map_extra_style );
// Used in "Button", "Call esc_html__( 'Blue', 'js_composer' )to Action", "Pie chart" blocks
$colors_arr = array(
	esc_html__( 'Grey', 'js_composer' )      => 'wpb_button',
	esc_html__( 'Blue', 'js_composer' )      => 'btn-primary',
	esc_html__( 'Turquoise', 'js_composer' ) => 'btn-info',
	esc_html__( 'Green', 'js_composer' )     => 'btn-success',
	esc_html__( 'Orange', 'js_composer' )    => 'btn-warning',
	esc_html__( 'Red', 'js_composer' )       => 'btn-danger',
	esc_html__( 'Black', 'js_composer' )     => "btn-inverse"
);
// Used in "Button" and "Call to Action" blocks
$size_arr = array(
	esc_html__( 'Regular size', 'js_composer' ) => 'wpb_regularsize',
	esc_html__( 'Large', 'js_composer' )        => 'btn-large',
	esc_html__( 'Small', 'js_composer' )        => 'btn-small',
	esc_html__( 'Mini', 'js_composer' )         => "btn-mini"
);
$target_arr = array(
	esc_html__( 'Same window', 'js_composer' ) => '_self',
	esc_html__( 'New window', 'js_composer' )  => "_blank"
);
$add_css_animation = array(
	'type'        => 'dropdown',
	'heading'     => esc_html__( 'CSS Animation', 'js_composer' ),
	'param_name'  => 'css_animation',
	'admin_label' => true,
	'value'       => array(
		esc_html__( 'No', 'js_composer' )                 => '',
		esc_html__( 'Top to bottom', 'js_composer' )      => 'top-to-bottom',
		esc_html__( 'Bottom to top', 'js_composer' )      => 'bottom-to-top',
		esc_html__( 'Left to right', 'js_composer' )      => 'left-to-right',
		esc_html__( 'Right to left', 'js_composer' )      => 'right-to-left',
		esc_html__( 'Appear from center', 'js_composer' ) => "appear"
	),
	'description' => esc_html__( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'js_composer' )
);
vc_map( array(
	'name'                    => esc_html__( 'Row', 'js_composer' ),
	'base'                    => 'vc_row',
	'is_container'            => true,
	'icon'                    => 'icon-wpb-row',
	'show_settings_on_create' => false,
	'category'                => esc_html__( 'Content', 'js_composer' ),
	'description'             => esc_html__( 'Place content elements inside the row', 'js_composer' ),
	'params'                  => array(
		array(
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Font Color', 'js_composer' ),
			'param_name'       => 'font_color',
			'description'      => esc_html__( 'Select font color', 'js_composer' ),
			'edit_field_class' => 'vc_col-md-6 vc_column'
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Row stretch', 'js_composer' ),
			'param_name'  => 'full_width',
			'value'       => array(
				esc_html__( 'Default', 'js_composer' )                                => '',
				esc_html__( 'Stretch row', 'js_composer' )                            => 'stretch_row',
				esc_html__( 'Stretch row and content', 'js_composer' )                => 'stretch_row_content',
				esc_html__( 'Stretch row and content without spaces', 'js_composer' ) => 'stretch_row_content_no_spaces',
			),
			'description' => esc_html__( 'Select stretching options for row and content. Stretched row overlay sidebar and may not work if parent container has overflow: hidden css property.', 'js_composer' )
		),
		/*


   array(


        'type' => 'colorpicker',


        'heading' => esc_html__( 'Custom Background Color', 'js_composer' ),


        'param_name' => 'bg_color',


        'description' => esc_html__( 'Select backgound color for your row', 'js_composer' ),


        'edit_field_class' => 'col-md-6'


  ),


  array(


        'type' => 'textfield',


        'heading' => esc_html__( 'Padding', 'js_composer' ),


        'param_name' => 'padding',


        'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'js_composer' ),


        'edit_field_class' => 'col-md-6'


  ),


  array(


        'type' => 'textfield',


        'heading' => esc_html__( 'Bottom margin', 'js_composer' ),


        'param_name' => 'margin_bottom',


        'description' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels.', 'js_composer' ),


        'edit_field_class' => 'col-md-6'


  ),


  array(


        'type' => 'attach_image',


        'heading' => esc_html__( 'Background Image', 'js_composer' ),


        'param_name' => 'bg_image',


        'description' => esc_html__( 'Select background image for your row', 'js_composer' )


  ),


  array(


        'type' => 'dropdown',


        'heading' => esc_html__( 'Background Repeat', 'js_composer' ),


        'param_name' => 'bg_image_repeat',


        'value' => array(


                          esc_html__( 'Default', 'js_composer' ) => '',


                          esc_html__( 'Cover', 'js_composer' ) => 'cover',


					  esc_html__('Contain', 'js_composer') => 'contain',


					  esc_html__('No Repeat', 'js_composer') => 'no-repeat'


					),


        'description' => esc_html__( 'Select how a background image will be repeated', 'js_composer' ),


        'dependency' => array( 'element' => 'bg_image', 'not_empty' => true)


  ),


  */
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'ID', 'js_composer' ),
			'param_name'  => 'element_id',
			'description' => esc_html__( 'Add a ID to use it in a onepage template', 'js_composer' ),
		),
		array(
			'type'       => 'css_editor',
			'heading'    => esc_html__( 'Css', 'js_composer' ),
			'param_name' => 'css',
			// 'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
			'group'      => esc_html__( 'Design options', 'js_composer' )
		)
	),
	'js_view'                 => 'VcRowView'
) );
vc_map( array(
	'name'                    => esc_html__( 'Row', 'js_composer' ), //Inner Row
	'base'                    => 'vc_row_inner',
	'content_element'         => false,
	'is_container'            => true,
	'icon'                    => 'icon-wpb-row',
	'weight'                  => 1000,
	'show_settings_on_create' => false,
	'description'             => esc_html__( 'Place content elements inside the row', 'js_composer' ),
	'params'                  => array(
		array(
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Font Color', 'js_composer' ),
			'param_name'       => 'font_color',
			'description'      => esc_html__( 'Select font color', 'js_composer' ),
			'edit_field_class' => 'vc_col-md-6 vc_column'
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
		array(
			'type'       => 'css_editor',
			'heading'    => esc_html__( 'Css', 'js_composer' ),
			'param_name' => 'css',
			// 'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
			'group'      => esc_html__( 'Design options', 'js_composer' )
		)
	),
	'js_view'                 => 'VcRowView'
) );

vc_map( array(
	'name'            => esc_html__( 'Column', 'js_composer' ),
	'base'            => 'vc_column',
	'is_container'    => true,
	'content_element' => false,
	'params'          => array(
		array(
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Font Color', 'js_composer' ),
			'param_name'       => 'font_color',
			'description'      => esc_html__( 'Select font color', 'js_composer' ),
			'edit_field_class' => 'vc_col-md-6 vc_column'
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
		array(
			'type'       => 'css_editor',
			'heading'    => esc_html__( 'Css', 'js_composer' ),
			'param_name' => 'css',
			// 'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
			'group'      => esc_html__( 'Design options', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Width', 'js_composer' ),
			'param_name'  => 'width',
			'value'       => $column_width_list,
			'group'       => esc_html__( 'Width & Responsiveness', 'js_composer' ),
			'description' => esc_html__( 'Select column width.', 'js_composer' ),
			'std'         => '1/1'
		),
		array(
			'type'        => 'column_offset',
			'heading'     => esc_html__( 'Responsiveness', 'js_composer' ),
			'param_name'  => 'offset',
			'group'       => esc_html__( 'Width & Responsiveness', 'js_composer' ),
			'description' => esc_html__( 'Adjust column for different screen sizes. Control width, offset and visibility settings.', 'js_composer' )
		)
	),
	'js_view'         => 'VcColumnView'
) );
vc_map( array(
	"name"                      => esc_html__( "Column", "js_composer" ),
	"base"                      => "vc_column_inner",
	"class"                     => "",
	"icon"                      => "",
	"wrapper_class"             => "",
	"controls"                  => "full",
	"allowed_container_element" => false,
	"content_element"           => false,
	"is_container"              => true,
	"params"                    => array(
		array(
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Font Color', 'js_composer' ),
			'param_name'       => 'font_color',
			'description'      => esc_html__( 'Select font color', 'js_composer' ),
			'edit_field_class' => 'vc_col-md-6 vc_column'
		),
		array(
			"type"        => "textfield",
			"heading"     => esc_html__( "Extra class name", "js_composer" ),
			"param_name"  => "el_class",
			"value"       => "",
			"description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" )
		),
		array(
			"type" => "css_editor",
			"heading" => esc_html__( 'CSS box', "js_composer" ),
			"param_name" => "css",
			"group" => esc_html__( 'Design Options', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Width', 'js_composer' ),
			'param_name'  => 'width',
			'value'       => $column_width_list,
			'group'       => esc_html__( 'Width & Responsiveness', 'js_composer' ),
			'description' => esc_html__( 'Select column width.', 'js_composer' ),
			'std'         => '1/1'
		),
		array(
			'type' => 'column_offset',
			'heading' => esc_html__( 'Responsiveness', 'js_composer' ),
			'param_name' => 'offset',
			'group' => esc_html__( 'Responsive Options', 'js_composer' ),
			'description' => esc_html__( 'Adjust column for different screen sizes. Control width, offset and visibility settings.', 'js_composer' )
		)
	),
	"js_view"                   => 'VcColumnView'
) );

// ==========================================================================================
// PRO ACCORDION
// ==========================================================================================
vc_map( array(
	'name'            => 'Custom Accordion',
	'base'            => 'pro_accordion',
	'is_container'    => true,
	'icon'            => get_template_directory_uri() . "/pro-framework/assets/img/accordions.png",
	'description'     => 'jQuery accordion',
	'category' 		  => 'Theme shortcodes',
	'params'          => array(
		array(
			'type'       => 'textfield',
			'heading'    => 'Active tab',
			'param_name' => 'active_tab',
		),
		array(
			'type'       => 'textfield',
			'heading'    => 'Class',
			'param_name' => 'class',
		),
		array(
			'type'       => 'vc_pro_on_off',
			'heading'    => 'No section icons',
			'param_name' => 'no_icons',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Icons Colors',
			'param_name' => 'icon_color',
			'group'      => 'Custom Colors',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Title Colors',
			'param_name' => 'title_color',
			'group'      => 'Custom Colors',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Border Colors',
			'param_name' => 'border_color',
			'group'      => 'Custom Colors',
		)
	),
	'custom_markup'   => '<div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">%content%</div><div class="tab_controls"><a class="add_tab" title="Add section"><span class="vc_icon"></span> <span class="tab-label">Add section</span></a></div>',
	'default_content' => '


    [pro_accordion_tab title="Section 1"][/pro_accordion_tab]


    [pro_accordion_tab title="Section 2"][/pro_accordion_tab]


  ',
	'js_view'         => 'VcAccordionView'
) );

// ==========================================================================================
// PRO ACCORDION TAB
// ==========================================================================================
vc_map( array(
	'name'                      => 'Accordion Section',
	'base'                      => 'pro_accordion_tab',
	'allowed_container_element' => 'vc_row',
	'is_container'              => true,
	'content_element'           => false,
	'params'                    => array(
		array(
			'type'       => 'textfield',
			'heading'    => 'Title',
			'param_name' => 'title',
		),
		array(
			'type'       => 'vc_pro_icon',
			'heading'    => 'Icon',
			'param_name' => 'icon',
		)
	),
	'js_view'                   => 'VcAccordionTabView'
) );

// ==========================================================================================
// PRO ALERT
// ==========================================================================================
vc_map( array(
	'name'        => 'Alert',
	'base'        => 'pro_alert',
	'icon'        => get_template_directory_uri() . "/pro-framework/assets/img/alert.png",
	'description' => 'Alert box',
	'category' => 'Theme shortcodes',
	'params'      => array(
		array(
			'type'       => 'dropdown',
			'param_name' => 'type',
			'heading'    => 'Type',
			'value'      => array(
				'Success' => 'success',
				'Info'    => 'info',
				'Warning' => 'warning',
				'Danger'  => 'danger',
				'Note'    => 'note',
			),
		),
		array(
			'type'       => 'vc_pro_icon',
			'param_name' => 'icon',
			'heading'    => 'Icon',
		),
		array(
			'type'       => 'textarea_html',
			'holder'     => 'div',
			'heading'    => 'Content',
			'param_name' => 'content',
			'value'      => '<p>I am alert box. Click edit button to change this text.</p>',
		),
		array(
			'type'       => 'vc_pro_on_off',
			'heading'    => 'Outlined',
			'param_name' => 'outlined',
		),
		array(
			'type'       => 'vc_pro_on_off',
			'heading'    => 'Close Button',
			'param_name' => 'close',
		),
		$vc_map_animation,
		$vc_map_animation_delay,
		$vc_map_animation_duration,
		// Custom Colors
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Background Color',
			'param_name' => 'bgcolor',
			'group'      => 'Custom Colors',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Border Color',
			'param_name' => 'border_color',
			'group'      => 'Custom Colors',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Text Color',
			'param_name' => 'text_color',
			'group'      => 'Custom Colors',
		),
		// Extars
		$vc_map_extra_id,
		$vc_map_extra_class,
		$vc_map_extra_style,
	),
) );

// ==========================================================================================
// PRO BLOCKQUOTE
// ==========================================================================================
vc_map( array(
	'name'        => 'BlockQuote',
	'base'        => 'pro_blockquote',
	'icon'        => get_template_directory_uri() . "/pro-framework/assets/img/quote.png",
	'description' => 'Create a blockquote',
	'category' => 'Theme shortcodes',
	'params'      => array(
		array(
			'type'       => 'textarea_html',
			'holder'     => 'div',
			'heading'    => 'Text',
			'param_name' => 'content',
			'value'      => '<p>I am text block. Click edit button to change this text.</p>',
		),
		array(
			'type'       => 'textfield',
			'heading'    => 'Cite',
			'param_name' => 'cite',
		),
		// Extras
		array(
			'type'       => 'dropdown',
			'heading'    => 'Type',
			'param_name' => 'type',
			'value'      => array(
				'Select a type'    => '',
				'Quote Left Half'  => 'left',
				'Quote Right Half' => 'right',
			),
			'group'      => 'Extras',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Border Color',
			'param_name' => 'border_color',
			'group'      => 'Extras',
		),
		array(
			'type'       => 'vc_pro_on_off',
			'heading'    => 'Use Quote Icon',
			'param_name' => 'icon',
			'group'      => 'Extras',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Icon Color',
			'param_name' => 'icon_color',
			'dependency' => array( 'element' => 'icon', 'not_empty' => true ),
			'group'      => 'Extras',
		),
		array(
			'type'       => 'textfield',
			'heading'    => 'Icon Size',
			'param_name' => 'icon_size',
			'dependency' => array( 'element' => 'icon', 'not_empty' => true ),
			'group'      => 'Extras',
		),
		$vc_map_extra_id,
		$vc_map_extra_class,
		$vc_map_extra_style,
	)
) );

// ==========================================================================================
// PRO BLOG
// ==========================================================================================
vc_map( array(
	'name'        => 'Blog',
	'base'        => 'pro_blog',
	'icon'        => get_template_directory_uri() . "/pro-framework/assets/img/blog.png",
	'description' => 'Create a blog',
	'category' => 'Theme shortcodes',
	'params'      => array(
		array(
			'type'        => 'vc_pro_chosen',
			'heading'     => 'Custom Categories',
			'param_name'  => 'cats',
			'placeholder' => 'Choose category (optional)',
			'value'       => pro_element_values( 'categories', array(
        			'sort_order'  => 'ASC',
        			
        			'hide_empty'  => 0,
      			) ),
		      	'std'         => '',
		      	'description' => 'you can choose spesific categories for blog, default is all categories',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Type',
			'param_name' => 'type',
			'value'      => array(
				'Blog Large Image' => 'default',
				'Blog Small Image' => 'small',
				'Blog Masonry'     => 'masonry',
				'Blog Grid'        => 'grid',
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Image Size',
			'param_name' => 'size',
			'value'      => webuild_get_image_sizes( true ),
			'std'        => 'blog-large-image',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Columns',
			'param_name' => 'columns',
			'value'      => array(
				'3 Columns' => '',
				'4 Columns' => 4,
				'6 Columns' => 6,
				'2 Columns' => 2,
			),
			'dependency' => array( 'element' => 'type', 'value' => array( 'masonry', 'grid' ) ),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Pagination',
			'param_name' => 'nav',
			'value'      => array(
				'Pagination' => 'paging',
				'Load More'  => 'load',
				'Hide'       => 'hide',
			),
		),
		array(
			'type'       => 'textfield',
			'heading'    => 'Posts Per Page',
			'param_name' => 'limit',
			'value'      => get_option( 'posts_per_page' ),
		),
		$vc_map_extra_id,
		$vc_map_extra_class,
	)
) );

// ==========================================================================================
// PRO BUTTON
// ==========================================================================================
vc_map( array(
	'name'        => 'Button',
	'base'        => 'pro_button',
	'icon'        => get_template_directory_uri() . "/pro-framework/assets/img/button.png",
	'description' => 'Create Sweetly Button',
	'category' => 'Theme shortcodes',
	'params'      => array(
		array(
			'type'       => 'vc_link',
			'heading'    => 'Link',
			'param_name' => 'href',
		),
		array(
			'type'       => 'vc_pro_icon',
			'heading'    => 'Icon',
			'param_name' => 'icon',
		),
		array(
			'type'        => 'textarea',
			'heading'     => 'Content',
			'param_name'  => 'content',
			'value'       => 'Click',
			'admin_label' => true,
		),
		// Types
		array(
			'type'             => 'dropdown',
			'heading'          => 'Type',
			'param_name'       => 'type',
			'edit_field_class' => 'vc_col-md-five vc_column',
			'value'            => $vc_params_button_type,
		),
		array(
			'type'             => 'dropdown',
			'heading'          => 'Shape',
			'param_name'       => 'shape',
			'edit_field_class' => 'vc_col-md-five vc_column',
			'value'            => $vc_params_button_shape,
		),
		array(
			'type'             => 'dropdown',
			'heading'          => 'Size',
			'param_name'       => 'size',
			'edit_field_class' => 'vc_col-md-five vc_column',
			'value'            => $vc_params_button_size,
			'std'              => 'sm',
		),
		array(
			'type'             => 'dropdown',
			'heading'          => 'Color',
			'param_name'       => 'color',
			'edit_field_class' => 'vc_col-md-five vc_column',
			'value'            => array(
				'Accent' => 'accent',
				'Blue'   => 'blue',
				'Green'  => 'green',
				'Red'    => 'red',
				'Yellow' => 'yellow',
				'Black'  => 'black',
				'White'  => 'white',
			),
		),
		array(
			'type'             => 'dropdown',
			'heading'          => 'Align',
			'param_name'       => 'align',
			'edit_field_class' => 'vc_col-md-five vc_column',
			'value'            => $vc_params_button_align,
		),
		// Helpful
		array(
			'type'             => 'vc_pro_on_off',
			'heading'          => 'Full Block',
			'param_name'       => 'block',
			'edit_field_class' => 'vc_col-md-five vc_column',
		),
		array(
			'type'             => 'vc_pro_on_off',
			'heading'          => 'Text Shadow',
			'param_name'       => 'textshadow',
			'edit_field_class' => 'vc_col-md-five vc_column',
		),
		array(
			'type'             => 'vc_pro_on_off',
			'heading'          => 'No Uppercase',
			'param_name'       => 'no_uppercase',
			'edit_field_class' => 'vc_col-md-five vc_column',
		),
		array(
			'type'             => 'vc_pro_on_off',
			'heading'          => 'No Bold',
			'param_name'       => 'no_bold',
			'edit_field_class' => 'vc_col-md-five vc_column',
		),
		array(
			'type'             => 'vc_pro_on_off',
			'heading'          => 'No Transition',
			'param_name'       => 'no_transition',
			'edit_field_class' => 'vc_col-md-five vc_column',
		),
		// Customize
		array(
			'type'             => 'vc_pro_content',
			'content'          => '<h2>Custom Colors</h2>',
			'param_name'       => 'notice-colors',
			'edit_field_class' => 'vc_col-md-6 vc_column',
			'group'            => 'Custom Colors',
		),
		array(
			'type'             => 'vc_pro_content',
			'content'          => '<h2>Custom Hover Colors</h2>',
			'param_name'       => 'notice-hover-colors',
			'edit_field_class' => 'vc_col-md-6 vc_column vc_no_top_padding',
			'group'            => 'Custom Colors',
		),
		array(
			'type'             => 'colorpicker',
			'heading'          => 'Background Color',
			'param_name'       => 'bgcolor',
			'edit_field_class' => 'vc_col-md-6 vc_column',
			'group'            => 'Custom Colors',
		),
		array(
			'type'             => 'colorpicker',
			'heading'          => 'Background Hover Color',
			'param_name'       => 'bghovercolor',
			'edit_field_class' => 'vc_col-md-6 vc_column',
			'group'            => 'Custom Colors'
		),
		array(
			'type'             => 'colorpicker',
			'heading'          => 'Text Color',
			'param_name'       => 'textcolor',
			'edit_field_class' => 'vc_col-md-6 vc_column',
			'group'            => 'Custom Colors'
		),
		array(
			'type'             => 'colorpicker',
			'heading'          => 'Text Hover Color',
			'param_name'       => 'texthovercolor',
			'edit_field_class' => 'vc_col-md-6 vc_column',
			'group'            => 'Custom Colors'
		),
		array(
			'type'             => 'colorpicker',
			'heading'          => 'Border Color',
			'param_name'       => 'bordercolor',
			'edit_field_class' => 'vc_col-md-6 vc_column',
			'group'            => 'Custom Colors'
		),
		array(
			'type'             => 'colorpicker',
			'heading'          => 'Border Hover Color',
			'param_name'       => 'borderhovercolor',
			'edit_field_class' => 'vc_col-md-6 vc_column',
			'group'            => 'Custom Colors'
		),
		array(
			'type'             => 'vc_pro_style_textarea',
			'heading'          => 'Custom CSS',
			'param_name'       => 'in_style',
			'placeholder'      => 'eg. border-radius: 0;',
			'edit_field_class' => 'vc_col-md-6 vc_column',
			'group'            => 'Custom Colors'
		),
		array(
			'type'             => 'vc_pro_style_textarea',
			'heading'          => 'Custom Hover CSS',
			'param_name'       => 'in_style_hover',
			'placeholder'      => 'eg. border-radius: 10px;',
			'edit_field_class' => 'vc_col-md-6 vc_column',
			'group'            => 'Custom Colors'
		),
		$vc_map_animation,
		$vc_map_animation_delay,
		$vc_map_animation_duration,
		// Extras
		$vc_map_extra_id,
		$vc_map_extra_class,
	)
) );

// ==========================================================================================
// PRO BUTTON GROUP
// ==========================================================================================
vc_map( array(
	'name'                    => 'Button Group',
	'base'                    => 'pro_button_group',
	'icon'                    => get_template_directory_uri() . "/pro-framework/assets/img/dual-button.png",
	'description'             => 'Create sweetly button group',
	'params'                  => $vc_map_defaults,
	'as_parent'               => array( 'only' => 'pro_button' ),
	'content_element'         => true,
	'show_settings_on_create' => false,
	'category'					=> 'Theme shortcodes',
	'js_view'                 => 'VcColumnView',
) );

// ==========================================================================================
// PRO Clients 
// ==========================================================================================
vc_map( array(
	'name'        => 'Clients',
	'base'        => 'pro_clients',
	'icon'        => get_template_directory_uri() . "/pro-framework/assets/img/clients.png",
	'description' => 'Load clients',
	'category' => 'Theme shortcodes',
	'params'      => array(
		array(
			'type'       => 'dropdown',
			'heading'    => 'Clients groups',
			'param_name' => 'clients_groups',
			'value'      => pro_element_values( 'categories', array(
				'sort_order' => 'ASC',
				'taxonomy'   => 'clients-categories',
				'hide_empty' => 0
			) )
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Columns',
			'param_name' => 'columns',
			'value'      => array(
				'1'  => '1',
				'2'  => '2',
				'3'  => '3',
				'4'  => '4',
				'5'  => '5',
				'6'  => '6',
				'7'  => '7',
				'8'  => '8',
				'9'  => '9',
				'10' => '10'
			)
		),
		array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => esc_html__( "Hover effect?", 'pro_framework' ),
			"param_name"  => "hover_effect",
			'value'       => array( esc_html__( "No", 'pro_framework' ) => "no", esc_html__( "Yes", 'pro_framework' ) => "yes", ),
			"description" => esc_html__( "Select if you want the carousel to rotate automatically.", 'pro_framework' )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Border color", 'pro_framework' ),
			"param_name"  => "border_color",
			"value"       => '#fff', //Default Red color
			"description" => esc_html__( "Choose border color (optional)", 'pro_framework' )
		)
	)
) );

// ==========================================================================================
// PRO Clients carousel
// ==========================================================================================
vc_map( array(
	'name'        => 'Clients carousel',
	'base'        => 'pro_clients_carousel',
	'icon'        => get_template_directory_uri() . "/pro-framework/assets/img/clients-carousel.png",
	'description' => 'Load clients into a carousel',
	'category' => 'Theme shortcodes',
	'params'      => array(
		array(
			'type'       => 'dropdown',
			'heading'    => 'Clients groups',
			'param_name' => 'clients_groups',
			'value'      => pro_element_values( 'categories', array(
				'sort_order' => 'ASC',
				'taxonomy'   => 'clients-categories',
				'hide_empty' => 0
			) )
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Columns',
			'param_name' => 'columns',
			'value'      => array(
				'1'  => '1',
				'2'  => '2',
				'3'  => '3',
				'4'  => '4',
				'5'  => '5',
				'6'  => '6',
				'7'  => '7',
				'8'  => '8',
				'9'  => '9',
				'10' => '10'
			)
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Border color", 'pro_framework' ),
			"param_name"  => "border_color",
			"value"       => '#fff', //Default Red color
			"description" => esc_html__( "Choose border color (optional)", 'pro_framework' )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Arrow color", 'pro_framework' ),
			"param_name"  => "arrow_color",
			"value"       => '#fff', //Default Red color
			"description" => esc_html__( "Choose arrow color (optional)", 'pro_framework' )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Arrow background color", 'pro_framework' ),
			"param_name"  => "arrow_bg_color",
			"value"       => '#2E3841', //Default Red color
			"description" => esc_html__( "Choose arrow background color (optional)", 'pro_framework' )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Arrow background hover color", 'pro_framework' ),
			"param_name"  => "arrow_bg_hover_color",
			"value"       => '#f7c51e', //Default Red color
			"description" => esc_html__( "Choose arrow hover color (optional)", 'pro_framework' )
		)
	)
) );

// ==========================================================================================
// PRO CTA
// ==========================================================================================
$cta_unique_id_1 = time() . '-1-' . rand( 0, 100 );
$cta_unique_id_2 = time() . '-2-' . rand( 0, 100 );
vc_map( array(
	"name"            => 'Call to Action',
	'base'            => 'pro_cta',
	'is_container'    => true,
	'icon'            => get_template_directory_uri() . "/pro-framework/assets/img/call-to-action.png",
	'class'           => 'wpb_vc_tabs',
	'description'     => 'Call to action content',
	'category' 		  => 'Theme shortcodes',
	'params'          => array(
		array(
			'type'       => 'dropdown',
			'heading'    => 'Color Type',
			'param_name' => 'type',
			'value'      => array(
				'Outlined'           => 'outlined',
				'Background Colored' => 'bgcolor',
			)
		),
		array(
			'type'             => 'vc_pro_on_off',
			'heading'          => 'Highlight Top',
			'param_name'       => 'top',
			'edit_field_class' => 'vc_col-md-3 vc_column',
			'dependency'       => array( 'element' => 'type', 'value' => array( 'outlined' ) ),
		),
		array(
			'type'             => 'vc_pro_on_off',
			'heading'          => 'Highlight Right',
			'param_name'       => 'right',
			'edit_field_class' => 'vc_col-md-3 vc_column',
			'dependency'       => array( 'element' => 'type', 'value' => array( 'outlined' ) ),
		),
		array(
			'type'             => 'vc_pro_on_off',
			'heading'          => 'Highlight Bottom',
			'param_name'       => 'bottom',
			'edit_field_class' => 'vc_col-md-3 vc_column',
			'dependency'       => array( 'element' => 'type', 'value' => array( 'outlined' ) ),
		),
		array(
			'type'             => 'vc_pro_on_off',
			'heading'          => 'Highlight Left',
			'param_name'       => 'left',
			'edit_field_class' => 'vc_col-md-3 vc_column',
			'dependency'       => array( 'element' => 'type', 'value' => array( 'outlined' ) ),
		),
		// Custom Colors
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Background Color',
			'param_name' => 'bgcolor',
			'group'      => 'Custom Colors',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Border Color',
			'param_name' => 'border_color',
			'group'      => 'Custom Colors',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Border Highlight Color',
			'param_name' => 'border_hcolor',
			'group'      => 'Custom Colors',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Text Color',
			'param_name' => 'text_color',
			'group'      => 'Custom Colors',
		),
		// Extars
		$vc_map_extra_id,
		$vc_map_extra_class,
		$vc_map_extra_style,
	),
	'custom_markup'   => '<div class="wpb_tabs_holder wpb_holder vc_container_for_children"><ul class="tabs_controls"></ul>%content%</div>',
	'default_content' => '


    [pro_cta_block title="CTA Block Primary" tab_id="' . $cta_unique_id_1 . '"][/pro_cta_block]


    [pro_cta_block title="CTA Block Secondary" tab_id="' . $cta_unique_id_2 . '"][/pro_cta_block]',
	'js_view'         => 'VcTabsView'
) );

// ==========================================================================================
// PRO CTA BLOCK
// ==========================================================================================
vc_map( array(
	'name'                      => 'Call to Action Block',
	'base'                      => 'pro_cta_block',
	'allowed_container_element' => 'vc_row',
	'as_parent'                 => array( 'only' => 'webuild_button, webuild_button_group ,vc_column_text,vc_ultimate_spacer' ),
	'is_container'              => true,
	'content_element'           => false,
	'params'                    => array(
		array(
			'type'       => 'tab_id',
			'heading'    => 'Tab Unique ID',
			'param_name' => 'tab_id'
		)
	),
	'js_view'                   => 'VcTabView'
) );

// ==========================================================================================
// PRO Divider with Icon
// ==========================================================================================
vc_map( array(
	'name'        => 'Divider with Icon',
	'base'        => 'pro_divider_icon',
	'icon'        => get_template_directory_uri() . "/pro-framework/assets/img/divider-with-icon.png",
	'description' => 'Create a divider with icon or text',
	'category' => 'Theme shortcodes',
	'params'      => array(
		array(
			'type'       => 'vc_pro_icon',
			'heading'    => 'Icon',
			'param_name' => 'icon',
		),
		array(
			'type'        => 'textfield',
			'heading'     => 'Text',
			'param_name'  => 'text',
			'admin_label' => true,
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Icon & Text Align',
			'param_name' => 'align',
			'value'      => array(
				'Center' => 'center',
				'Left'   => 'left',
				'Right'  => 'right',
			),
		),
		array(
			'type'       => 'textfield',
			'heading'    => 'Icon & Text Size',
			'param_name' => 'size',
		),
		// Custom Colors
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Icon & Text Color',
			'param_name' => 'color',
			'group'      => 'Custom Colors',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Border Color',
			'param_name' => 'border_color',
			'group'      => 'Custom Colors',
		),
		// Extras
		array(
			'type'       => 'dropdown',
			'heading'    => 'Border Type',
			'param_name' => 'border_type',
			'value'      => array(
				'Solid'  => '',
				'Dashed' => 'dashed',
				'Dotted' => 'dotted',
				'Double' => 'double',
			),
			'group'      => 'Extras',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Width',
			'param_name' => 'width',
			'value'      => array(
				'100%'   => '',
				'75%'    => '75%',
				'50%'    => '50%',
				'25%'    => '25%',
				'10%'    => '10%',
				'5%'     => '5%',
				'custom' => 'custom',
			),
			'group'      => 'Extras',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Margin (spacing)',
			'param_name' => 'margin',
			'value'      => array(
				'sm'     => '',
				'xs'     => 'xs',
				'md'     => 'md',
				'lg'     => 'lg',
				'xl'     => 'xl',
				'custom' => 'custom',
			),
			'group'      => 'Extras',
		),
		array(
			'type'       => 'textfield',
			'heading'    => 'Margin Top',
			'param_name' => 'margin_top',
			'dependency' => array( 'element' => 'margin', 'value' => array( 'custom' ) ),
			'group'      => 'Extras',
		),
		array(
			'type'       => 'textfield',
			'heading'    => 'Margin Bottom',
			'param_name' => 'margin_bottom',
			'dependency' => array( 'element' => 'margin', 'value' => array( 'custom' ) ),
			'group'      => 'Extras',
		),
		array(
			'type'       => 'vc_pro_on_off',
			'heading'    => 'No Border Space',
			'param_name' => 'no_space',
			'group'      => 'Extras',
		),
		array(
			'type'       => 'vc_pro_shortcode_textarea',
			'heading'    => 'Custom Content',
			'param_name' => 'content',
			'group'      => 'Extras',
		),
		$vc_map_extra_id,
		$vc_map_extra_class,
		$vc_map_extra_style,
	)
) );

// ==========================================================================================
// PRO FAQ
// ==========================================================================================
$faq_unique_id_1 = time() . '-1-' . rand( 0, 100 );
$faq_unique_id_2 = time() . '-2-' . rand( 0, 100 );
$faq_unique_id_3 = time() . '-3-' . rand( 0, 100 );
vc_map( array(
	'name'                    => 'FAQ',
	'base'                    => 'pro_faq',
	'icon'                    => get_template_directory_uri() . "/pro-framework/assets/img/faq.png",
	'description'             => 'Create a faq',
	'class'                   => 'wpb_vc_tabs',
	'category' => 'Theme shortcodes',
	'is_container'            => true,
	'show_settings_on_create' => false,
	'params'                  => $vc_map_defaults,
	'custom_markup'           => '<div class="wpb_tabs_holder wpb_holder vc_container_for_children"><ul class="tabs_controls"></ul>%content%</div>',
	'default_content'         => '


    [pro_faq_block title="FAQ 1" tab_id="' . $faq_unique_id_1 . '"][vc_toggle title="Question"]Answer[/vc_toggle][/pro_faq_block]


    [pro_faq_block title="FAQ 2" tab_id="' . $faq_unique_id_2 . '"][vc_toggle title="Question"]Answer[/vc_toggle][/pro_faq_block]


    [pro_faq_block title="FAQ 3" tab_id="' . $faq_unique_id_3 . '"][vc_toggle title="Question"]Answer[/vc_toggle][/pro_faq_block]',
	'js_view'                 => 'PROFAQSView'
) );

// ==========================================================================================
// PRO FAQ BLOCK
// ==========================================================================================
vc_map( array(
	'name'                      => 'FAQ Block',
	'base'                      => 'pro_faq_block',
	'allowed_container_element' => 'vc_row',
	'as_parent'                 => array( 'only' => 'vc_toggle' ),
	'is_container'              => true,
	'content_element'           => false,
	'params'                    => array(
		array(
			'type'       => 'tab_id',
			'heading'    => 'Tab Unique ID',
			'param_name' => 'tab_id'
		),
		array(
			'type'       => 'textfield',
			'heading'    => 'Title',
			'param_name' => 'title',
		),
	),
	'js_view'                   => 'PROFAQView'
) );

// ==========================================================================================
// PRO ICONBOX
// ==========================================================================================
vc_map( array(
	'name'        => 'Icon Box',
	'base'        => 'pro_iconbox',
	'icon'        => get_template_directory_uri() . "/pro-framework/assets/img/icon-box.png",
	'description' => 'Create an iconbox',
	'category' => 'Theme shortcodes',
	'params'      => array(
		array(
			'type'       => 'textfield',
			'heading'    => 'Box Title',
			'param_name' => 'title',
		),
		array(
			'type'        => 'textarea_html',
			'heading'     => 'Box Content',
			'param_name'  => 'content',
			'admin_label' => true,
		),
		$vc_map_animation,
		$vc_map_animation_delay,
		$vc_map_animation_duration,
		// icon tab
		array(
			'type'       => 'vc_pro_icon',
			'heading'    => 'Select box icon',
			'param_name' => 'icon',
			'group'      => 'Box Icon',
		),
		array(
			'type'        => 'dropdown',
			'heading'     => 'Icon and Text Align',
			'param_name'  => 'align',
			'description' => 'Set icon position, also this is text align',
			'value'       => array(
				'Box Left'      => 'left',
				'Box Center'    => 'center',
				'Box Right'     => 'right',
				'Heading Left'  => 'heading-left',
				'Heading Right' => 'heading-right',
			),
			'group'       => 'Box Icon',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Icon Type',
			'param_name' => 'icon_type',
			'value'      => array(
				'Background Color' => 'bgcolor',
				'Outlined'         => 'outlined',
				'Bordered'         => 'bordered',
				'No Colors'        => 'nocolor',
			),
			'group'      => 'Box Icon',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Icon Shape',
			'param_name' => 'icon_shape',
			'value'      => array(
				'Square'  => 'square',
				'Circle'  => 'circle',
				'Rounded' => 'rounded',
			),
			'group'      => 'Box Icon',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Icon Size',
			'param_name' => 'icon_size',
			'value'      => array(
				'XX Small' => 'xxs',
				'X Small'  => 'xs',
				'Small'    => 'sm',
				'Medium'   => 'md',
				'Large'    => 'lg',
				'X Large'  => 'xl',
				'XX Large' => 'xxl',
				'Custom'   => 'custom',
			),
			'std'        => 'sm',
			'group'      => 'Box Icon',
		),
		array(
			'type'             => 'textfield',
			'heading'          => 'Icon Size',
			'param_name'       => 'custom_icon_size',
			'edit_field_class' => 'vc_col-md-6 vc_column',
			'dependency'       => array( 'element' => 'icon_size', 'value' => array( 'custom' ) ),
			'group'            => 'Box Icon',
		),
		array(
			'type'             => 'textfield',
			'heading'          => 'Icon Spacing',
			'param_name'       => 'custom_icon_spacing',
			'edit_field_class' => 'vc_col-md-6 vc_column',
			'dependency'       => array( 'element' => 'icon_size', 'value' => array( 'custom' ) ),
			'group'            => 'Box Icon',
		),
		array(
			'type'       => 'textfield',
			'heading'    => 'Icon Border Width',
			'param_name' => 'icon_border_width',
			'group'      => 'Box Icon',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Icon Border Style',
			'param_name' => 'icon_border_style',
			'value'      => array(
				'Solid'  => '',
				'Dashed' => 'dashed',
				'Dotted' => 'dotted',
				'Double' => 'double',
				'Groove' => 'groove',
				'Ridge'  => 'ridge',
				'Inset'  => 'inset',
				'Outset' => 'outset',
			),
			'group'      => 'Box Icon',
		),
		// Customize
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Icon Background Color',
			'param_name' => 'icon_background',
			'group'      => 'Custom Colors',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Icon Border Color',
			'param_name' => 'icon_border',
			'group'      => 'Custom Colors',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Icon Color',
			'param_name' => 'icon_color',
			'group'      => 'Custom Colors',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Title Color',
			'param_name' => 'title_color',
			'group'      => 'Custom Colors',
		),
		// Box Extras
		array(
			'type'       => 'vc_link',
			'heading'    => 'Box Link',
			'param_name' => 'link',
			'group'      => 'Extras',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Apply link to',
			'param_name' => 'apply_link',
			'value'      => array(
				'Box'   => '',
				'Title' => 'Title',
			),
			'group'      => 'Extras',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Box Title Size',
			'param_name' => 'title_size',
			'value'      => array(
				'Select a heading' => '',
				'h1'               => 'h1',
				'h2'               => 'h2',
				'h3'               => 'h3',
				'h4'               => 'h4',
				'h5'               => 'h5',
				'h6'               => 'h6',
				'custom'           => 'custom',
			),
			'group'      => 'Extras',
		),
		array(
			'type'       => 'textfield',
			'heading'    => 'Custom Title Size',
			'param_name' => 'custom_title_size',
			'dependency' => array( 'element' => 'title_size', 'value' => array( 'custom' ) ),
			'group'      => 'Extras',
		),
		array(
			'type'       => 'vc_pro_on_off',
			'heading'    => 'Icon Hover Effect',
			'param_name' => 'effect',
			'group'      => 'Extras',
		),
		$vc_map_extra_id,
		$vc_map_extra_class,
		$vc_map_extra_style,
	),
) );

// ==========================================================================================
// PRO PORTFOLIO
// ==========================================================================================
vc_map( array(
	'name'        => 'Portfolio',
	'base'        => 'pro_portfolio',
	'icon'        => get_template_directory_uri() . "/pro-framework/assets/img/portfolio.png",
	'description' => 'Create a portfolio',
	'category' => 'Theme shortcodes',
	'params'      => array(
		array(
			'type'        => 'vc_pro_chosen',
			'heading'     => 'Custom Categories',
			'param_name'  => 'cats',
			'placeholder' => 'Choose category (optional)',
			'value'       => pro_element_values( 'categories', array(
				'sort_order' => 'ASC',
				'taxonomy'   => 'portfolio-category',
				'hide_empty' => 0,
			) ),
			'std'         => '',
			'description' => 'you can choose spesific categories for portfolio, default is all categories',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Style',
			'param_name' => 'style',
			'value'      => array(
				'Default'       => 'default',
				'Without Space' => 'without-space',
				'With 1px'      => 'with-one-px',
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Layout',
			'param_name' => 'layout',
			'value'      => array(
				'Masonry' => 'masonry',
				'Grid'    => 'fitRows',
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Model',
			'param_name' => 'model',
			'value'      => array(
				'Default'          => 'default',
				'Lightbox Gallery' => 'gallery',
				'Text'             => 'text',
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Columns',
			'param_name' => 'columns',
			'value'      => array(
				'1 Column'   => 1,
				'2 Columns'  => 2,
				'3 Columns'  => 3,
				'4 Columns'  => 4,
				'5 Columns'  => 5,
				'6 Columns'  => 6,
				'7 Columns'  => 7,
				'8 Columns'  => 8,
				'9 Columns'  => 9,
				'10 Columns' => 10,
				'11 Columns' => 11,
				'12 Columns' => 12,
			),
			'std'        => 3,
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Thumbnail Size (optional)',
			'param_name' => 'size',
			'value'      => webuild_get_image_sizes( true ),
			'std'        => 'large',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Pagination Type',
			'param_name' => 'nav',
			'value'      => array(
				'Pagination' => 'paging',
				'Load More'  => 'load',
				'Hide'       => 'hide',
			),
		),
		array(
			'type'       => 'textfield',
			'heading'    => 'Posts Per Page',
			'param_name' => 'limit',
			'value'      => 9,
		),
		// Customize Filter
		array(
			'type'       => 'vc_pro_on_off',
			'heading'    => 'No Filterable',
			'param_name' => 'no_filter',
			'group'      => 'Customize Filter',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Filter Color',
			'param_name' => 'filter_color',
			'group'      => 'Customize Filter',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Filter Active Color',
			'param_name' => 'filter_hover_color',
			'group'      => 'Customize Filter',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Filter Align',
			'param_name' => 'filter_align',
			'value'      => array(
				'Left'   => 'left',
				'Center' => 'center',
				'Right'  => 'right',
			),
			'std'        => 'center',
			'group'      => 'Customize Filter',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Filter Shape',
			'param_name' => 'filter_shape',
			'value'      => array(
				'pill'    => 'pill',
				'rounded' => 'rounded',
				'square'  => 'square',
			),
			'group'      => 'Customize Filter',
		),
		array(
			'type'       => 'textfield',
			'heading'    => 'Filter Border Width',
			'param_name' => 'filter_border_width',
			'group'      => 'Customize Filter',
		),
		// Extras
		array(
			'type'       => 'vc_pro_on_off',
			'heading'    => 'No Love Button',
			'param_name' => 'no_love',
			'group'      => 'Extras',
		),
		$vc_map_extra_id,
		$vc_map_extra_class,
		$vc_map_extra_style,
	)
) );

// ==========================================================================================
// PRO PRICING
// ==========================================================================================
vc_map( array(
	'name'                    => 'Pricing Table',
	'base'                    => 'pro_pricing_table',
	'icon'                    => get_template_directory_uri() . "/pro-framework/assets/img/pricing-table.png",
	'description'             => 'Create a pricing table',
	'params'                  => $vc_map_defaults,
	'as_parent'               => array( 'only' => 'pro_pricing_column' ),
	'show_settings_on_create' => false,
	'category'				  => 'Theme shortcodes',
	'js_view'                 => 'VcColumnView',
) );

vc_map( array(
	'name'        => 'Pricing Column',
	'base'        => 'pro_pricing_column',
	'icon'        => get_template_directory_uri() . "/pro-framework/assets/img/pricing-table.png",
	'description' => 'Create a pricing column',
	'as_child'    => array( 'only' => 'pro_pricing_table' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => 'Title',
			'param_name'  => 'title',
			'admin_label' => true,
		),
		array(
			'type'             => 'vc_pro_textfield',
			'heading'          => 'Price',
			'param_name'       => 'price',
			'placeholder'      => 99,
			'edit_field_class' => 'vc_col-md-3 vc_column',
		),
		array(
			'type'             => 'vc_pro_textfield',
			'heading'          => 'Price Subtitle',
			'param_name'       => 'subtitle',
			'placeholder'      => 'BEST SELLER',
			'edit_field_class' => 'vc_col-md-3 vc_column',
		),
		array(
			'type'             => 'vc_pro_textfield',
			'heading'          => 'Currency',
			'param_name'       => 'currency',
			'placeholder'      => '$',
			'edit_field_class' => 'vc_col-md-3 vc_column',
		),
		array(
			'type'             => 'vc_pro_textfield',
			'heading'          => 'Interval',
			'param_name'       => 'interval',
			'placeholder'      => 'per year',
			'edit_field_class' => 'vc_col-md-3 vc_column',
		),
		array(
			'type'        => 'vc_pro_exploded_textarea',
			'heading'     => 'Features',
			'param_name'  => 'content',
			'value'       => 'some~feature~here',
			'description' => 'textarea, where each line will be imploded with comma (~)',
		),
		// Custom Colors
		array(
			'type'       => 'vc_pro_on_off',
			'heading'    => 'Featured Column',
			'param_name' => 'featured',
			'label'      => 'Set this column as featured!',
			'group'      => 'Custom Colors',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Predefined Colors',
			'param_name' => 'color',
			'value'      => array(
				'Accent' => 'accent',
				'Blue'   => 'blue',
				'Green'  => 'green',
				'Red'    => 'red',
				'Yellow' => 'yellow',
				'Gray'   => 'gray',
				'Black'  => 'black',
				'Custom' => 'custom',
			),
			'group'      => 'Custom Colors',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Title Background Color',
			'param_name' => 'title_bgcolor',
			'dependency' => array( 'element' => 'color', 'value' => array( 'custom' ) ),
			'group'      => 'Custom Colors',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Title Color',
			'param_name' => 'title_color',
			'dependency' => array( 'element' => 'color', 'value' => array( 'custom' ) ),
			'group'      => 'Custom Colors',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Price Background Color',
			'param_name' => 'price_bgcolor',
			'dependency' => array( 'element' => 'color', 'value' => array( 'custom' ) ),
			'group'      => 'Custom Colors',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Price Color',
			'param_name' => 'price_color',
			'dependency' => array( 'element' => 'color', 'value' => array( 'custom' ) ),
			'group'      => 'Custom Colors',
		),
		// Price Button
		array(
			'type'       => 'textfield',
			'heading'    => 'Button Text',
			'param_name' => 'button_content',
			'value'      => '',
			'group'      => 'Button',
		),
		array(
			'type'       => 'vc_link',
			'heading'    => 'Link',
			'param_name' => 'button_link',
			'group'      => 'Button',
		),
		array(
			'type'       => 'vc_pro_icon',
			'heading'    => 'Icon',
			'param_name' => 'button_icon',
			'group'      => 'Button',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Type',
			'param_name' => 'button_type',
			'value'      => $vc_params_button_type,
			'group'      => 'Button',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Shape',
			'param_name' => 'button_shape',
			'value'      => $vc_params_button_shape,
			'group'      => 'Button',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Size',
			'param_name' => 'button_size',
			'value'      => $vc_params_button_size,
			'std'        => 'sm',
			'group'      => 'Button',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Color',
			'param_name' => 'button_color',
			'value'      => array(
				'Accent' => 'accent',
				'Blue'   => 'blue',
				'Green'  => 'green',
				'Red'    => 'red',
				'Yellow' => 'yellow',
				'Gray'   => 'gray',
				'Black'  => 'black',
			),
			'group'      => 'Button',
		),
		array(
			'type'       => 'vc_pro_on_off',
			'heading'    => 'Full Width Block Button',
			'param_name' => 'button_block',
			'group'      => 'Button',
		),
		// Extras
		$vc_map_extra_id,
		$vc_map_extra_class,
		$vc_map_extra_style,
	)
) );

// ==========================================================================================
// PRO RESPONSIVE SLIDER
// ==========================================================================================
vc_map( array(
	'name'        => 'Responsive Slider or Gallery',
	'base'        => 'pro_responsive_slider',
	'icon'        => get_template_directory_uri() . "/pro-framework/assets/img/responsive-slider.png",
	'description' => 'Create a responsive slider',
	'category'	  => 'Theme shortcodes',
	'params'      => array(
		array(
			'type'       => 'attach_images',
			'heading'    => 'Images',
			'param_name' => 'ids',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Type',
			'param_name' => 'protype',
			'value'      => array(
				'Slideshow'               => 'slideshow',
				'Gallery with Thumbnails' => 'gallery_thumb',
				'Gallery visibleNearby'   => 'gallery_nearby',
				'Gallery with Lightbox'   => 'gallery_lightbox',
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Image Scale',
			'param_name' => 'scale',
			'value'      => array(
				'Default'        => '',
				'Fill'           => 'fill',
				'Fit'            => 'fit',
				'Fit if smaller' => 'fit-if-smaller',
				'None'           => 'none',
			),
			'dependency' => array(
				'element' => 'protype',
				'value'   => array( 'slideshow', 'gallery_thumb', 'gallery_nearby' )
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Image Size',
			'param_name' => 'size',
			'value'      => webuild_get_image_sizes( true ),
			'std'        => 'large',
		),
		array(
			'type'             => 'vc_pro_textfield',
			'heading'          => 'Width (optional)',
			'param_name'       => 'width',
			'placeholder'      => 850,
			'edit_field_class' => 'vc_col-md-6 vc_column',
			'dependency'       => array(
				'element' => 'protype',
				'value'   => array( 'slideshow', 'gallery_thumb', 'gallery_nearby' )
			),
		),
		array(
			'type'             => 'vc_pro_textfield',
			'heading'          => 'Height (optional)',
			'param_name'       => 'height',
			'placeholder'      => 400,
			'edit_field_class' => 'vc_col-md-6 vc_column',
			'dependency'       => array(
				'element' => 'protype',
				'value'   => array( 'slideshow', 'gallery_thumb', 'gallery_nearby' )
			),
		),
		array(
			'type'        => 'vc_pro_textfield',
			'heading'     => 'Columns (optional)',
			'param_name'  => 'columns',
			'placeholder' => 3,
			'dependency'  => array( 'element' => 'protype', 'value' => array( 'gallery_lightbox' ) ),
		),
		// extra settings
		array(
			'type'       => 'vc_pro_content',
			'param_name' => 'notice-responsive-slider',
			'content'    => '<p class="pro-alert pro-alert-info">This settings is <strong>optional</strong>.</p>',
			'group'      => 'Extra Settings',
		),
		array(
			'type'       => 'vc_pro_on_off',
			'heading'    => 'Border',
			'param_name' => 'border',
			'group'      => 'Extra Settings',
		),
		array(
			'type'        => 'vc_pro_textfield',
			'heading'     => 'Autoplay',
			'param_name'  => 'autoplay',
			'placeholder' => '5000 = 5ms for each slide',
			'group'       => 'Extra Settings',
		),
		array(
			'type'        => 'vc_pro_textfield',
			'heading'     => 'Transition',
			'param_name'  => 'transition',
			'placeholder' => 'move or fade',
			'group'       => 'Extra Settings',
		),
		array(
			'type'       => 'vc_pro_on_off',
			'heading'    => 'Loop Slides',
			'param_name' => 'loop',
			'group'      => 'Extra Settings',
		),
		// extras
		$vc_map_extra_id,
		$vc_map_extra_class,
		$vc_map_extra_style,
	),
) );

// ==========================================================================================
// PRO Staff
// ==========================================================================================
vc_map( array(
	"name"        => "Staff",
	"base"        => "pro_staff",
	"class"       => "",
	"icon"        => "staff",
	'category' => 'Theme shortcodes',
	"description" => "Show your team members",
	"params"      => array(
		array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => esc_html__( "Hover effect?", 'pro_framework' ),
			"param_name"  => "hover_effect",
			'value'       => array( esc_html__( "No", 'pro_framework' ) => "no", esc_html__( "Yes", 'pro_framework' ) => "yes", ),
			"description" => esc_html__( "Select if you want the carousel to rotate automatically.", 'pro_framework' )
		),
		array(
			'type'       => 'dropdown',
			'heading'    => 'Staff groups',
			'param_name' => 'staff_groups',
			'value'      => pro_element_values( 'categories', array(
				'sort_order' => 'ASC',
				'taxonomy'   => 'groups',
				'hide_empty' => 0
			) )
		),
		array(
			"type"        => "textfield",
			"class"       => "",
			"heading"     => esc_html__( "Number of staff member to load", 'pro_framework' ),
			"param_name"  => "to_show",
			"value"       => esc_html__( "5", 'pro_framework' ),
			"description" => esc_html__( "Number of staff member to load", 'pro_framework' )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Heading color", 'pro_framework' ),
			"param_name"  => "heading_color",
			"value"       => '#2c3e50', //Default Red color
			"description" => esc_html__( "Choose heading color (optional)", 'pro_framework' )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Text color", 'pro_framework' ),
			"param_name"  => "text_color",
			"value"       => '#647886', //Default Red color
			"description" => esc_html__( "Choose text color (optional)", 'pro_framework' )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Job color", 'pro_framework' ),
			"param_name"  => "job_color",
			"value"       => '#647886', //Default Red color
			"description" => esc_html__( "Choose high light color (optional)", 'pro_framework' )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Border color", 'pro_framework' ),
			"param_name"  => "border_color",
			"value"       => '#f7c605', //Default Red color 
			"description" => esc_html__( "Choose border color (optional)", 'pro_framework' )
		)
	)
) );

// ==========================================================================================
// PRO Staff carousel
// ==========================================================================================
vc_map( array(
	"name"        => "Staff Carousel",
	"base"        => "pro_staff_carousel",
	"class"       => "",
	"icon"        => "staff-carousel",
	"description" => "Show your team members inside a carousel",
	'category' => 'Theme shortcodes',
	"params"      => array(
		array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => esc_html__( "Hover effect?", 'pro_framework' ),
			"param_name"  => "hover_effect",
			'value'       => array( esc_html__( "No", 'pro_framework' ) => "no", esc_html__( "Yes", 'pro_framework' ) => "yes", ),
			"description" => esc_html__( "Select if you want the carousel to rotate automatically.", 'pro_framework' )
		),
		array(
			'type'        => 'vc_pro_chosen',
			'heading'     => 'Staff groups',
			'param_name'  => 'staff_groups',
			'placeholder' => 'Choose category (optional)',
			'value'       => pro_element_values( 'categories', array(
				'sort_order' => 'ASC',
				'taxonomy'   => 'groups',
				'hide_empty' => 0
			) ),
			'std'         => ''
		),
		array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => esc_html__( "Posts per line", 'pro_framework' ),
			"param_name"  => "posts_per_line",
			"value"       => array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6'
			),
			'std'         => '4',
			"description" => esc_html__( "Number of staff per line.", 'pro_framework' )
		),
		array(
			"type"        => "dropdown",
			"class"       => "",
			"heading"     => esc_html__( "Auto Rotate?", 'pro_framework' ),
			"param_name"  => "scroll",
			'value'       => array( esc_html__( "Yes", 'pro_framework' ) => "yes", esc_html__( "No", 'pro_framework' ) => "no", ),
			"description" => esc_html__( "Select if you want the carousel to rotate automatically.", 'pro_framework' )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Heading color", 'pro_framework' ),
			"param_name"  => "heading_color",
			"value"       => '#2c3e50', //Default Red color
			"description" => esc_html__( "Choose heading color (optional)", 'pro_framework' )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Text color", 'pro_framework' ),
			"param_name"  => "text_color",
			"value"       => '#647886', //Default Red color
			"description" => esc_html__( "Choose text color (optional)", 'pro_framework' )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Job color", 'pro_framework' ),
			"param_name"  => "job_color",
			"value"       => '#647886', //Default Red color
			"description" => esc_html__( "Choose high light color (optional)", 'pro_framework' )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Border color", 'pro_framework' ),
			"param_name"  => "border_color",
			"value"       => '#f7c605', //Default Red color
			"description" => esc_html__( "Choose border color (optional)", 'pro_framework' )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Arrows color", 'pro_framework' ),
			"param_name"  => "arrow_color",
			"value"       => '#fff', //Default Red color
			"description" => esc_html__( "Choose arrow color for carousel (default is white)", 'pro_framework' )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Arrows background color", 'pro_framework' ),
			"param_name"  => "arrow_bg_color",
			"value"       => '#2c3e50', //Default Red color
			"description" => esc_html__( "Choose background color for arrows (default is white)", 'pro_framework' )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Arrows background hover color", 'pro_framework' ),
			"param_name"  => "arrow_bg_hover_color",
			"value"       => '#f7c605',
			"description" => esc_html__( "Choose background color for arrows on hover (default is white)", 'pro_framework' )
		)
	)
) );

// ==========================================================================================
// PRO TABLE
// ==========================================================================================
vc_map( array(
	'name'        => 'Table',
	'base'        => 'pro_table',
	'icon'        => get_template_directory_uri() . "/pro-framework/assets/img/table.png",
	'description' => 'Create a table',
	'category'    => 'Theme shortcodes',
	'params'      => array(
		array(
			'type'             => 'vc_pro_on_off',
			'heading'          => 'Striped rows',
			'param_name'       => 'striped',
			'edit_field_class' => 'vc_col-md-five',
		),
		array(
			'type'             => 'vc_pro_on_off',
			'heading'          => 'Bordered',
			'edit_field_class' => 'vc_col-md-five',
			'param_name'       => 'bordered',
		),
		array(
			'type'             => 'vc_pro_on_off',
			'heading'          => 'Hover rows',
			'param_name'       => 'hover',
			'edit_field_class' => 'vc_col-md-five',
		),
		array(
			'type'             => 'vc_pro_on_off',
			'heading'          => 'Condensed',
			'param_name'       => 'condensed',
			'edit_field_class' => 'vc_col-md-five',
		),
		array(
			'type'             => 'vc_pro_on_off',
			'heading'          => 'Responsive',
			'param_name'       => 'responsive',
			'edit_field_class' => 'vc_col-md-five',
		),
		array(
			'holder'     => 'div',
			'type'       => 'textarea_html',
			'heading'    => 'Content',
			'param_name' => 'content',
			'value'      => '<table><thead><tr><th>#</th><th>First Name</th><th>Last Name</th><th>Username</th></tr></thead><tbody><tr><td>1</td><td>Mark</td><td>Otto</td><td>@mdo</td></tr><tr><td>2</td><td>Jacob</td><td>Thornton</td><td>@fat</td></tr></tbody></table>',
		),
		// Extras
		$vc_map_extra_id,
		$vc_map_extra_class,
		$vc_map_extra_style,
	)
) );

// ==========================================================================================
// PRO Testimonials 
// ==========================================================================================
vc_map( array(
	'name'        => 'Testimonials',
	'base'        => 'pro_testimonials',
	'icon'        => get_template_directory_uri() . "/pro-framework/assets/img/testimonials.png",
	'description' => 'Load testimonials',
	'category'    => 'Theme shortcodes',
	'params'      => array(
		array(
			'type'        => 'vc_pro_chosen',
			'heading'     => 'Testimonials groups',
			'param_name'  => 'testimonial_groups',
			'placeholder' => 'Choose category (optional)',
			'std'         => '',
			'value'       => pro_element_values( 'categories', array(
				'sort_order' => 'ASC',
				'taxonomy'   => 'testimonials-categories',
				'hide_empty' => 0
			) )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Text color", 'pro_framework' ),
			"param_name"  => "text_color",
			"value"       => '#647886', //Default Red color
			"description" => esc_html__( "Choose text color (optional)", 'pro_framework' )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Job color", 'pro_framework' ),
			"param_name"  => "job_color",
			"value"       => '#8b9ba6', //Default Red color
			"description" => esc_html__( "Choose job title color (optional)", 'pro_framework' )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Name color", 'pro_framework' ),
			"param_name"  => "name_color",
			"value"       => '#2c3e50', //Default Red color
			"description" => esc_html__( "Choose text color (optional)", 'pro_framework' )
		),
		array(
			"type"        => "colorpicker",
			"class"       => "",
			"heading"     => esc_html__( "Line color", 'pro_framework' ),
			"param_name"  => "line_color",
			"value"       => '#f7c51e', //Default Red color
			"description" => esc_html__( "Choose line color (optional)", 'pro_framework' )
		)
	)
) );

// ==========================================================================================
// PRO Tooltip
// ==========================================================================================
vc_map( array(
	'name'        => 'ToolTip',
	'base'        => 'pro_tooltip',
	'icon'        => get_template_directory_uri() . "/pro-framework/assets/img/tooltip.png",
	// Simply pass url to your icon here
	'description' => 'Create a tooltip',
	'category' => 'Theme shortcodes',
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => 'Unique ID',
			'param_name'  => 'selector',
			'value'       => 'tooltip_' . uniqid(),
			'description' => 'Copy-paste this unique id for any element class attribute',
		),
		array(
			'type'        => 'dropdown',
			'heading'     => 'Placement',
			'param_name'  => 'placement',
			'value'       => array(
				'Top'    => 'top',
				'Bottom' => 'bottom',
				'Left'   => 'left',
				'Right'  => 'right',
				'Auto'   => 'auto',
			),
			'description' => 'how to position the tooltip - top | bottom | left | right | auto. When "auto" is specified, it will dynamically reorient the tooltip.',
		),
		array(
			'type'        => 'dropdown',
			'heading'     => 'Trigger',
			'param_name'  => 'trigger',
			'value'       => array(
				'Hover' => 'hover',
				'Focus' => 'focus',
				'Click' => 'click',
			),
			'description' => 'how tooltip is triggered - click | hover | focus | manual',
		),
		array(
			'holder'     => 'div',
			'type'       => 'textarea',
			'heading'    => 'Tooltip Content',
			'param_name' => 'content',
		),
	)
) );

// ==========================================================================================
// VC Text block
// ==========================================================================================
vc_map( array(
	'name'          => 'Text Block',
	'base'          => 'vc_column_text',
	'icon'          => 'icon-wpb-layer-shape-text',
	'wrapper_class' => 'clearfix',
	'category'      => 'Content',
	'params'        => array(
		array(
			'holder'     => 'div',
			'type'       => 'textarea_html',
			'heading'    => 'Text',
			'param_name' => 'content',
			'value'      => '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>'
		),
		
		array(
			'type'        => 'textfield',
			'heading'     => 'Extra class name',
			'param_name'  => 'el_class',
			'description' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
		),
		array(
	        'type'       => 'css_editor',
	        'heading'    => 'CSS box',
	        'param_name' => 'css',
	        'group'      => 'Design Options',
      	),
		$add_css_animation,
	)
) );

// ==========================================================================================
// VC TOGGLE
// ==========================================================================================
vc_map( array(
	'name'        => 'Toggle',
	'base'        => 'vc_toggle',
	'icon'        => 'fa fa-unsorted',
	'description' => 'Toggle element for Q&A block',
	'params'      => array(
		array(
			'type'       => 'textfield',
			'holder'     => 'h4',
			'class'      => 'toggle_title',
			'heading'    => 'Toggle title',
			'param_name' => 'title',
			'value'      => 'Toggle title',
		),
		array(
			'type'       => 'vc_pro_icon',
			'heading'    => 'Custom Toggle icon',
			'param_name' => 'icon',
		),
		array(
			'type'       => 'textarea_html',
			'holder'     => 'div',
			'class'      => 'toggle_content',
			'heading'    => 'Toggle content',
			'param_name' => 'content',
			'value'      => '<p>Toggle content goes here, click edit button to change this text.</p>',
		),
		array(
			'type'        => 'dropdown',
			'heading'     => 'Default state',
			'param_name'  => 'open',
			'value'       => array(
				'Closed' => '',
				'Open'   => 'true'
			),
			'description' => 'Select "Open" if you want toggle to be open by default.',
		),
		array(
			'type'       => 'vc_pro_on_off',
			'heading'    => 'No any icon',
			'param_name' => 'no_icon',
		),
		// Custom Colors
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Icons Color',
			'param_name' => 'icon_color',
			'group'      => 'Custom Colors',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Title Color',
			'param_name' => 'title_color',
			'group'      => 'Custom Colors',
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Border Color',
			'param_name' => 'border_color',
			'group'      => 'Custom Colors',
		),
		$vc_map_extra_id,
		$vc_map_extra_class,
		$vc_map_extra_style,
	),
	'js_view'     => 'VcToggleView'
) );

// ==========================================================================================
// VC TABS
// ==========================================================================================
$tab_unique_id_1 = time() . '-1-' . rand( 0, 100 );
$tab_unique_id_2 = time() . '-2-' . rand( 0, 100 );
$tab_unique_id_3 = time() . '-3-' . rand( 0, 100 );
vc_map( array(
	"name"            => 'Tabs',
	'base'            => 'vc_tabs',
	'is_container'    => true,
	'icon'            => get_template_directory_uri() . "/pro-framework/assets/img/tabs.png",
	'description'     => 'Custom tabbed content',
	'params'          => array(
		array(
			'type'       => 'dropdown',
			'heading'    => 'Tab Nav Block',
			'param_name' => 'type',
			'value'      => array(
				'Default' => 'default',
				'Left'    => 'left',
				'Right'   => 'right',
			),
		),
		array(
			'type'       => 'vc_pro_on_off',
			'heading'    => 'Tab Nav Center',
			'param_name' => 'center',
			'dependency' => array( 'element' => 'type', 'value' => array( 'default' ) ),
		),
		array(
			'type'       => 'vc_pro_on_off',
			'heading'    => 'Tab Nav Fit',
			'param_name' => 'fit',
			'dependency' => array( 'element' => 'type', 'value' => array( 'default' ) ),
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Custom Color',
			'param_name' => 'color',
		),
		array(
			'type'        => 'textfield',
			'heading'     => 'Active Tab Nav',
			'param_name'  => 'active',
			'description' => 'You can active any tab as default. Eg. 1 or 2 or 3'
		),
	),
	'custom_markup'   => '<div class="wpb_tabs_holder wpb_holder vc_container_for_children"><ul class="tabs_controls"></ul>%content%</div>',
	'default_content' => '


    [vc_tab title="Tab 1" tab_id="' . $tab_unique_id_1 . '"][/vc_tab]


    [vc_tab title="Tab 2" tab_id="' . $tab_unique_id_2 . '"][/vc_tab]


    [vc_tab title="Tab 3" tab_id="' . $tab_unique_id_3 . '"][/vc_tab]',
	'js_view'         => 'VcTabsView'
) );

// ==========================================================================================
// VC Separator
// ==========================================================================================
vc_map( array(
	'name'                    => esc_html__( 'Separator', 'js_composer' ),
	'base'                    => 'vc_separator',
	'icon'                    => 'icon-wpb-ui-separator',
	'show_settings_on_create' => true,
	'category'                => esc_html__( 'Content', 'js_composer' ),
	//"controls"	=> 'popup_delete',
	'description'             => esc_html__( 'Horizontal separator line', 'js_composer' ),
	'params'                  => array(
		array(
			'type'               => 'dropdown',
			'heading'            => esc_html__( 'Color', 'js_composer' ),
			'param_name'         => 'color',
			'value'              => array_merge( webuild_getVcShared( 'colors' ), array( esc_html__( 'Custom color', 'js_composer' ) => 'custom' ) ),
			'std'                => 'grey',
			'description'        => esc_html__( 'Separator color.', 'js_composer' ),
			'param_holder_class' => 'vc_colored-dropdown'
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Custom Border Color', 'js_composer' ),
			'param_name'  => 'accent_color',
			'description' => esc_html__( 'Select border color for your element.', 'js_composer' ),
			'dependency'  => array(
				'element' => 'color',
				'value'   => array( 'custom' )
			),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Style', 'js_composer' ),
			'param_name'  => 'style',
			'value'       => webuild_getVcShared( 'separator styles' ),
			'description' => esc_html__( 'Separator style.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Element width', 'js_composer' ),
			'param_name'  => 'el_width',
			'value'       => webuild_getVcShared( 'separator widths' ),
			'description' => esc_html__( 'Separator element width in percents.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );

// ==========================================================================================
// VC Text separator
// ==========================================================================================
vc_map( array(
	'name'        => esc_html__( 'Separator with Text', 'js_composer' ),
	'base'        => 'vc_text_separator',
	'icon'        => 'icon-wpb-ui-separator-label',
	'category'    => esc_html__( 'Content', 'js_composer' ),
	'description' => esc_html__( 'Horizontal separator line with heading', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Title', 'js_composer' ),
			'param_name'  => 'title',
			'holder'      => 'div',
			'value'       => esc_html__( 'Title', 'js_composer' ),
			'description' => esc_html__( 'Separator title.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Title position', 'js_composer' ),
			'param_name'  => 'title_align',
			'value'       => array(
				esc_html__( 'Align center', 'js_composer' ) => 'separator_align_center',
				esc_html__( 'Align left', 'js_composer' )   => 'separator_align_left',
				esc_html__( 'Align right', 'js_composer' )  => "separator_align_right"
			),
			'description' => esc_html__( 'Select title location.', 'js_composer' )
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Separator alignment', 'js_composer' ),
			'param_name' => 'align',
			'value' => array(
				esc_html__( 'Center', 'js_composer' ) => 'align_center',
				esc_html__( 'Left', 'js_composer' ) => 'align_left',
				esc_html__( 'Right', 'js_composer' ) => "align_right"
			),
			'description' => esc_html__( 'Select separator alignment.', 'js_composer' )
		),
		array(
			'type'               => 'dropdown',
			'heading'            => esc_html__( 'Color', 'js_composer' ),
			'param_name'         => 'color',
			'value'              => array_merge( webuild_getVcShared( 'colors' ), array( esc_html__( 'Custom color', 'js_composer' ) => 'custom' ) ),
			'std'                => 'grey',
			'description'        => esc_html__( 'Separator color.', 'js_composer' ),
			'param_holder_class' => 'vc_colored-dropdown'
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Custom Color', 'js_composer' ),
			'param_name'  => 'accent_color',
			'description' => esc_html__( 'Custom separator color for your element.', 'js_composer' ),
			'dependency'  => array(
				'element' => 'color',
				'value'   => array( 'custom' )
			),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Style', 'js_composer' ),
			'param_name'  => 'style',
			'value'       => webuild_getVcShared( 'separator styles' ),
			'description' => esc_html__( 'Separator style.', 'js_composer' )
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Border width', 'js_composer' ),
			'param_name' => 'border_width',
			'value' => webuild_getVcShared( 'separator border widths' ),
			'description' => esc_html__( 'Select border width (pixels).', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Element width', 'js_composer' ),
			'param_name'  => 'el_width',
			'value'       => webuild_getVcShared( 'separator widths' ),
			'description' => esc_html__( 'Separator element width in percents.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
		array(
			'type' => 'hidden',
			'param_name' => 'layout',
			'value' => 'separator_with_text',
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'js_composer' ),
			'param_name' => 'css',
			'group' => esc_html__( 'Design Options', 'js_composer' )
		)
	),
	'js_view'     => 'VcTextSeparatorView'
) );

// ==========================================================================================
// VC Message box
// ==========================================================================================
vc_map( array(
	'name'          => esc_html__( 'Message Box', 'js_composer' ),
	'base'          => 'vc_message',
	'icon'          => 'icon-wpb-information-white',
	'wrapper_class' => 'alert',
	'category'      => esc_html__( 'Content', 'js_composer' ),
	'description'   => esc_html__( 'Notification box', 'js_composer' ),
	'params'        => array(
		array(
			'type'               => 'dropdown',
			'heading'            => esc_html__( 'Message box type', 'js_composer' ),
			'param_name'         => 'color',
			'value'              => array(
				esc_html__( 'Informational', 'js_composer' ) => 'alert-info',
				esc_html__( 'Warning', 'js_composer' )       => 'alert-warning',
				esc_html__( 'Success', 'js_composer' )       => 'alert-success',
				esc_html__( 'Error', 'js_composer' )         => "alert-danger"
			),
			'description'        => esc_html__( 'Select message type.', 'js_composer' ),
			'param_holder_class' => 'vc_message-type'
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Style', 'js_composer' ),
			'param_name'  => 'style',
			'value'       => webuild_getVcShared( 'alert styles' ),
			'description' => esc_html__( 'Alert style.', 'js_composer' )
		),
		array(
			'type'       => 'textarea_html',
			'holder'     => 'div',
			'class'      => 'messagebox_text',
			'heading'    => esc_html__( 'Message text', 'js_composer' ),
			'param_name' => 'content',
			'value'      => esc_html__( '<p>I am message box. Click edit button to change this text.</p>', 'js_composer' )
		),
		$add_css_animation,
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	),
	'js_view'       => 'VcMessageView'
) );

// ==========================================================================================
// VC Facebook like
// ==========================================================================================
vc_map( array(
	'name'        => esc_html__( 'Facebook Like', 'js_composer' ),
	'base'        => 'vc_facebook',
	'icon'        => 'icon-wpb-balloon-facebook-left',
	'category'    => esc_html__( 'Social', 'js_composer' ),
	'description' => esc_html__( 'Facebook like button', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Button type', 'js_composer' ),
			'param_name'  => 'type',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Standard', 'js_composer' )     => 'standard',
				esc_html__( 'Button count', 'js_composer' ) => 'button_count',
				esc_html__( 'Box count', 'js_composer' )    => 'box_count'
			),
			'description' => esc_html__( 'Select button type.', 'js_composer' )
		)
	)
) );

// ==========================================================================================
// VC Tweetmeme button
// ==========================================================================================
vc_map( array(
	'name'        => esc_html__( 'Tweetmeme Button', 'js_composer' ),
	'base'        => 'vc_tweetmeme',
	'icon'        => 'icon-wpb-tweetme',
	'category'    => esc_html__( 'Social', 'js_composer' ),
	'description' => esc_html__( 'Share on twitter button', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Button type', 'js_composer' ),
			'param_name'  => 'type',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Horizontal', 'js_composer' ) => 'horizontal',
				esc_html__( 'Vertical', 'js_composer' )   => 'vertical',
				esc_html__( 'None', 'js_composer' )       => 'none'
			),
			'description' => esc_html__( 'Select button type.', 'js_composer' )
		)
	)
) );

// ==========================================================================================
// VC Google+ button
// ==========================================================================================
vc_map( array(
	'name'        => esc_html__( 'Google+ Button', 'js_composer' ),
	'base'        => 'vc_googleplus',
	'icon'        => 'icon-wpb-application-plus',
	'category'    => esc_html__( 'Social', 'js_composer' ),
	'description' => esc_html__( 'Recommend on Google', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Button size', 'js_composer' ),
			'param_name'  => 'type',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Standard', 'js_composer' ) => '',
				esc_html__( 'Small', 'js_composer' )    => 'small',
				esc_html__( 'Medium', 'js_composer' )   => 'medium',
				esc_html__( 'Tall', 'js_composer' )     => 'tall'
			),
			'description' => esc_html__( 'Select button size.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Annotation', 'js_composer' ),
			'param_name'  => 'annotation',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Inline', 'js_composer' ) => 'inline',
				esc_html__( 'Bubble', 'js_composer' ) => '',
				esc_html__( 'None', 'js_composer' )   => 'none'
			),
			'description' => esc_html__( 'Select type of annotation', 'js_composer' )
		)
	)
) );

// ==========================================================================================
// VC Pinterest
// ==========================================================================================
vc_map( array(
	'name'        => esc_html__( 'Pinterest', 'js_composer' ),
	'base'        => 'vc_pinterest',
	'icon'        => 'icon-wpb-pinterest',
	'category'    => esc_html__( 'Social', 'js_composer' ),
	'description' => esc_html__( 'Pinterest button', 'js_composer' ),
	"params"      => array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Button layout', 'js_composer' ),
			'param_name'  => 'type',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Horizontal', 'js_composer' ) => '',
				esc_html__( 'Vertical', 'js_composer' )   => 'vertical',
				esc_html__( 'No count', 'js_composer' )   => 'none'
			),
			'description' => esc_html__( 'Select button layout.', 'js_composer' )
		)
	)
) );

// ==========================================================================================
// VC FAQ
// ==========================================================================================
vc_map( array(
	'name'        => esc_html__( 'FAQ', 'js_composer' ),
	'base'        => 'vc_toggle',
	'icon'        => 'icon-wpb-toggle-small-expand',
	'category'    => esc_html__( 'Content', 'js_composer' ),
	'description' => esc_html__( 'Toggle element for Q&A block', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'holder'      => 'h4',
			'class'       => 'toggle_title',
			'heading'     => esc_html__( 'Toggle title', 'js_composer' ),
			'param_name'  => 'title',
			'value'       => esc_html__( 'Toggle title', 'js_composer' ),
			'description' => esc_html__( 'Toggle block title.', 'js_composer' )
		),
		array(
			'type'        => 'textarea_html',
			'holder'      => 'div',
			'class'       => 'toggle_content',
			'heading'     => esc_html__( 'Toggle content', 'js_composer' ),
			'param_name'  => 'content',
			'value'       => '<p>Toggle content goes here, click edit button to change this text.</p>',
			'description' => esc_html__( 'Toggle block content.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Default state', 'js_composer' ),
			'param_name'  => 'open',
			'value'       => array(
				esc_html__( 'Closed', 'js_composer' ) => 'false',
				esc_html__( 'Open', 'js_composer' )   => 'true'
			),
			'description' => esc_html__( 'Select "Open" if you want toggle to be open by default.', 'js_composer' )
		),
		$add_css_animation,
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	),
	'js_view'     => 'VcToggleView'
) );

// ==========================================================================================
// VC Single image
// ==========================================================================================
vc_map( array(
	'name'        => esc_html__( 'Single Image', 'js_composer' ),
	'base'        => 'vc_single_image',
	'icon'        => 'icon-wpb-single-image',
	'category'    => esc_html__( 'Content', 'js_composer' ),
	'description' => esc_html__( 'Simple image with CSS animation', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Enter text used as widget title (Note: located above content element).', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Image source', 'js_composer' ),
			'param_name'  => 'source',
			'value'       => array(
				esc_html__( 'Media library', 'js_composer' )  => 'media_library',
				esc_html__( 'External link', 'js_composer' )  => 'external_link',
				esc_html__( 'Featured Image', 'js_composer' ) => 'featured_image'
			),
			'std'         => 'media_library',
			'description' => esc_html__( 'Select image source.', 'js_composer' )
		),
		array(
			'type'        => 'attach_image',
			'heading'     => esc_html__( 'Image', 'js_composer' ),
			'param_name'  => 'image',
			'value'       => '',
			'description' => esc_html__( 'Select image from media library.', 'js_composer' ),
			'dependency'  => array(
				'element' => 'source',
				'value'   => 'media_library'
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'External link', 'js_composer' ),
			'param_name'  => 'custom_src',
			'description' => esc_html__( 'Select external link.', 'js_composer' ),
			'dependency'  => array(
				'element' => 'source',
				'value'   => 'external_link'
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Image size', 'js_composer' ),
			'param_name'  => 'img_size',
			'value'       => 'thumbnail',
			'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'js_composer' ),
			'dependency'  => array(
				'element' => 'source',
				'value'   => array( 'media_library', 'featured_image' )
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Image size', 'js_composer' ),
			'param_name'  => 'external_img_size',
			'value'       => '',
			'description' => esc_html__( 'Enter image size in pixels. Example: 200x100 (Width x Height).', 'js_composer' ),
			'dependency'  => array(
				'element' => 'source',
				'value'   => 'external_link'
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Caption', 'js_composer' ),
			'param_name'  => 'caption',
			'description' => esc_html__( 'Enter text for image caption.', 'js_composer' ),
			'dependency'  => array(
				'element' => 'source',
				'value'   => 'external_link'
			),
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Add caption?', 'js_composer' ),
			'param_name'  => 'add_caption',
			'description' => esc_html__( 'Add image caption.', 'js_composer' ),
			'value'       => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' ),
			'dependency'  => array(
				'element' => 'source',
				'value'   => array( 'media_library', 'featured_image' )
			),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Image alignment', 'js_composer' ),
			'param_name'  => 'alignment',
			'value'       => array(
				esc_html__( 'Left', 'js_composer' )   => 'left',
				esc_html__( 'Right', 'js_composer' )  => 'right',
				esc_html__( 'Center', 'js_composer' ) => 'center'
			),
			'description' => esc_html__( 'Select image alignment.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Image style', 'js_composer' ),
			'param_name'  => 'style',
			'value'       => webuild_getVcShared( 'single image styles' ),
			'description' => esc_html__( 'Select image display style.', 'js_comopser' ),
			'dependency'  => array(
				'element' => 'source',
				'value'   => array( 'media_library', 'featured_image' )
			),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Image style', 'js_composer' ),
			'param_name'  => 'external_style',
			'value'       => webuild_getVcShared( 'single image external styles' ),
			'description' => esc_html__( 'Select image display style.', 'js_comopser' ),
			'dependency'  => array(
				'element' => 'source',
				'value'   => 'external_link'
			),
		),
		array(
			'type'               => 'dropdown',
			'heading'            => esc_html__( 'Border color', 'js_composer' ),
			'param_name'         => 'border_color',
			'value'              => webuild_getVcShared( 'colors' ),
			'std'                => 'grey',
			'dependency'         => array(
				'element' => 'style',
				'value'   => array( 'vc_box_border', 'vc_box_border_circle', 'vc_box_outline', 'vc_box_outline_circle' )
			),
			'description'        => esc_html__( 'Border color.', 'js_composer' ),
			'param_holder_class' => 'vc_colored-dropdown'
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'On click action', 'js_composer' ),
			'param_name'  => 'onclick',
			'value'       => array(
				esc_html__( 'None', 'js_composer' )                => '',
				esc_html__( 'Link to large image', 'js_composer' ) => 'img_link_large',
				esc_html__( 'Open prettyPhoto', 'js_composer' )    => 'link_image',
				esc_html__( 'Open custom link', 'js_composer' )    => 'custom_link',
				esc_html__( 'Zoom', 'js_composer' )                => 'zoom',
			),
			'description' => esc_html__( 'Select action for click action.', 'js_composer' ),
			'std'         => ''
		),
		array(
			'type'        => 'href',
			'heading'     => esc_html__( 'Image link', 'js_composer' ),
			'param_name'  => 'link',
			'description' => esc_html__( 'Enter URL if you want this image to have a link (Note: parameters like "mailto:" are also accepted).', 'js_composer' ),
			'dependency'  => array(
				'element' => 'onclick',
				'value'   => 'custom_link',
			)
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Link Target', 'js_composer' ),
			'param_name' => 'img_link_target',
			'value'      => $target_arr,
			'dependency' => array(
				'element' => 'onclick',
				'value'   => array( 'custom_link', 'img_link_large' ),
			),
		),
		$add_css_animation,
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' )
		),
		array(
			'type'       => 'css_editor',
			'heading'    => esc_html__( 'CSS box', 'js_composer' ),
			'param_name' => 'css',
			'group'      => esc_html__( 'Design Options', 'js_composer' )
		),
		// backward compatibility. since 4.6
		array(
			'type'       => 'hidden',
			'param_name' => 'img_link_large'
		)
	)
) );

// ==========================================================================================
// VC Image Gallery
// ==========================================================================================
vc_map( array(
	'name'        => esc_html__( 'Image Gallery', 'js_composer' ),
	'base'        => 'vc_gallery',
	'icon'        => 'icon-wpb-images-stack',
	'category'    => esc_html__( 'Content', 'js_composer' ),
	'description' => esc_html__( 'Responsive image gallery', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Gallery type', 'js_composer' ),
			'param_name'  => 'type',
			'value'       => array(
				esc_html__( 'Flex slider fade', 'js_composer' )  => 'flexslider_fade',
				esc_html__( 'Flex slider slide', 'js_composer' ) => 'flexslider_slide',
				esc_html__( 'Nivo slider', 'js_composer' )       => 'nivo',
				esc_html__( 'Image grid', 'js_composer' )        => 'image_grid'
			),
			'description' => esc_html__( 'Select gallery type.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Auto rotate slides', 'js_composer' ),
			'param_name'  => 'interval',
			'value'       => array( 3, 5, 10, 15, esc_html__( 'Disable', 'js_composer' ) => 0 ),
			'description' => esc_html__( 'Auto rotate slides each X seconds.', 'js_composer' ),
			'dependency'  => array(
				'element' => 'type',
				'value'   => array( 'flexslider_fade', 'flexslider_slide', 'nivo' )
			)
		),
		array(
			'type'        => 'attach_images',
			'heading'     => esc_html__( 'Images', 'js_composer' ),
			'param_name'  => 'images',
			'value'       => '',
			'description' => esc_html__( 'Select images from media library.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Image size', 'js_composer' ),
			'param_name'  => 'img_size',
			'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'On click', 'js_composer' ),
			'param_name'  => 'onclick',
			'value'       => array(
				esc_html__( 'Open prettyPhoto', 'js_composer' ) => 'link_image',
				esc_html__( 'Do nothing', 'js_composer' )       => 'link_no',
				esc_html__( 'Open custom link', 'js_composer' ) => 'custom_link'
			),
			'description' => esc_html__( 'Define action for onclick event if needed.', 'js_composer' )
		),
		array(
			'type'        => 'exploded_textarea',
			'heading'     => esc_html__( 'Custom links', 'js_composer' ),
			'param_name'  => 'custom_links',
			'description' => esc_html__( 'Enter links for each slide here. Divide links with linebreaks (Enter) . ', 'js_composer' ),
			'dependency'  => array(
				'element' => 'onclick',
				'value'   => array( 'custom_link' )
			)
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Custom link target', 'js_composer' ),
			'param_name'  => 'custom_links_target',
			'description' => esc_html__( 'Select where to open  custom links.', 'js_composer' ),
			'dependency'  => array(
				'element' => 'onclick',
				'value'   => array( 'custom_link' )
			),
			'value'       => $target_arr
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );

// ==========================================================================================
// VC Image Carousel
// ==========================================================================================
vc_map( array(
	'name'        => esc_html__( 'Image Carousel', 'js_composer' ),
	'base'        => 'vc_images_carousel',
	'icon'        => 'icon-wpb-images-carousel',
	'category'    => esc_html__( 'Content', 'js_composer' ),
	'description' => esc_html__( 'Animated carousel with images', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' )
		),
		array(
			'type'        => 'attach_images',
			'heading'     => esc_html__( 'Images', 'js_composer' ),
			'param_name'  => 'images',
			'value'       => '',
			'description' => esc_html__( 'Select images from media library.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Image size', 'js_composer' ),
			'param_name'  => 'img_size',
			'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'On click', 'js_composer' ),
			'param_name'  => 'onclick',
			'value'       => array(
				esc_html__( 'Open prettyPhoto', 'js_composer' ) => 'link_image',
				esc_html__( 'Do nothing', 'js_composer' )       => 'link_no',
				esc_html__( 'Open custom link', 'js_composer' ) => 'custom_link'
			),
			'description' => esc_html__( 'What to do when slide is clicked?', 'js_composer' )
		),
		array(
			'type'        => 'exploded_textarea',
			'heading'     => esc_html__( 'Custom links', 'js_composer' ),
			'param_name'  => 'custom_links',
			'description' => esc_html__( 'Enter links for each slide here. Divide links with linebreaks (Enter) . ', 'js_composer' ),
			'dependency'  => array(
				'element' => 'onclick',
				'value'   => array( 'custom_link' )
			)
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Custom link target', 'js_composer' ),
			'param_name'  => 'custom_links_target',
			'description' => esc_html__( 'Select where to open  custom links.', 'js_composer' ),
			'dependency'  => array(
				'element' => 'onclick',
				'value'   => array( 'custom_link' )
			),
			'value'       => $target_arr
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Slider mode', 'js_composer' ),
			'param_name'  => 'mode',
			'value'       => array(
				esc_html__( 'Horizontal', 'js_composer' ) => 'horizontal',
				esc_html__( 'Vertical', 'js_composer' )   => 'vertical'
			),
			'description' => esc_html__( 'Slides will be positioned horizontally (for horizontal swipes) or vertically (for vertical swipes)', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Slider speed', 'js_composer' ),
			'param_name'  => 'speed',
			'value'       => '5000',
			'description' => esc_html__( 'Duration of animation between slides (in ms)', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Slides per view', 'js_composer' ),
			'param_name'  => 'slides_per_view',
			'value'       => '1',
			'description' => esc_html__( 'Set numbers of slides you want to display at the same time on slider\'s container for carousel mode. Supports also "auto" value, in this case it will fit slides depending on container\'s width. "auto" mode isn\'t compatible with loop mode.', 'js_composer' )
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Slider autoplay', 'js_composer' ),
			'param_name'  => 'autoplay',
			'description' => esc_html__( 'Enables autoplay mode.', 'js_composer' ),
			'value'       => array( esc_html__( 'Yes, please', 'js_composer' ) => 'yes' )
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Hide pagination control', 'js_composer' ),
			'param_name'  => 'hide_pagination_control',
			'description' => esc_html__( 'If YES pagination control will be removed.', 'js_composer' ),
			'value'       => array( esc_html__( 'Yes, please', 'js_composer' ) => 'yes' )
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Hide prev/next buttons', 'js_composer' ),
			'param_name'  => 'hide_prev_next_buttons',
			'description' => esc_html__( 'If "YES" prev/next control will be removed.', 'js_composer' ),
			'value'       => array( esc_html__( 'Yes, please', 'js_composer' ) => 'yes' )
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Partial view', 'js_composer' ),
			'param_name'  => 'partial_view',
			'description' => esc_html__( 'If "YES" part of the next slide will be visible on the right side.', 'js_composer' ),
			'value'       => array( esc_html__( 'Yes, please', 'js_composer' ) => 'yes' )
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Slider loop', 'js_composer' ),
			'param_name'  => 'wrap',
			'description' => esc_html__( 'Enables loop mode.', 'js_composer' ),
			'value'       => array( esc_html__( 'Yes, please', 'js_composer' ) => 'yes' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );

// ==========================================================================================
// VC Tab
// ==========================================================================================
vc_map( array(
	'name'                      => 'Tab',
	'base'                      => 'vc_tab',
	'allowed_container_element' => 'vc_row',
	'is_container'              => true,
	'content_element'           => false,
	'params'                    => array(
		array(
			'type'       => 'tab_id',
			'heading'    => 'Tab Unique ID',
			'param_name' => 'tab_id'
		),
		array(
			'type'       => 'textfield',
			'heading'    => 'Tab Title',
			'param_name' => 'title',
		),
		array(
			'type'       => 'vc_pro_icon',
			'heading'    => 'Tab Icon',
			'param_name' => 'icon',
		),
	),
	'js_view'                   => 'VcTabView'
) );

// ==========================================================================================
// VC Teaser Grid
// ==========================================================================================
//* @deprecated please use vc_posts_grid

vc_map( array(
	'name'            => esc_html__( 'Teaser (posts) Grid', 'js_composer' ),
	'base'            => 'vc_teaser_grid',
	'content_element' => false,
	'icon'            => 'icon-wpb-application-icon-large',
	'category'        => esc_html__( 'Content', 'js_composer' ),
	'params'          => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Columns count', 'js_composer' ),
			'param_name'  => 'grid_columns_count',
			'value'       => array( 4, 3, 2, 1 ),
			'admin_label' => true,
			'description' => esc_html__( 'Select columns count.', 'js_composer' )
		),
		array(
			'type'        => 'posttypes',
			'heading'     => esc_html__( 'Post types', 'js_composer' ),
			'param_name'  => 'grid_posttypes',
			'description' => esc_html__( 'Select post types to populate posts from.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Teasers count', 'js_composer' ),
			'param_name'  => 'grid_teasers_count',
			'description' => esc_html__( 'How many teasers to show? Enter number or word "All".', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Content', 'js_composer' ),
			'param_name'  => 'grid_content',
			'value'       => array(
				esc_html__( 'Teaser (Excerpt)', 'js_composer' ) => 'teaser',
				esc_html__( 'Full Content', 'js_composer' )     => 'content'
			),
			'description' => esc_html__( 'Teaser layout template.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Layout', 'js_composer' ),
			'param_name'  => 'grid_layout',
			'value'       => array(
				esc_html__( 'Title + Thumbnail + Text', 'js_composer' ) => 'title_thumbnail_text',
				esc_html__( 'Thumbnail + Title + Text', 'js_composer' ) => 'thumbnail_title_text',
				esc_html__( 'Thumbnail + Text', 'js_composer' )         => 'thumbnail_text',
				esc_html__( 'Thumbnail + Title', 'js_composer' )        => 'thumbnail_title',
				esc_html__( 'Thumbnail only', 'js_composer' )           => 'thumbnail',
				esc_html__( 'Title + Text', 'js_composer' )             => 'title_text'
			),
			'description' => esc_html__( 'Teaser layout.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Link', 'js_composer' ),
			'param_name'  => 'grid_link',
			'value'       => array(
				esc_html__( 'Link to post', 'js_composer' )                             => 'link_post',
				esc_html__( 'Link to bigger image', 'js_composer' )                     => 'link_image',
				esc_html__( 'Thumbnail to bigger image, title to post', 'js_composer' ) => 'link_image_post',
				esc_html__( 'No link', 'js_composer' )                                  => 'link_no'
			),
			'description' => esc_html__( 'Link type.', 'js_composer' )
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Link target', 'js_composer' ),
			'param_name' => 'grid_link_target',
			'value'      => $target_arr,
			'dependency' => array(
				'element' => 'grid_link',
				'value'   => array( 'link_post', 'link_image_post' )
			)
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Teaser grid layout', 'js_composer' ),
			'param_name'  => 'grid_template',
			'value'       => array(
				esc_html__( 'Grid', 'js_composer' )             => 'grid',
				esc_html__( 'Grid with filter', 'js_composer' ) => 'filtered_grid',
				esc_html__( 'Carousel', 'js_composer' )         => 'carousel'
			),
			'description' => esc_html__( 'Teaser layout template.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Layout mode', 'js_composer' ),
			'param_name'  => 'grid_layout_mode',
			'value'       => array(
				esc_html__( 'Fit rows', 'js_composer' ) => 'fitRows',
				esc_html__( 'Masonry', 'js_composer' )  => 'masonry'
			),
			'dependency'  => array(
				'element' => 'grid_template',
				'value'   => array( 'filtered_grid', 'grid' )
			),
			'description' => esc_html__( 'Teaser layout template.', 'js_composer' )
		),
		array(
			'type'        => 'taxonomies',
			'heading'     => esc_html__( 'Taxonomies', 'js_composer' ),
			'param_name'  => 'grid_taxomonies',
			'dependency'  => array(
				'element'  => 'grid_template',
				// 'not_empty' => true,
				'value'    => array( 'filtered_grid' ),
				'callback' => 'wpb_grid_post_types_for_taxonomies_handler'
			),
			'description' => esc_html__( 'Select taxonomies.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Thumbnail size', 'js_composer' ),
			'param_name'  => 'grid_thumb_size',
			'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Post/Page IDs', 'js_composer' ),
			'param_name'  => 'posts_in',
			'description' => esc_html__( 'Fill this field with page/posts IDs separated by commas (,) to retrieve only them. Use this in conjunction with "Post types" field.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Exclude Post/Page IDs', 'js_composer' ),
			'param_name'  => 'posts_not_in',
			'description' => esc_html__( 'Fill this field with page/posts IDs separated by commas (,) to exclude them from query.', 'js_composer' )
		),
		array(
			'type'        => 'exploded_textarea',
			'heading'     => esc_html__( 'Categories', 'js_composer' ),
			'param_name'  => 'grid_categories',
			'description' => esc_html__( 'If you want to narrow output, enter category names here. Note: Only listed categories will be included. Divide categories with linebreaks (Enter) . ', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Order by', 'js_composer' ),
			'param_name'  => 'orderby',
			'value'       => array(
				'',
				esc_html__( 'Date', 'js_composer' )          => 'date',
				esc_html__( 'ID', 'js_composer' )            => 'ID',
				esc_html__( 'Author', 'js_composer' )        => 'author',
				esc_html__( 'Title', 'js_composer' )         => 'title',
				esc_html__( 'Modified', 'js_composer' )      => 'modified',
				esc_html__( 'Random', 'js_composer' )        => 'rand',
				esc_html__( 'Comment count', 'js_composer' ) => 'comment_count',
				esc_html__( 'Menu order', 'js_composer' )    => 'menu_order'
			),
			'description' => sprintf( esc_html__( 'Select how to sort retrieved posts. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Order way', 'js_composer' ),
			'param_name'  => 'order',
			'value'       => array(
				esc_html__( 'Descending', 'js_composer' ) => 'DESC',
				esc_html__( 'Ascending', 'js_composer' )  => 'ASC'
			),
			'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );





$vc_layout_sub_controls = array(
	array( 'link_post', esc_html__( 'Link to post', 'js_composer' ) ),
	array( 'no_link', esc_html__( 'No link', 'js_composer' ) ),
	array( 'link_image', esc_html__( 'Link to bigger image', 'js_composer' ) )
);

// ==========================================================================================
// VC Teaser Grid
// ==========================================================================================
vc_map( array(
	'name'        => esc_html__( 'Posts Grid', 'js_composer' ),
	'base'        => 'vc_posts_grid',
	'icon'        => 'icon-wpb-application-icon-large',
	'description' => esc_html__( 'Posts in grid view', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' )
		),
		array(
			'type'        => 'loop',
			'heading'     => esc_html__( 'Grids content', 'js_composer' ),
			'param_name'  => 'loop',
			'settings'    => array(
				'size'     => array( 'hidden' => false, 'value' => 10 ),
				'order_by' => array( 'value' => 'date' ),
			),
			'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Columns count', 'js_composer' ),
			'param_name'  => 'grid_columns_count',
			'value'       => array( 6, 4, 3, 2, 1 ),
			'std'         => 3,
			'admin_label' => true,
			'description' => esc_html__( 'Select columns count.', 'js_composer' )
		),
		array(
			'type'        => 'sorted_list',
			'heading'     => esc_html__( 'Teaser layout', 'js_composer' ),
			'param_name'  => 'grid_layout',
			'description' => esc_html__( 'Control teasers look. Enable blocks and place them in desired order. Note: This setting can be overrriden on post to post basis.', 'js_composer' ),
			'value'       => 'title,image,text',
			'options'     => array(
				array( 'image', esc_html__( 'Thumbnail', 'js_composer' ), $vc_layout_sub_controls ),
				array( 'title', esc_html__( 'Title', 'js_composer' ), $vc_layout_sub_controls ),
				array(
					'text',
					esc_html__( 'Text', 'js_composer' ),
					array(
						array( 'excerpt', esc_html__( 'Teaser/Excerpt', 'js_composer' ) ),
						array( 'text', esc_html__( 'Full content', 'js_composer' ) )
					)
				),
				array( 'link', esc_html__( 'Read more link', 'js_composer' ) )
			)
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Link target', 'js_composer' ),
			'param_name' => 'grid_link_target',
			'value'      => $target_arr,
			// 'dependency' => array(
			//     'element' => 'grid_link',
			//     'value' => array( 'link_post', 'link_image_post' )
			// )
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Show filter', 'js_composer' ),
			'param_name'  => 'filter',
			'value'       => array( esc_html__( 'Yes, please', 'js_composer' ) => 'yes' ),
			'description' => esc_html__( 'Select to add animated category filter to your posts grid.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Layout mode', 'js_composer' ),
			'param_name'  => 'grid_layout_mode',
			'value'       => array(
				esc_html__( 'Fit rows', 'js_composer' ) => 'fitRows',
				esc_html__( 'Masonry', 'js_composer' )  => 'masonry'
			),
			'description' => esc_html__( 'Teaser layout template.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Thumbnail size', 'js_composer' ),
			'param_name'  => 'grid_thumb_size',
			'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
	// 'html_template' => dirname(__DIR__).'/composer/shortcodes_templates/vc_posts_grid.php'
) );
/* Post Carousel


---------------------------------------------------------- */
vc_map( array(
	'name'        => esc_html__( 'Post Carousel', 'vc_extend' ),
	'base'        => 'vc_carousel',
	'class'       => '',
	'icon'        => 'icon-wpb-vc_carousel',
	'category'    => esc_html__( 'Content', 'js_composer' ),
	'description' => esc_html__( 'Animated carousel with posts', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' )
		),
		array(
			'type'        => 'loop',
			'heading'     => esc_html__( 'Carousel content', 'js_composer' ),
			'param_name'  => 'posts_query',
			'settings'    => array(
				'size'     => array( 'hidden' => false, 'value' => 10 ),
				'order_by' => array( 'value' => 'date' )
			),
			'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
		),
		array(
			'type'        => 'sorted_list',
			'heading'     => esc_html__( 'Teaser layout', 'js_composer' ),
			'param_name'  => 'layout',
			'description' => esc_html__( 'Control teasers look. Enable blocks and place them in desired order. Note: This setting can be overrriden on post to post basis.', 'js_composer' ),
			'value'       => 'title,image,text',
			'options'     => array(
				array( 'image', esc_html__( 'Thumbnail', 'js_composer' ), $vc_layout_sub_controls ),
				array( 'title', esc_html__( 'Title', 'js_composer' ), $vc_layout_sub_controls ),
				array(
					'text',
					esc_html__( 'Text', 'js_composer' ),
					array(
						array( 'excerpt', esc_html__( 'Teaser/Excerpt', 'js_composer' ) ),
						array( 'text', esc_html__( 'Full content', 'js_composer' ) )
					)
				),
				array( 'link', esc_html__( 'Read more link', 'js_composer' ) )
			)
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Link target', 'js_composer' ),
			'param_name' => 'link_target',
			'value'      => $target_arr,
			// 'dependency' => array( 'element' => 'link', 'value' => array( 'link_post', 'link_image_post', 'link_image' ) )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Thumbnail size', 'js_composer' ),
			'param_name'  => 'thumb_size',
			'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Slider speed', 'js_composer' ),
			'param_name'  => 'speed',
			'value'       => '5000',
			'description' => esc_html__( 'Duration of animation between slides (in ms)', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Slider mode', 'js_composer' ),
			'param_name'  => 'mode',
			'value'       => array(
				esc_html__( 'Horizontal', 'js_composer' ) => 'horizontal',
				esc_html__( 'Vertical', 'js_composer' )   => 'vertical'
			),
			'description' => esc_html__( 'Slides will be positioned horizontally (for horizontal swipes) or vertically (for vertical swipes)', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Slides per view', 'js_composer' ),
			'param_name'  => 'slides_per_view',
			'value'       => '1',
			'description' => esc_html__( 'Set numbers of slides you want to display at the same time on slider\'s container for carousel mode. Also supports for "auto" value, in this case it will fit slides depending on container\'s width. "auto" mode doesn\'t compatible with loop mode.', 'js_composer' )
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Slider autoplay', 'js_composer' ),
			'param_name'  => 'autoplay',
			'description' => esc_html__( 'Enables autoplay mode.', 'js_composer' ),
			'value'       => array( esc_html__( 'Yes, please', 'js_composer' ) => 'yes' )
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Hide pagination control', 'js_composer' ),
			'param_name'  => 'hide_pagination_control',
			'description' => esc_html__( 'If "YES" pagination control will be removed', 'js_composer' ),
			'value'       => array( esc_html__( 'Yes, please', 'js_composer' ) => 'yes' )
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Hide prev/next buttons', 'js_composer' ),
			'param_name'  => 'hide_prev_next_buttons',
			'description' => esc_html__( 'If "YES" prev/next control will be removed', 'js_composer' ),
			'value'       => array( esc_html__( 'Yes, please', 'js_composer' ) => 'yes' )
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Partial view', 'js_composer' ),
			'param_name'  => 'partial_view',
			'description' => esc_html__( 'If "YES" part of the next slide will be visible on the right side', 'js_composer' ),
			'value'       => array( esc_html__( 'Yes, please', 'js_composer' ) => 'yes' )
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Slider loop', 'js_composer' ),
			'param_name'  => 'wrap',
			'description' => esc_html__( 'Enables loop mode.', 'js_composer' ),
			'value'       => array( esc_html__( 'Yes, please', 'js_composer' ) => 'yes' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
/* Posts slider


---------------------------------------------------------- */
vc_map( array(
	'name'        => esc_html__( 'Posts Slider', 'js_composer' ),
	'base'        => 'vc_posts_slider',
	'icon'        => 'icon-wpb-slideshow',
	'category'    => esc_html__( 'Content', 'js_composer' ),
	'description' => esc_html__( 'Slider with WP Posts', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Slider type', 'js_composer' ),
			'param_name'  => 'type',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Flex slider fade', 'js_composer' )  => 'flexslider_fade',
				esc_html__( 'Flex slider slide', 'js_composer' ) => 'flexslider_slide',
				esc_html__( 'Nivo slider', 'js_composer' )       => 'nivo'
			),
			'description' => esc_html__( 'Select slider type.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Slides count', 'js_composer' ),
			'param_name'  => 'count',
			'description' => esc_html__( 'How many slides to show? Enter number or word "All".', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Auto rotate slides', 'js_composer' ),
			'param_name'  => 'interval',
			'value'       => array( 3, 5, 10, 15, esc_html__( 'Disable', 'js_composer' ) => 0 ),
			'description' => esc_html__( 'Auto rotate slides each X seconds.', 'js_composer' )
		),
		array(
			'type'        => 'posttypes',
			'heading'     => esc_html__( 'Post types', 'js_composer' ),
			'param_name'  => 'posttypes',
			'description' => esc_html__( 'Select post types to populate posts from.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Description', 'js_composer' ),
			'param_name'  => 'slides_content',
			'value'       => array(
				esc_html__( 'No description', 'js_composer' )   => '',
				esc_html__( 'Teaser (Excerpt)', 'js_composer' ) => 'teaser'
			),
			'description' => esc_html__( 'Some sliders support description text, what content use for it?', 'js_composer' ),
			'dependency'  => array(
				'element' => 'type',
				'value'   => array( 'flexslider_fade', 'flexslider_slide' )
			),
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Output post title?', 'js_composer' ),
			'param_name'  => 'slides_title',
			'description' => esc_html__( 'If selected, title will be printed before the teaser text.', 'js_composer' ),
			'value'       => array( esc_html__( 'Yes, please', 'js_composer' ) => true ),
			'dependency'  => array(
				'element' => 'slides_content',
				'value'   => array( 'teaser' )
			),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Link', 'js_composer' ),
			'param_name'  => 'link',
			'value'       => array(
				esc_html__( 'Link to post', 'js_composer' )         => 'link_post',
				esc_html__( 'Link to bigger image', 'js_composer' ) => 'link_image',
				esc_html__( 'Open custom link', 'js_composer' )     => 'custom_link',
				esc_html__( 'No link', 'js_composer' )              => 'link_no'
			),
			'description' => esc_html__( 'Link type.', 'js_composer' )
		),
		array(
			'type'        => 'exploded_textarea',
			'heading'     => esc_html__( 'Custom links', 'js_composer' ),
			'param_name'  => 'custom_links',
			'dependency'  => array( 'element' => 'link', 'value' => 'custom_link' ),
			'description' => esc_html__( 'Enter links for each slide here. Divide links with linebreaks (Enter).', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Thumbnail size', 'js_composer' ),
			'param_name'  => 'thumb_size',
			'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Post/Page IDs', 'js_composer' ),
			'param_name'  => 'posts_in',
			'description' => esc_html__( 'Fill this field with page/posts IDs separated by commas (,), to retrieve only them. Use this in conjunction with "Post types" field.', 'js_composer' )
		),
		array(
			'type'        => 'exploded_textarea',
			'heading'     => esc_html__( 'Categories', 'js_composer' ),
			'param_name'  => 'categories',
			'description' => esc_html__( 'If you want to narrow output, enter category names here. Note: Only listed categories will be included. Divide categories with linebreaks (Enter) . ', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Order by', 'js_composer' ),
			'param_name'  => 'orderby',
			'value'       => array(
				'',
				esc_html__( 'Date', 'js_composer' )          => 'date',
				esc_html__( 'ID', 'js_composer' )            => 'ID',
				esc_html__( 'Author', 'js_composer' )        => 'author',
				esc_html__( 'Title', 'js_composer' )         => 'title',
				esc_html__( 'Modified', 'js_composer' )      => 'modified',
				esc_html__( 'Random', 'js_composer' )        => 'rand',
				esc_html__( 'Comment count', 'js_composer' ) => 'comment_count',
				esc_html__( 'Menu order', 'js_composer' )    => 'menu_order'
			),
			'description' => sprintf( esc_html__( 'Select how to sort retrieved posts. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Order by', 'js_composer' ),
			'param_name'  => 'order',
			'value'       => array(
				esc_html__( 'Descending', 'js_composer' ) => 'DESC',
				esc_html__( 'Ascending', 'js_composer' )  => 'ASC'
			),
			'description' => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
/* Widgetised sidebar


---------------------------------------------------------- */
vc_map( array(
	'name'        => esc_html__( 'Widgetised Sidebar', 'js_composer' ),
	'base'        => 'vc_widget_sidebar',
	'class'       => 'wpb_widget_sidebar_widget',
	'icon'        => 'icon-wpb-layout_sidebar',
	'category'    => esc_html__( 'Structure', 'js_composer' ),
	'description' => esc_html__( 'Place widgetised sidebar', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' )
		),
		array(
			'type'        => 'widgetised_sidebars',
			'heading'     => esc_html__( 'Sidebar', 'js_composer' ),
			'param_name'  => 'sidebar_id',
			'description' => esc_html__( 'Select which widget area output.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
/* Button


---------------------------------------------------------- */
$icons_arr = array(
	esc_html__( 'None', 'js_composer' )                     => 'none',
	esc_html__( 'Address book icon', 'js_composer' )        => 'wpb_address_book',
	esc_html__( 'Alarm clock icon', 'js_composer' )         => 'wpb_alarm_clock',
	esc_html__( 'Anchor icon', 'js_composer' )              => 'wpb_anchor',
	esc_html__( 'Application Image icon', 'js_composer' )   => 'wpb_application_image',
	esc_html__( 'Arrow icon', 'js_composer' )               => 'wpb_arrow',
	esc_html__( 'Asterisk icon', 'js_composer' )            => 'wpb_asterisk',
	esc_html__( 'Hammer icon', 'js_composer' )              => 'wpb_hammer',
	esc_html__( 'Balloon icon', 'js_composer' )             => 'wpb_balloon',
	esc_html__( 'Balloon Buzz icon', 'js_composer' )        => 'wpb_balloon_buzz',
	esc_html__( 'Balloon Facebook icon', 'js_composer' )    => 'wpb_balloon_facebook',
	esc_html__( 'Balloon Twitter icon', 'js_composer' )     => 'wpb_balloon_twitter',
	esc_html__( 'Battery icon', 'js_composer' )             => 'wpb_battery',
	esc_html__( 'Binocular icon', 'js_composer' )           => 'wpb_binocular',
	esc_html__( 'Document Excel icon', 'js_composer' )      => 'wpb_document_excel',
	esc_html__( 'Document Image icon', 'js_composer' )      => 'wpb_document_image',
	esc_html__( 'Document Music icon', 'js_composer' )      => 'wpb_document_music',
	esc_html__( 'Document Office icon', 'js_composer' )     => 'wpb_document_office',
	esc_html__( 'Document PDF icon', 'js_composer' )        => 'wpb_document_pdf',
	esc_html__( 'Document Powerpoint icon', 'js_composer' ) => 'wpb_document_powerpoint',
	esc_html__( 'Document Word icon', 'js_composer' )       => 'wpb_document_word',
	esc_html__( 'Bookmark icon', 'js_composer' )            => 'wpb_bookmark',
	esc_html__( 'Camcorder icon', 'js_composer' )           => 'wpb_camcorder',
	esc_html__( 'Camera icon', 'js_composer' )              => 'wpb_camera',
	esc_html__( 'Chart icon', 'js_composer' )               => 'wpb_chart',
	esc_html__( 'Chart pie icon', 'js_composer' )           => 'wpb_chart_pie',
	esc_html__( 'Clock icon', 'js_composer' )               => 'wpb_clock',
	esc_html__( 'Fire icon', 'js_composer' )                => 'wpb_fire',
	esc_html__( 'Heart icon', 'js_composer' )               => 'wpb_heart',
	esc_html__( 'Mail icon', 'js_composer' )                => 'wpb_mail',
	esc_html__( 'Play icon', 'js_composer' )                => 'wpb_play',
	esc_html__( 'Shield icon', 'js_composer' )              => 'wpb_shield',
	esc_html__( 'Video icon', 'js_composer' )               => "wpb_video"
);
vc_map( array(
	'name'        => esc_html__( 'Button', 'js_composer' ),
	'base'        => 'vc_button',
	'icon'        => 'icon-wpb-ui-button',
	'category'    => esc_html__( 'Content', 'js_composer' ),
	'description' => esc_html__( 'Eye catching button', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Text on the button', 'js_composer' ),
			'holder'      => 'button',
			'class'       => 'wpb_button',
			'param_name'  => 'title',
			'value'       => esc_html__( 'Text on the button', 'js_composer' ),
			'description' => esc_html__( 'Text on the button.', 'js_composer' )
		),
		array(
			'type'        => 'href',
			'heading'     => esc_html__( 'URL (Link)', 'js_composer' ),
			'param_name'  => 'href',
			'description' => esc_html__( 'Button link.', 'js_composer' )
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Target', 'js_composer' ),
			'param_name' => 'target',
			'value'      => $target_arr,
			'dependency' => array(
				'element'   => 'href',
				'not_empty' => true,
				'callback'  => 'vc_button_param_target_callback'
			)
		),
		array(
			'type'               => 'dropdown',
			'heading'            => esc_html__( 'Color', 'js_composer' ),
			'param_name'         => 'color',
			'value'              => $colors_arr,
			'description'        => esc_html__( 'Button color.', 'js_composer' ),
			'param_holder_class' => 'vc_colored-dropdown'
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Icon', 'js_composer' ),
			'param_name'  => 'icon',
			'value'       => $icons_arr,
			'description' => esc_html__( 'Button icon.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Size', 'js_composer' ),
			'param_name'  => 'size',
			'value'       => $size_arr,
			'description' => esc_html__( 'Button size.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	),
	'js_view'     => 'VcButtonView'
) );
vc_map( array(
	'name'        => esc_html__( 'Button', 'js_composer' ) . " 2",
	'base'        => 'vc_button2',
	'icon'        => 'icon-wpb-ui-button',
	'category'    => array(
		esc_html__( 'Content', 'js_composer' )
	),
	'description' => esc_html__( 'Eye catching button', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'vc_link',
			'heading'     => esc_html__( 'URL (Link)', 'js_composer' ),
			'param_name'  => 'link',
			'description' => esc_html__( 'Button link.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Text on the button', 'js_composer' ),
			'holder'      => 'button',
			'class'       => 'vc_btn',
			'param_name'  => 'title',
			'value'       => esc_html__( 'Text on the button', 'js_composer' ),
			'description' => esc_html__( 'Text on the button.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Style', 'js_composer' ),
			'param_name'  => 'style',
			'value'       => webuild_getVcShared( 'button styles' ),
			'description' => esc_html__( 'Button style.', 'js_composer' )
		),
		array(
			'type'               => 'dropdown',
			'heading'            => esc_html__( 'Color', 'js_composer' ),
			'param_name'         => 'color',
			'value'              => webuild_getVcShared( 'colors' ),
			'description'        => esc_html__( 'Button color.', 'js_composer' ),
			'param_holder_class' => 'vc_colored-dropdown'
		),
		/*array(


        'type' => 'dropdown',


        'heading' => esc_html__( 'Icon', 'js_composer' ),


        'param_name' => 'icon',


        'value' => webuild_getVcShared( 'icons' ),


        'description' => esc_html__( 'Button icon.', 'js_composer' )


  ),*/
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Size', 'js_composer' ),
			'param_name'  => 'size',
			'value'       => webuild_getVcShared( 'sizes' ),
			'std'         => 'md',
			'description' => esc_html__( 'Button size.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	),
	'js_view'     => 'VcButton2View'
) );
/* Call to Action Button


----------------------------------------------------------


vc_map( array(


	'name' => esc_html__( 'Call to Action Button', 'js_composer' ),


	'base' => 'vc_cta_button',


	'icon' => 'icon-wpb-call-to-action',


	'category' => esc_html__( 'Content', 'js_composer' ),


	'description' => esc_html__( 'Catch visitors attention with CTA block', 'js_composer' ),


	'params' => array(


		array(


			'type' => 'textarea',


			'admin_label' => true,


			'heading' => esc_html__( 'Text', 'js_composer' ),


			'param_name' => 'call_text',


			'value' => esc_html__( 'Click edit button to change this text.', 'js_composer' ),


			'description' => esc_html__( 'Enter your content.', 'js_composer' )


		),


		array(


			'type' => 'textfield',


			'heading' => esc_html__( 'Text on the button', 'js_composer' ),


			'param_name' => 'title',


			'value' => esc_html__( 'Text on the button', 'js_composer' ),


			'description' => esc_html__( 'Text on the button.', 'js_composer' )


		),


		array(


			'type' => 'href',


			'heading' => esc_html__( 'URL (Link)', 'js_composer' ),


			'param_name' => 'href',


			'description' => esc_html__( 'Button link.', 'js_composer' )


		),


		array(


			'type' => 'dropdown',


			'heading' => esc_html__( 'Target', 'js_composer' ),


			'param_name' => 'target',


			'value' => $target_arr,


			'dependency' => array( 'element' => 'href', 'not_empty' => true, 'callback' => 'vc_cta_button_param_target_callback' )


		),


		array(


			'type' => 'dropdown',


			'heading' => esc_html__( 'Color', 'js_composer' ),


			'param_name' => 'color',


			'value' => $colors_arr,


			'description' => esc_html__( 'Button color.', 'js_composer' ),


			'param_holder_class' => 'vc_colored-dropdown'


		),


		array(


			'type' => 'dropdown',


			'heading' => esc_html__( 'Icon', 'js_composer' ),


			'param_name' => 'icon',


			'value' => $icons_arr,


			'description' => esc_html__( 'Button icon.', 'js_composer' )


		),


		array(


			'type' => 'dropdown',


			'heading' => esc_html__( 'Size', 'js_composer' ),


			'param_name' => 'size',


			'value' => $size_arr,


			'description' => esc_html__( 'Button size.', 'js_composer' )


		),


		array(


			'type' => 'dropdown',


			'heading' => esc_html__( 'Button position', 'js_composer' ),


			'param_name' => 'position',


			'value' => array(


				esc_html__( 'Align right', 'js_composer' ) => 'cta_align_right',


				esc_html__( 'Align left', 'js_composer' ) => 'cta_align_left',


				esc_html__( 'Align bottom', 'js_composer' ) => 'cta_align_bottom'


			),


			'description' => esc_html__( 'Select button alignment.', 'js_composer' )


		),


		$add_css_animation,


		array(


			'type' => 'textfield',


			'heading' => esc_html__( 'Extra class name', 'js_composer' ),


			'param_name' => 'el_class',


			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )


		)


	),


	'js_view' => 'VcCallToActionView'


) );





vc_map( array(


	'name' => esc_html__( 'Call to Action Button', 'js_composer' ) . ' 2',


	'base' => 'vc_cta_button2',


	'icon' => 'icon-wpb-call-to-action',


	'category' => array( esc_html__( 'Content', 'js_composer' ) ),


	'description' => esc_html__( 'Catch visitors attention with CTA block', 'js_composer' ),


	'params' => array(


		array(


			'type' => 'textfield',


			'heading' => esc_html__( 'Heading first line', 'js_composer' ),


			'admin_label' => true,


			//'holder' => 'h2',


			'param_name' => 'h2',


			'value' => esc_html__( 'Hey! I am first heading line feel free to change me', 'js_composer' ),


			'description' => esc_html__( 'Text for the first heading line.', 'js_composer' )


		),


		array(


			'type' => 'textfield',


			'heading' => esc_html__( 'Heading second line', 'js_composer' ),


			//'holder' => 'h4',


			//'admin_label' => true,


			'param_name' => 'h4',


			'value' => '',


			'description' => esc_html__( 'Optional text for the second heading line.', 'js_composer' )


		),


		array(


			'type' => 'dropdown',


			'heading' => esc_html__( 'CTA style', 'js_composer' ),


			'param_name' => 'style',


			'value' => webuild_getVcShared( 'cta styles' ),


			'description' => esc_html__( 'Call to action style.', 'js_composer' )


		),


		array(


			'type' => 'dropdown',


			'heading' => esc_html__( 'Element width', 'js_composer' ),


			'param_name' => 'el_width',


			'value' => webuild_getVcShared( 'cta widths' ),


			'description' => esc_html__( 'Call to action element width in percents.', 'js_composer' )


		),


		array(


			'type' => 'dropdown',


			'heading' => esc_html__( 'Text align', 'js_composer' ),


			'param_name' => 'txt_align',


			'value' => webuild_getVcShared( 'text align' ),


			'description' => esc_html__( 'Text align in call to action block.', 'js_composer' )


		),


		array(


			'type' => 'colorpicker',


			'heading' => esc_html__( 'Custom Background Color', 'js_composer' ),


			'param_name' => 'accent_color',


			'description' => esc_html__( 'Select background color for your element.', 'js_composer' )


		),


		array(


			'type' => 'textarea_html',


			//holder' => 'div',


			//'admin_label' => true,


			'heading' => esc_html__( 'Promotional text', 'js_composer' ),


			'param_name' => 'content',


			'value' => esc_html__( 'I am promo text. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'js_composer' )


		),


		array(


			'type' => 'vc_link',


			'heading' => esc_html__( 'URL (Link)', 'js_composer' ),


			'param_name' => 'link',


			'description' => esc_html__( 'Button link.', 'js_composer' )


		),


		array(


			'type' => 'textfield',


			'heading' => esc_html__( 'Text on the button', 'js_composer' ),


			//'holder' => 'button',


			//'class' => 'wpb_button',


			'param_name' => 'title',


			'value' => esc_html__( 'Text on the button', 'js_composer' ),


			'description' => esc_html__( 'Text on the button.', 'js_composer' )


		),


		array(


			'type' => 'dropdown',


			'heading' => esc_html__( 'Button style', 'js_composer' ),


			'param_name' => 'btn_style',


			'value' => webuild_getVcShared( 'button styles' ),


			'description' => esc_html__( 'Button style.', 'js_composer' )


		),


		array(


			'type' => 'dropdown',


			'heading' => esc_html__( 'Color', 'js_composer' ),


			'param_name' => 'color',


			'value' => webuild_getVcShared( 'colors' ),


			'description' => esc_html__( 'Button color.', 'js_composer' ),


			'param_holder_class' => 'vc_colored-dropdown'


		),


		/*array(


        'type' => 'dropdown',


        'heading' => esc_html__( 'Icon', 'js_composer' ),


        'param_name' => 'icon',


        'value' => webuild_getVcShared( 'icons' ),


        'description' => esc_html__( 'Button icon.', 'js_composer' )


  ),*//*


		array(


			'type' => 'dropdown',


			'heading' => esc_html__( 'Size', 'js_composer' ),


			'param_name' => 'size',


			'value' => webuild_getVcShared( 'sizes' ),


			'std' => 'md',


			'description' => esc_html__( 'Button size.', 'js_composer' )


		),


		array(


			'type' => 'dropdown',


			'heading' => esc_html__( 'Button position', 'js_composer' ),


			'param_name' => 'position',


			'value' => array(


				esc_html__( 'Align right', 'js_composer' ) => 'right',


				esc_html__( 'Align left', 'js_composer' ) => 'left',


				esc_html__( 'Align bottom', 'js_composer' ) => 'bottom'


			),


			'description' => esc_html__( 'Select button alignment.', 'js_composer' )


		),


		$add_css_animation,


		array(


			'type' => 'textfield',


			'heading' => esc_html__( 'Extra class name', 'js_composer' ),


			'param_name' => 'el_class',


			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )


		)


	)


) );


*/
/* Video element


---------------------------------------------------------- */
vc_map( array(
	'name'        => esc_html__( 'Video Player', 'js_composer' ),
	'base'        => 'vc_video',
	'icon'        => 'icon-wpb-film-youtube',
	'category'    => esc_html__( 'Content', 'js_composer' ),
	'description' => esc_html__( 'Embed YouTube/Vimeo player', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Video link', 'js_composer' ),
			'param_name'  => 'link',
			'admin_label' => true,
			'description' => sprintf( esc_html__( 'Link to the video. More about supported formats at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F" target="_blank">WordPress codex page</a>' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
		array(
			'type'       => 'css_editor',
			'heading'    => esc_html__( 'Css', 'js_composer' ),
			'param_name' => 'css',
			// 'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
			'group'      => esc_html__( 'Design options', 'js_composer' )
		)
	)
) );
/* Google maps element


---------------------------------------------------------- */
vc_map( array(
	'name'        => esc_html__( 'Google Maps', 'js_composer' ),
	'base'        => 'vc_gmaps',
	'icon'        => 'icon-wpb-map-pin',
	'category'    => esc_html__( 'Content', 'js_composer' ),
	'description' => esc_html__( 'Map block', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' )
		),
		array(
			'type'        => 'textarea_safe',
			'heading'     => esc_html__( 'Map embed iframe', 'js_composer' ),
			'param_name'  => 'link',
			'description' => sprintf( esc_html__( 'Visit %s to create your map. 1) Find location 2) Click "Share" and make sure map is public on the web 3) Click folder icon to reveal "Embed on my site" link 4) Copy iframe code and paste it here.', 'js_composer' ), '<a href="https://mapsengine.google.com/" target="_blank">Google maps</a>' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Map height', 'js_composer' ),
			'param_name'  => 'size',
			'admin_label' => true,
			'description' => esc_html__( 'Enter map height in pixels. Example: 200 or leave it empty to make map responsive.', 'js_composer' )
		),
		/*array(


        'type' => 'dropdown',


        'heading' => esc_html__( 'Map type', 'js_composer' ),


        'param_name' => 'type',


        'value' => array( esc_html__( 'Map', 'js_composer' ) => 'm', esc_html__( 'Satellite', 'js_composer' ) => 'k', esc_html__( 'Map + Terrain', 'js_composer' ) => "p" ),


        'description' => esc_html__( 'Select map type.', 'js_composer' )


  ),


  array(


        'type' => 'dropdown',


        'heading' => esc_html__( 'Map Zoom', 'js_composer' ),


        'param_name' => 'zoom',


        'value' => array( esc_html__( '14 - Default', 'js_composer' ) => 14, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 15, 16, 17, 18, 19, 20)


  ),


  array(


        'type' => 'checkbox',


        'heading' => esc_html__( 'Remove info bubble', 'js_composer' ),


        'param_name' => 'bubble',


        'description' => esc_html__( 'If selected, information bubble will be hidden.', 'js_composer' ),


        'value' => array( esc_html__( 'Yes, please', 'js_composer' ) => true),


  ),*/
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
/* Raw HTML


---------------------------------------------------------- */
vc_map( array(
	'name'          => esc_html__( 'Raw HTML', 'js_composer' ),
	'base'          => 'vc_raw_html',
	'icon'          => 'icon-wpb-raw-html',
	'category'      => esc_html__( 'Structure', 'js_composer' ),
	'wrapper_class' => 'clearfix',
	'description'   => esc_html__( 'Output raw html code on your page', 'js_composer' ),
	'params'        => array(
		array(
			'type'        => 'textarea_raw_html',
			'holder'      => 'div',
			'heading'     => esc_html__( 'Raw HTML', 'js_composer' ),
			'param_name'  => 'content',
			'value'       => base64_encode( '<p>I am raw html block.<br/>Click edit button to change this html</p>' ),
			'description' => esc_html__( 'Enter your HTML content.', 'js_composer' )
		),
	)
) );
/* Raw JS


---------------------------------------------------------- */
vc_map( array(
	'name'          => esc_html__( 'Raw JS', 'js_composer' ),
	'base'          => 'vc_raw_js',
	'icon'          => 'icon-wpb-raw-javascript',
	'category'      => esc_html__( 'Structure', 'js_composer' ),
	'wrapper_class' => 'clearfix',
	'description'   => esc_html__( 'Output raw javascript code on your page', 'js_composer' ),
	'params'        => array(
		array(
			'type'        => 'textarea_raw_html',
			'holder'      => 'div',
			'heading'     => esc_html__( 'Raw js', 'js_composer' ),
			'param_name'  => 'content',
			'value'       => base64_encode( '<script type="text/javascript"> alert("Enter your js here!" ); </script>' ),
			'description' => esc_html__( 'Enter your JS code.', 'js_composer' )
		),
	)
) );
/* Flickr


---------------------------------------------------------- */
vc_map( array(
	'base'        => 'vc_flickr',
	'name'        => esc_html__( 'Flickr Widget', 'js_composer' ),
	'icon'        => 'icon-wpb-flickr',
	'category'    => esc_html__( 'Content', 'js_composer' ),
	'description' => esc_html__( 'Image feed from your flickr account', 'js_composer' ),
	"params"      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Flickr ID', 'js_composer' ),
			'param_name'  => 'flickr_id',
			'admin_label' => true,
			'description' => sprintf( esc_html__( 'To find your flickID visit %s.', 'js_composer' ), '<a href="http://idgettr.com/" target="_blank">idGettr</a>' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Number of photos', 'js_composer' ),
			'param_name'  => 'count',
			'value'       => array( 9, 8, 7, 6, 5, 4, 3, 2, 1 ),
			'description' => esc_html__( 'Number of photos.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Type', 'js_composer' ),
			'param_name'  => 'type',
			'value'       => array(
				esc_html__( 'User', 'js_composer' )  => 'user',
				esc_html__( 'Group', 'js_composer' ) => 'group'
			),
			'description' => esc_html__( 'Photo stream type.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Display', 'js_composer' ),
			'param_name'  => 'display',
			'value'       => array(
				esc_html__( 'Latest', 'js_composer' ) => 'latest',
				esc_html__( 'Random', 'js_composer' ) => 'random'
			),
			'description' => esc_html__( 'Photo order.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
/* Graph


---------------------------------------------------------- */
vc_map( array(
	'name'        => esc_html__( 'Progress Bar', 'js_composer' ),
	'base'        => 'vc_progress_bar',
	'icon'        => 'icon-wpb-graph',
	'category'    => esc_html__( 'Content', 'js_composer' ),
	'description' => esc_html__( 'Animated progress bar', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' )
		),
		array(
			'type'        => 'exploded_textarea',
			'heading'     => esc_html__( 'Graphic values', 'js_composer' ),
			'param_name'  => 'values',
			'description' => esc_html__( 'Input graph values, titles and color here. Divide values with linebreaks (Enter). Example: 90|Development|#e75956', 'js_composer' ),
			'value'       => "90|Development,80|Design,70|Marketing"
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Units', 'js_composer' ),
			'param_name'  => 'units',
			'description' => esc_html__( 'Enter measurement units (if needed) Eg. %, px, points, etc. Graph value and unit will be appended to the graph title.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Bar color', 'js_composer' ),
			'param_name'  => 'bgcolor',
			'value'       => array(
				esc_html__( 'Grey', 'js_composer' )         => 'bar_grey',
				esc_html__( 'Blue', 'js_composer' )         => 'bar_blue',
				esc_html__( 'Turquoise', 'js_composer' )    => 'bar_turquoise',
				esc_html__( 'Green', 'js_composer' )        => 'bar_green',
				esc_html__( 'Orange', 'js_composer' )       => 'bar_orange',
				esc_html__( 'Red', 'js_composer' )          => 'bar_red',
				esc_html__( 'Black', 'js_composer' )        => 'bar_black',
				esc_html__( 'Custom Color', 'js_composer' ) => 'custom'
			),
			'description' => esc_html__( 'Select bar background color.', 'js_composer' ),
			'admin_label' => true
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Bar custom color', 'js_composer' ),
			'param_name'  => 'custombgcolor',
			'description' => esc_html__( 'Select custom background color for bars.', 'js_composer' ),
			'dependency'  => array( 'element' => 'bgcolor', 'value' => array( 'custom' ) )
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Options', 'js_composer' ),
			'param_name' => 'options',
			'value'      => array(
				esc_html__( 'Add Stripes?', 'js_composer' )                                      => 'striped',
				esc_html__( 'Add animation? Will be visible with striped bars.', 'js_composer' ) => 'animated'
			)
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
/**
 * Pie chart
 */
vc_map( array(
	'name'        => esc_html__( 'Pie chart', 'vc_extend' ),
	'base'        => 'vc_pie',
	'class'       => '',
	'icon'        => 'icon-wpb-vc_pie',
	'category'    => esc_html__( 'Content', 'js_composer' ),
	'description' => esc_html__( 'Animated pie chart', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
			'admin_label' => true
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Pie value', 'js_composer' ),
			'param_name'  => 'value',
			'description' => esc_html__( 'Input graph value here. Choose range between 0 and 100.', 'js_composer' ),
			'value'       => '50',
			'admin_label' => true
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Pie label value', 'js_composer' ),
			'param_name'  => 'label_value',
			'description' => esc_html__( 'Input integer value for label. If empty "Pie value" will be used.', 'js_composer' ),
			'value'       => ''
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Units', 'js_composer' ),
			'param_name'  => 'units',
			'description' => esc_html__( 'Enter measurement units (if needed) Eg. %, px, points, etc. Graph value and unit will be appended to the graph title.', 'js_composer' )
		),
		array(
			'type'               => 'dropdown',
			'heading'            => esc_html__( 'Bar color', 'js_composer' ),
			'param_name'         => 'color',
			'value'              => $colors_arr, //$pie_colors,
			'description'        => esc_html__( 'Select pie chart color.', 'js_composer' ),
			'admin_label'        => true,
			'param_holder_class' => 'vc_colored-dropdown'
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		),
	)
) );
/* Support for 3rd Party plugins


---------------------------------------------------------- */
// Contact form 7 plugin
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // Require plugin.php to use is_plugin_active() below
if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
	global $wpdb;
	$cf7 = $wpdb->get_results(
		"


  SELECT ID, post_title


  FROM $wpdb->posts


  WHERE post_type = 'wpcf7_contact_form'


  "
	);
	$contact_forms = array();
	if ( $cf7 ) {
		foreach ( $cf7 as $cform ) {
			$contact_forms[ $cform->post_title ] = $cform->ID;
		}
	} else {
		$contact_forms[ esc_html__( 'No contact forms found', 'js_composer' ) ] = 0;
	}
	vc_map( array(
		'base'        => 'contact-form-7',
		'name'        => esc_html__( 'Contact Form 7', 'js_composer' ),
		'icon'        => 'icon-wpb-contactform7',
		'category'    => esc_html__( 'Content', 'js_composer' ),
		'description' => esc_html__( 'Place Contact Form7', 'js_composer' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Form title', 'js_composer' ),
				'param_name'  => 'title',
				'admin_label' => true,
				'description' => esc_html__( 'What text use as form title. Leave blank if no title is needed.', 'js_composer' )
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Select contact form', 'js_composer' ),
				'param_name'  => 'id',
				'value'       => $contact_forms,
				'description' => esc_html__( 'Choose previously created contact form from the drop down list.', 'js_composer' )
			)
		)
	) );
} // if contact form7 plugin active
if ( is_plugin_active( 'gravityforms/gravityforms.php' ) ) {
	$gravity_forms_array[ esc_html__( 'No Gravity forms found.', 'js_composer' ) ] = '';
	if ( class_exists( 'RGFormsModel' ) ) {
		$gravity_forms = RGFormsModel::get_forms( 1, 'title' );
		if ( $gravity_forms ) {
			$gravity_forms_array = array( esc_html__( 'Select a form to display.', 'js_composer' ) => '' );
			foreach ( $gravity_forms as $gravity_form ) {
				$gravity_forms_array[ $gravity_form->title ] = $gravity_form->id;
			}
		}
	}
	vc_map( array(
		'name'        => esc_html__( 'Gravity Form', 'js_composer' ),
		'base'        => 'gravityform',
		'icon'        => 'icon-wpb-vc_gravityform',
		'category'    => esc_html__( 'Content', 'js_composer' ),
		'description' => esc_html__( 'Place Gravity form', 'js_composer' ),
		'params'      => array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Form', 'js_composer' ),
				'param_name'  => 'id',
				'value'       => $gravity_forms_array,
				'description' => esc_html__( 'Select a form to add it to your post or page.', 'js_composer' ),
				'admin_label' => true
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Display Form Title', 'js_composer' ),
				'param_name'  => 'title',
				'value'       => array(
					esc_html__( 'No', 'js_composer' )  => 'false',
					esc_html__( 'Yes', 'js_composer' ) => 'true'
				),
				'description' => esc_html__( 'Would you like to display the forms title?', 'js_composer' ),
				'dependency'  => array( 'element' => 'id', 'not_empty' => true )
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Display Form Description', 'js_composer' ),
				'param_name'  => 'description',
				'value'       => array(
					esc_html__( 'No', 'js_composer' )  => 'false',
					esc_html__( 'Yes', 'js_composer' ) => 'true'
				),
				'description' => esc_html__( 'Would you like to display the forms description?', 'js_composer' ),
				'dependency'  => array( 'element' => 'id', 'not_empty' => true )
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Enable AJAX?', 'js_composer' ),
				'param_name'  => 'ajax',
				'value'       => array(
					esc_html__( 'No', 'js_composer' )  => 'false',
					esc_html__( 'Yes', 'js_composer' ) => 'true'
				),
				'description' => esc_html__( 'Enable AJAX submission?', 'js_composer' ),
				'dependency'  => array( 'element' => 'id', 'not_empty' => true )
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Tab Index', 'js_composer' ),
				'param_name'  => 'tabindex',
				'description' => esc_html__( '(Optional) Specify the starting tab index for the fields of this form. Leave blank if you\'re not sure what this is.', 'js_composer' ),
				'dependency'  => array( 'element' => 'id', 'not_empty' => true )
			)
		)
	) );
} // if gravityforms active
/* WordPress default Widgets (Appearance->Widgets)


---------------------------------------------------------- */
vc_map( array(
	'name'        => 'WP ' . esc_html__( "Search" , 'js_composer'),
	'base'        => 'vc_wp_search',
	'icon'        => 'icon-wpb-wp',
	'category'    => esc_html__( 'WordPress Widgets', 'js_composer' ),
	'class'       => 'wpb_vc_wp_widget',
	'weight'      => - 50,
	'description' => esc_html__( 'A search form for your site', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
vc_map( array(
	'name'        => 'WP ' . esc_html__( 'Meta', 'js_composer' ),
	'base'        => 'vc_wp_meta',
	'icon'        => 'icon-wpb-wp',
	'category'    => esc_html__( 'WordPress Widgets', 'js_composer' ),
	'class'       => 'wpb_vc_wp_widget',
	'weight'      => - 50,
	'description' => esc_html__( 'Log in/out, admin, feed and WordPress links', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
vc_map( array(
	'name'        => 'WP ' . esc_html__( 'Recent Comments', 'js_composer' ),
	'base'        => 'vc_wp_recentcomments',
	'icon'        => 'icon-wpb-wp',
	'category'    => esc_html__( 'WordPress Widgets', 'js_composer' ),
	'class'       => 'wpb_vc_wp_widget',
	'weight'      => - 50,
	'description' => esc_html__( 'The most recent comments', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Number of comments to show', 'js_composer' ),
			'param_name'  => 'number',
			'admin_label' => true
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
vc_map( array(
	'name'        => 'WP ' . esc_html__( 'Calendar', 'js_composer' ),
	'base'        => 'vc_wp_calendar',
	'icon'        => 'icon-wpb-wp',
	'category'    => esc_html__( 'WordPress Widgets', 'js_composer' ),
	'class'       => 'wpb_vc_wp_widget',
	'weight'      => - 50,
	'description' => esc_html__( 'A calendar of your sites posts', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
vc_map( array(
	'name'        => 'WP ' . esc_html__( 'Pages', 'js_composer' ),
	'base'        => 'vc_wp_pages',
	'icon'        => 'icon-wpb-wp',
	'category'    => esc_html__( 'WordPress Widgets', 'js_composer' ),
	'class'       => 'wpb_vc_wp_widget',
	'weight'      => - 50,
	'description' => esc_html__( 'Your sites WordPress Pages', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Sort by', 'js_composer' ),
			'param_name'  => 'sortby',
			'value'       => array(
				esc_html__( 'Page title', 'js_composer' ) => 'post_title',
				esc_html__( 'Page order', 'js_composer' ) => 'menu_order',
				esc_html__( 'Page ID', 'js_composer' )    => 'ID'
			),
			'admin_label' => true
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Exclude', 'js_composer' ),
			'param_name'  => 'exclude',
			'description' => esc_html__( 'Page IDs, separated by commas.', 'js_composer' ),
			'admin_label' => true
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
$tag_taxonomies = array();
foreach ( get_taxonomies() as $taxonomy ) {
	$tax = get_taxonomy( $taxonomy );
	if ( ! $tax->show_tagcloud || empty( $tax->labels->name ) ) {
		continue;
	}
	$tag_taxonomies[ $tax->labels->name ] = esc_attr( $taxonomy );
}
vc_map( array(
	'name'        => 'WP ' . esc_html__( 'Tag Cloud', 'js_composer' ),
	'base'        => 'vc_wp_tagcloud',
	'icon'        => 'icon-wpb-wp',
	'category'    => esc_html__( 'WordPress Widgets', 'js_composer' ),
	'class'       => 'wpb_vc_wp_widget',
	'weight'      => - 50,
	'description' => esc_html__( 'Your most used tags in cloud format', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Taxonomy', 'js_composer' ),
			'param_name'  => 'taxonomy',
			'value'       => $tag_taxonomies,
			'admin_label' => true
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
$custom_menus = array();
$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
if ( is_array( $menus ) ) {
	foreach ( $menus as $single_menu ) {
		$custom_menus[ $single_menu->name ] = $single_menu->term_id;
	}
}
vc_map( array(
	'name'        => 'WP ' . esc_html__( "Custom Menu", 'js_composer' ),
	'base'        => 'vc_wp_custommenu',
	'icon'        => 'icon-wpb-wp',
	'category'    => esc_html__( 'WordPress Widgets', 'js_composer' ),
	'class'       => 'wpb_vc_wp_widget',
	'weight'      => - 50,
	'description' => esc_html__( 'Use this widget to add one of your custom menus as a widget', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Menu', 'js_composer' ),
			'param_name'  => 'nav_menu',
			'value'       => $custom_menus,
			'description' => empty( $custom_menus ) ? 'Custom menus not found. Please visit <b>Appearance > Menus</b> page to create new menu.' : esc_html__( 'Select menu', 'js_composer' ),
			'admin_label' => true
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
vc_map( array(
	'name'        => 'WP ' . esc_html__( 'Text', 'js_composer' ),
	'base'        => 'vc_wp_text',
	'icon'        => 'icon-wpb-wp',
	'category'    => esc_html__( 'WordPress Widgets', 'js_composer' ),
	'class'       => 'wpb_vc_wp_widget',
	'weight'      => - 50,
	'description' => esc_html__( 'Arbitrary text or HTML', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' )
		),
		array(
			'type'       => 'textarea',
			'heading'    => esc_html__( 'Text', 'js_composer' ),
			'param_name' => 'content',
			// 'admin_label' => true
		),
		/*array(


        'type' => 'checkbox',


        'heading' => esc_html__( 'Automatically add paragraphs', 'js_composer' ),


        'param_name' => "filter"


  ),*/
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
vc_map( array(
	'name'        => 'WP ' . esc_html__( 'Recent Posts', 'js_composer' ),
	'base'        => 'vc_wp_posts',
	'icon'        => 'icon-wpb-wp',
	'category'    => esc_html__( 'WordPress Widgets', 'js_composer' ),
	'class'       => 'wpb_vc_wp_widget',
	'weight'      => - 50,
	'description' => esc_html__( 'The most recent posts on your site', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Number of posts to show', 'js_composer' ),
			'param_name'  => 'number',
			'admin_label' => true
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Display post date?', 'js_composer' ),
			'param_name' => 'show_date',
			'value'      => array( esc_html__( 'Yes, please', 'js_composerp' ) => true )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
$link_category = array( esc_html__( 'All Links', 'js_composer' ) => '' );
$link_cats = get_terms( 'link_category' );
if ( is_array( $link_cats ) ) {
	foreach ( $link_cats as $link_cat ) {
		$link_category[ $link_cat->name ] = $link_cat->term_id;
	}
}
vc_map( array(
	'name'            => 'WP ' . esc_html__( 'Links', 'js_composer' ),
	'base'            => 'vc_wp_links',
	'icon'            => 'icon-wpb-wp',
	'category'        => esc_html__( 'WordPress Widgets', 'js_composer' ),
	'class'           => 'wpb_vc_wp_widget',
	'content_element' => (bool) get_option( 'link_manager_enabled' ),
	'weight'          => - 50,
	'description'     => esc_html__( 'Your blogroll', 'js_composer' ),
	'params'          => array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Link Category', 'js_composer' ),
			'param_name'  => 'category',
			'value'       => $link_category,
			'admin_label' => true
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Sort by', 'js_composer' ),
			'param_name' => 'orderby',
			'value'      => array(
				esc_html__( 'Link title', 'js_composer' )  => 'name',
				esc_html__( 'Link rating', 'js_composer' ) => 'rating',
				esc_html__( 'Link ID', 'js_composer' )     => 'id',
				esc_html__( 'Random', 'js_composer' )      => 'rand'
			)
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Options', 'js_composer' ),
			'param_name' => 'options',
			'value'      => array(
				esc_html__( 'Show Link Image', 'js_composer' )       => 'images',
				esc_html__( 'Show Link Name', 'js_composer' )        => 'name',
				esc_html__( 'Show Link Description', 'js_composer' ) => 'description',
				esc_html__( 'Show Link Rating', 'js_composer' )      => 'rating'
			)
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Number of links to show', 'js_composer' ),
			'param_name' => 'limit'
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
vc_map( array(
	'name'        => 'WP ' . esc_html__( 'Categories', 'js_composer' ),
	'base'        => 'vc_wp_categories',
	'icon'        => 'icon-wpb-wp',
	'category'    => esc_html__( 'WordPress Widgets', 'js_composer' ),
	'class'       => 'wpb_vc_wp_widget',
	'weight'      => - 50,
	'description' => esc_html__( 'A list or dropdown of categories', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' )
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Options', 'js_composer' ),
			'param_name' => 'options',
			'value'      => array(
				esc_html__( 'Display as dropdown', 'js_composer' ) => 'dropdown',
				esc_html__( 'Show post counts', 'js_composer' )    => 'count',
				esc_html__( 'Show hierarchy', 'js_composer' )      => 'hierarchical'
			)
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
vc_map( array(
	'name'        => 'WP ' . esc_html__( 'Archives', 'js_composer' ),
	'base'        => 'vc_wp_archives',
	'icon'        => 'icon-wpb-wp',
	'category'    => esc_html__( 'WordPress Widgets', 'js_composer' ),
	'class'       => 'wpb_vc_wp_widget',
	'weight'      => - 50,
	'description' => esc_html__( 'A monthly archive of your sites posts', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' )
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Options', 'js_composer' ),
			'param_name' => 'options',
			'value'      => array(
				esc_html__( 'Display as dropdown', 'js_composer' ) => 'dropdown',
				esc_html__( 'Show post counts', 'js_composer' )    => 'count'
			)
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
vc_map( array(
	'name'        => 'WP ' . esc_html__( 'RSS', 'js_composer' ),
	'base'        => 'vc_wp_rss',
	'icon'        => 'icon-wpb-wp',
	'category'    => esc_html__( 'WordPress Widgets', 'js_composer' ),
	'class'       => 'wpb_vc_wp_widget',
	'weight'      => - 50,
	'description' => esc_html__( 'Entries from any RSS or Atom feed', 'js_composer' ),
	'params'      => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'js_composer' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'What text use as a widget title. Leave blank to use default widget title.', 'js_composer' )
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'RSS feed URL', 'js_composer' ),
			'param_name'  => 'url',
			'description' => esc_html__( 'Enter the RSS feed URL.', 'js_composer' ),
			'admin_label' => true
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Items', 'js_composer' ),
			'param_name'  => 'items',
			'value'       => array(
				esc_html__( '10 - Default', 'js_composer' ) => '',
				1,
				2,
				3,
				4,
				5,
				6,
				7,
				8,
				9,
				10,
				11,
				12,
				13,
				14,
				15,
				16,
				17,
				18,
				19,
				20
			),
			'description' => esc_html__( 'How many items would you like to display?', 'js_composer' ),
			'admin_label' => true
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Options', 'js_composer' ),
			'param_name' => 'options',
			'value'      => array(
				esc_html__( 'Display item content?', 'js_composer' )             => 'show_summary',
				esc_html__( 'Display item author if available?', 'js_composer' ) => 'show_author',
				esc_html__( 'Display item date?', 'js_composer' )                => 'show_date'
			)
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
		)
	)
) );
/* Empty Space Element


---------------------------------------------------------- */
vc_map( array(
	'name'                    => esc_html__( 'Empty Space', 'js_composer' ),
	'base'                    => 'vc_empty_space',
	'icon'                    => 'icon-wpb-ui-empty_space',
	'show_settings_on_create' => true,
	'category'                => esc_html__( 'Content', 'js_composer' ),
	'description'             => esc_html__( 'Add spacer with custom height', 'js_composer' ),
	'params'                  => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Height', 'js_composer' ),
			'param_name'  => 'height',
			'value'       => '32px',
			'admin_label' => true,
			'description' => esc_html__( 'Enter empty space height.', 'js_composer' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
		),
	),
) );
/* Custom Heading element


----------------------------------------------------------- */
vc_map( array(
	'name'                    => esc_html__( 'Custom Heading', 'js_composer' ),
	'base'                    => 'vc_custom_heading',
	'icon'                    => 'icon-wpb-ui-custom_heading',
	'show_settings_on_create' => true,
	'category'                => esc_html__( 'Content', 'js_composer' ),
	'description'             => esc_html__( 'Add custom heading text with google fonts', 'js_composer' ),
	'params'                  => array(
		array(
			'type'        => 'textarea',
			'heading'     => esc_html__( 'Text', 'js_composer' ),
			'param_name'  => 'text',
			'admin_label' => true,
			'value'       => esc_html__( 'This is custom heading element with Google Fonts', 'js_composer' ),
			'description' => esc_html__( 'Enter your content. If you are using non-latin characters be sure to activate them under Settings/Visual Composer/General Settings.', 'js_composer' ),
		),
		array(
			'type'       => 'font_container',
			'param_name' => 'font_container',
			'value'      => '',
			'settings'   => array(
				'fields' => array(
					'tag'                     => 'h2', // default value h2
					'text_align',
					'font_size',
					'line_height',
					'color',
					//'font_style_italic'
					//'font_style_bold'
					//'font_family'
					'tag_description'         => esc_html__( 'Select element tag.', 'js_composer' ),
					'text_align_description'  => esc_html__( 'Select text alignment.', 'js_composer' ),
					'font_size_description'   => esc_html__( 'Enter font size.', 'js_composer' ),
					'line_height_description' => esc_html__( 'Enter line height.', 'js_composer' ),
					'color_description'       => esc_html__( 'Select color for your element.', 'js_composer' ),
					//'font_style_description' => esc_html__('Put your description here','js_composer'),
					//'font_family_description' => esc_html__('Put your description here','js_composer'),
				),
			),
			// 'description' => esc_html__( '', 'js_composer' ),
		),
		array(
			'type'       => 'google_fonts',
			'param_name' => 'google_fonts',
			'value'      => '',
			// Not recommended, this will override 'settings'. 'font_family:'.rawurlencode('Exo:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic').'|font_style:'.rawurlencode('900 bold italic:900:italic'),
			'settings'   => array(
				//'no_font_style' // Method 1: To disable font style
				//'no_font_style'=>true // Method 2: To disable font style
				'fields' => array(
					'font_family'             => 'Abril Fatface:regular',
					//'Exo:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',// Default font family and all available styles to fetch
					'font_style'              => '400 regular:400:normal',
					// Default font style. Name:weight:style, example: "800 bold regular:800:normal"
					'font_family_description' => esc_html__( 'Select font family.', 'js_composer' ),
					'font_style_description'  => esc_html__( 'Select font styling.', 'js_composer' )
				)
			),
			// 'description' => esc_html__( '', 'js_composer' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
		),
		array(
			'type'       => 'css_editor',
			'heading'    => esc_html__( 'Css', 'js_composer' ),
			'param_name' => 'css',
			// 'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
			'group'      => esc_html__( 'Design options', 'js_composer' )
		)
	),
) );


/*** Visual Composer Content elements refresh ***/
class webuild_VcSharedLibrary {
	// Here we will store plugin wise (shared) settings. Colors, Locations, Sizes, etc...
	/**
	 * @var array
	 */
	private static $colors = array(
		'Blue' => 'blue',
		'Turquoise' => 'turquoise',
		'Pink' => 'pink',
		'Violet' => 'violet',
		'Peacoc' => 'peacoc',
		'Chino' => 'chino',
		'Mulled Wine' => 'mulled_wine',
		'Vista Blue' => 'vista_blue',
		'Black' => 'black',
		'Grey' => 'grey',
		'Orange' => 'orange',
		'Sky' => 'sky',
		'Green' => 'green',
		'Juicy pink' => 'juicy_pink',
		'Sandy brown' => 'sandy_brown',
		'Purple' => 'purple',
		'White' => 'white'
	);

	/**
	 * @var array
	 */
	public static $icons = array(
		'Glass' => 'glass',
		'Music' => 'music',
		'Search' => 'search'
	);

	/**
	 * @var array
	 */
	public static $sizes = array(
		'Mini' => 'xs',
		'Small' => 'sm',
		'Normal' => 'md',
		'Large' => 'lg'
	);

	/**
	 * @var array
	 */
	public static $button_styles = array(
		'Rounded' => 'rounded',
		'Square' => 'square',
		'Round' => 'round',
		'Outlined' => 'outlined',
		'3D' => '3d',
		'Square Outlined' => 'square_outlined'
	);

	/**
	 * @var array
	 */
	public static $message_box_styles = array(
		'Standard' => 'standard',
		'Solid' => 'solid',
		'Solid icon' => 'solid-icon',
		'Outline' => 'outline',
		'3D' => '3d',
	);

	/**
	 * Toggle styles
	 * @var array
	 */
	public static $toggle_styles = array(
		'Default' => 'default',
		'Simple' => 'simple',
		'Round' => 'round',
		'Round Outline' => 'round_outline',
		'Rounded' => 'rounded',
		'Rounded Outline' => 'rounded_outline',
		'Square' => 'square',
		'Square Outline' => 'square_outline',
		'Arrow' => 'arrow',
		'Text Only' => 'text_only',
	);

	/**
	 * Animation styles
	 * @var array
	 */
	public static $animation_styles = array(
		'Bounce' => 'easeOutBounce',
		'Elastic' => 'easeOutElastic',
		'Back' => 'easeOutBack',
		'Cubic' => 'easeinOutCubic',
		'Quint' => 'easeinOutQuint',
		'Quart' => 'easeOutQuart',
		'Quad' => 'easeinQuad',
		'Sine' => 'easeOutSine'
	);

	/**
	 * @var array
	 */
	public static $cta_styles = array(
		'Rounded' => 'rounded',
		'Square' => 'square',
		'Round' => 'round',
		'Outlined' => 'outlined',
		'Square Outlined' => 'square_outlined'
	);

	/**
	 * @var array
	 */
	public static $txt_align = array(
		'Left' => 'left',
		'Right' => 'right',
		'Center' => 'center',
		'Justify' => 'justify'
	);

	/**
	 * @var array
	 */
	public static $el_widths = array(
		'100%' => '',
		'90%' => '90',
		'80%' => '80',
		'70%' => '70',
		'60%' => '60',
		'50%' => '50',
		'40%' => '40',
		'30%' => '30',
		'20%' => '20',
		'10%' => '10'
	);

	/**
	 * @var array
	 */
	public static $sep_widths = array(
		'1px' => '',
		'2px' => '2',
		'3px' => '3',
		'4px' => '4',
		'5px' => '5',
		'6px' => '6',
		'7px' => '7',
		'8px' => '8',
		'9px' => '9',
		'10px' => '10'
	);

	/**
	 * @var array
	 */
	public static $sep_styles = array(
		'Border' => '',
		'Dashed' => 'dashed',
		'Dotted' => 'dotted',
		'Double' => 'double'
	);

	/**
	 * @var array
	 */
	public static $box_styles = array(
		'Default' => '',
		'Rounded' => 'vc_box_rounded',
		'Border' => 'vc_box_border',
		'Outline' => 'vc_box_outline',
		'Shadow' => 'vc_box_shadow',
		'Bordered shadow' => 'vc_box_shadow_border',
		'3D Shadow' => 'vc_box_shadow_3d'
	);

	/**
	 * Round box styles
	 *
	 * @var array
	 */
	public static $round_box_styles = array(
		'Round' => 'vc_box_circle',
		'Round Border' => 'vc_box_border_circle',
		'Round Outline' => 'vc_box_outline_circle',
		'Round Shadow' => 'vc_box_shadow_circle',
		'Round Border Shadow' => 'vc_box_shadow_border_circle'
	);

	/**
	 * Circle box styles
	 *
	 * @var array
	 */
	public static $circle_box_styles = array(
		'Circle' => 'vc_box_circle_2',
		'Circle Border' => 'vc_box_border_circle_2',
		'Circle Outline' => 'vc_box_outline_circle_2',
		'Circle Shadow' => 'vc_box_shadow_circle_2',
		'Circle Border Shadow' => 'vc_box_shadow_border_circle_2'
	);

	/**
	 * @return array
	 */
	public static function getColors() {
		return self::$colors;
	}

	/**
	 * @return array
	 */
	public static function getIcons() {
		return self::$icons;
	}

	/**
	 * @return array
	 */
	public static function getSizes() {
		return self::$sizes;
	}

	/**
	 * @return array
	 */
	public static function getButtonStyles() {
		return self::$button_styles;
	}

	/**
	 * @return array
	 */
	public static function getMessageBoxStyles() {
		return self::$message_box_styles;
	}

	/**
	 * @return array
	 */
	public static function getToggleStyles() {
		return self::$toggle_styles;
	}

	/**
	 * @return array
	 */
	public static function getAnimationStyles() {
		return self::$animation_styles;
	}

	/**
	 * @return array
	 */
	public static function getCtaStyles() {
		return self::$cta_styles;
	}

	/**
	 * @return array
	 */
	public static function getTextAlign() {
		return self::$txt_align;
	}

	/**
	 * @return array
	 */
	public static function getBorderWidths() {
		return self::$sep_widths;
	}

	/**
	 * @return array
	 */
	public static function getElementWidths() {
		return self::$el_widths;
	}

	/**
	 * @return array
	 */
	public static function getSeparatorStyles() {
		return self::$sep_styles;
	}

	/**
	 * Get list of box styles
	 *
	 * Possible $groups values:
	 * - default
	 * - round
	 * - circle
	 *
	 * @param array $groups Array of groups to include. If not specified, return all
	 *
	 * @return array
	 */
	public static function getBoxStyles( $groups = array() ) {
		$list = array();
		$groups = (array) $groups;

		if ( ! $groups || in_array( 'default', $groups ) ) {
			$list += self::$box_styles;
		}

		if ( ! $groups || in_array( 'round', $groups ) ) {
			$list += self::$round_box_styles;
		}

		if ( ! $groups || in_array( 'cirlce', $groups ) ) {
			$list += self::$circle_box_styles;
		}

		return $list;
	}

	public static function getColorsDashed() {
		$colors = array(
			esc_html__( 'Blue', 'js_composer' ) => 'blue',
			esc_html__( 'Turquoise', 'js_composer' ) => 'turquoise',
			esc_html__( 'Pink', 'js_composer' ) => 'pink',
			esc_html__( 'Violet', 'js_composer' ) => 'violet',
			esc_html__( 'Peacoc', 'js_composer' ) => 'peacoc',
			esc_html__( 'Chino', 'js_composer' ) => 'chino',
			esc_html__( 'Mulled Wine', 'js_composer' ) => 'mulled-wine',
			esc_html__( 'Vista Blue', 'js_composer' ) => 'vista-blue',
			esc_html__( 'Black', 'js_composer' ) => 'black',
			esc_html__( 'Grey', 'js_composer' ) => 'grey',
			esc_html__( 'Orange', 'js_composer' ) => 'orange',
			esc_html__( 'Sky', 'js_composer' ) => 'sky',
			esc_html__( 'Green', 'js_composer' ) => 'green',
			esc_html__( 'Juicy pink', 'js_composer' ) => 'juicy-pink',
			esc_html__( 'Sandy brown', 'js_composer' ) => 'sandy-brown',
			esc_html__( 'Purple', 'js_composer' ) => 'purple',
			esc_html__( 'White', 'js_composer' ) => 'white'
		);

		return $colors;
	}
}

/**
 * @param string $asset
 *
 * @return array
 */
function webuild_getVcShared( $asset = '' ) {
	switch ( $asset ) {
		case 'colors':
			return webuild_VcSharedLibrary::getColors();
			break;

		case 'colors-dashed':
			return webuild_VcSharedLibrary::getColorsDashed();
			break;

		case 'icons':
			return webuild_VcSharedLibrary::getIcons();
			break;

		case 'sizes':
			return webuild_VcSharedLibrary::getSizes();
			break;

		case 'button styles':
		case 'alert styles':
			return webuild_VcSharedLibrary::getButtonStyles();
			break;
		case 'message_box_styles':
			return webuild_VcSharedLibrary::getMessageBoxStyles();
			break;
		case 'cta styles':
			return webuild_VcSharedLibrary::getCtaStyles();
			break;

		case 'text align':
			return webuild_VcSharedLibrary::getTextAlign();
			break;

		case 'cta widths':
		case 'separator widths':
			return webuild_VcSharedLibrary::getElementWidths();
			break;

		case 'separator styles':
			return webuild_VcSharedLibrary::getSeparatorStyles();
			break;

		case 'separator border widths':
			return webuild_VcSharedLibrary::getBorderWidths();
			break;

		case 'single image styles':
			return webuild_VcSharedLibrary::getBoxStyles();
			break;

		case 'single image external styles':
			return webuild_VcSharedLibrary::getBoxStyles( array( 'default', 'round' ) );
			break;

		case 'toggle styles':
			return webuild_VcSharedLibrary::getToggleStyles();
			break;

		case 'animation styles':
			return webuild_VcSharedLibrary::getAnimationStyles();
			break;

		default:
			# code...
			break;
	}

	return '';
}