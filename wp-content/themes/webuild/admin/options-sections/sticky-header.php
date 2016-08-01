<?php
//BLOG
Redux::setSection( $opt_name, array(
	'title'  => 'Sticky Header',
	'icon'   => 'fa fa-cloud',
	'fields' => array(
		array(
			'id'       => 'sticky-section-start',
			'type'     => 'section',
			'title'    => esc_html__( 'Sticky header', THEME_NAME ),
			'subtitle' => esc_html__( 'By using these options, your website’s header will be affected. You can enable/disable a sticky header both on desktops and on mobile devices and set it’s padding, font size, height and background color', THEME_NAME ),
			'indent'   => true
		),
		array(
			'id'       => 'sticky-header',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Sticky Header', THEME_NAME ),
			'subtitle' => esc_html__( 'This option enables the website’s menu to always be visible on the page when you scroll down.', THEME_NAME ),
			'default'  => true,
			'compiler' => true
		),
		array(
			'id'             => 'select-sticky-menu-font-family',
			'type'           => 'typography',
			'title'          => esc_html__( 'Select Menu Font attributes', THEME_NAME ),
			'subtitle'       => esc_html__( 'From here you can set the font for the menu in the sticky header. When setting the color for the menu this will change the color for cart and search icon as well', THEME_NAME ),
			'compiler'       => array(
				'#header-sticky .primary-menu .navbar-nav > li > a'
			),
			'text-transform' => true,
			'subsets'        => false,
			'text-align'     => false,
			'google'         => true,
			'default'        => array(
				'color'          => '#2c3e50',
				'font-size'      => '14px',
				'font-family'    => 'Lato',
				'font-weight'    => '700',
				'line-height'    => '75px',
				'text-transform' => 'uppercase'
			)
		),
		array(
			'id'             => 'sticky-header-padding',
			'type'           => 'spacing',
			'output'         => array(
				'.sticky-header.fixed .primary-menu .navbar-nav > li > a'
			),
			'mode'           => 'padding',
			'units'          => array(
				'px'
			),
			'top'            => false,
			'bottom'         => false,
			'units_extended' => 'false',
			'title'          => esc_html__( 'This option enables you to set the distance between different items in the sticky menu', THEME_NAME ),
			'subtitle'       => esc_html__( '', THEME_NAME ),
			'subtitle'       => esc_html__( '', THEME_NAME ),
			'default'        => array(
				'padding-left'  => '15px',
				'padding-right' => '15px',
				'units'         => 'px'
			)
		),
		array(
			'id'       => 'sticky-header-bg-color',
			'type'     => 'color_rgba',
			'title'    => esc_html__( 'Sticky Header Background Color', THEME_NAME ),
			'subtitle' => esc_html__( 'This option enables you to set the background’s color of the sticky menu', THEME_NAME ),
			'default'  => array(
				'color' => '#ffffff',
				'alpha' => '0.97'
			),
			'compiler' => array(
				'#header-sticky'
			),
			'mode'     => 'background'
		),
		array(
			'id'       => 'sticky-header-size',
			'type'     => 'dimensions',
			'units'    => array(
				'px'
			),
			'width'    => false,
			'title'    => esc_html__( 'Sticky header height', THEME_NAME ),
			'subtitle' => esc_html__( 'This enables you to set the height in pixels for the sticky header', THEME_NAME ),
			'default'  => array(
				'height' => '80px',
				'units'  => 'px'
			),
			'compiler' => true
		),
	)
) );
?>




	