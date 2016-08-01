<?php
//HEADER
global $allowed_html;
Redux::setSection( $opt_name, array(
	'title'    => esc_html__( 'Header', THEME_NAME ),
	'subtitle' => esc_html__( '', THEME_NAME ),
	'icon'     => 'fa fa-list-alt',
	'fields'   => array(
		array(
			'id'       => 'header-section-start',
			'type'     => 'section',
			'subtitle' => wp_kses(__( 'The header is the bar sitting on the top of your website holding the navigation menu, logo, etc.<br>The following options enable you to set you header’s size, position, layout, overall appearance, padding and social icons.', THEME_NAME ),$allowed_html),
			'indent'   => true
		),
		array(
			'id'       => 'header-layout',
			'type'     => 'select',
			'title'    => esc_html__( 'Select layout', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'From here you can select the menu style you want from the predefined options', THEME_NAME ),
			'options'  => array(
				's1-header-v1'  => '1. Menu Bellow - Logo Left',
				's1-header-v2'  => '2. Menu Bellow - Logo Center',
				's2-header-v1'  => '3. Menu Right - Logo Left ',
				's2-header-v2'  => '4. Logo - Menu Center 1 line',
				'one-page-menu' => '5. One page menu'
			),
			'default'  => 's2-header-v1'
		),
		array(
			'id'       => 'logo-after',
			'type'     => 'text',
			'title'    => esc_html__( 'Menu items before logo', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'validate' => 'number',
			'subtitle' => esc_html__( 'Items before the logo - usually half of the number of menu items to center the logo.', THEME_NAME ),
			'default'  => '0',
			'required' => array(
				'header-layout',
				'equals',
				's2-header-v2'
			)
		),
		array(
			'id'       => 'header-size',
			'type'     => 'dimensions',
			'units'    => array(
				'px'
			),
			'subtitle' => wp_kses(__( 'From here you can select the height in pixels for the menu<br>This sets the header height as well for 3,4,5 header types', THEME_NAME ),$allowed_html),
			'width'    => false,
			'title'    => esc_html__( 'Menu height', THEME_NAME ),
			'subtitle' => esc_html__( 'This value will change the height of the menu.', THEME_NAME ),
			'default'  => array(
				'height' => '100px',
				'units'  => 'px'
			),
			'compiler' => true
		),
		array(
			'id'       => 'logo-image-height',
			'type'     => 'dimensions',
			'units'    => array(
					'px'
			),
			'subtitle' => wp_kses(__( 'From here you can select the height in pixels for the logo (e.g. 100).<br> The width will be automatically calculated.', THEME_NAME ),$allowed_html),
			'title'    => esc_html__( 'Logo height', THEME_NAME ),
			'width' => false,
			'default'  => array(
					'height' => '',
					'units'  => ''
			),
			'compiler' => true
		),
		array(
			'id'       => 'transparent-header',
			'type'     => 'switch',
			'title'    => esc_html__( 'Transparent header', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'When this option is ON, it eliminates the background behind the menu.', THEME_NAME ),
			'default'  => false
		),
		array(
			'id'       => 'content-offset',
			'type'     => 'dimensions',
			'units'    => array(
					'px'
			),
			'title'    => esc_html__( 'Content offset', THEME_NAME ),
			'subtitle' => esc_html__( 'This option puts the content under the menu (used for transparent menus). Please set the value in pixels for how much do you want the content to appear under the menu.', THEME_NAME ),
			'default'  => array(
					'height' => '100',
					'units'  => 'px'
			),
			'width' => false,
			'required' => array(
				'transparent-header',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'show-header-shadow',
			'type'     => 'switch',
			'title'    => esc_html__( 'Header shadow', THEME_NAME ),
			'subtitle' => esc_html__( 'When ON, this option adds a shadow on the navigation menu as well as on the sticky menu to emphasize them.', THEME_NAME ),
			'default'  => false,
			'compiler' => true
		),
		array(
			'id'       => 'slider-position',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Slider position', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'This option positions the slider under or above the menu.', THEME_NAME ),
			'options'  => array(
				'below' => 'Below',
				'above' => 'Above'
			),
			'default'  => 'below'
		),
		array(
			'id'       => 'full-width-header',
			'type'     => 'switch',
			'title'    => esc_html__( 'Full width header', THEME_NAME ),
			'subtitle' => esc_html__( 'This option allows you to set your header at full width', THEME_NAME ),
			'default'  => false,
			'compiler' => true
		),
		array(
			'id'       => 'header-bg-color',
			'type'     => 'color',
			'title'    => esc_html__( 'Header Background Color', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'This option enables you to set the background color from behind the menu.', THEME_NAME ),
			'default'  => '#ffffff',
			'validate' => 'color',
			'compiler' => array(
				'background-color' => '#top-menu'
			)
		),
		array(
			'id'       => 'header-bottom-border-color',
			'type'     => 'color',
			'title'    => esc_html__( 'Menu Top Border Color', THEME_NAME ),
			'subtitle' => esc_html__( 'This option sets the color of the menu’s top line. Only works with headers that have the menu below', THEME_NAME ),
			'default'  => '#e7e7e7',
			'compiler' => array(
				'border-color' => '.primary-menu'
			)
		),
		array(
			'id'     => 'header-section-end',
			'type'   => 'section',
			'indent' => false
		),
	)
) );
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Top header', THEME_NAME ),
	'subtitle'   => esc_html__( '', THEME_NAME ),
	'icon'       => 'fa fa-angle-double-up',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'top-header-section-start',
			'type'     => 'section',
			'subtitle' => 'The top header is the bar situated right above the header section. It usually contains information and functional blocks such as contact information, navigation, social icons, etc.',
			'indent'   => true
		),
		array(
			'id'       => 'show-top-header',
			'type'     => 'switch',
			'title'    => esc_html__( 'Top header bar', THEME_NAME ),
			'subtitle' => esc_html__( 'This options allows you to reveal or hide the top bar', THEME_NAME ),
			'default'  => true
		),
		array(
			'id'       => 'hide-top-bar-tablets',
			'type'     => 'switch',
			'title'    => esc_html__( 'Hide top bar on tablets', THEME_NAME ),
			'subtitle' => esc_html__( 'This options allows you to hide the top bar on tablet devices.', THEME_NAME ),
			'default'  => true,
			'required' => array(
				'show-top-header',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'hide-top-bar-mobiles',
			'type'     => 'switch',
			'title'    => esc_html__( 'Hide top bar on mobiles', THEME_NAME ),
			'subtitle' => esc_html__( 'This options allows you to hide the top bar on tablet devices.', THEME_NAME ),
			'default'  => true,
			'required' => array(
				'show-top-header',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'top-header-size',
			'type'     => 'dimensions',
			'units'    => array(
				'px'
			),
			'width'    => false,
			'title'    => esc_html__( 'Top header height', THEME_NAME ),
			'subtitle' => esc_html__( 'This enables you to set the height in pixels of the top bar. The default value for it is 34px', THEME_NAME ),
			'compiler' => true,
			'default'  => array(
				'height' => '40px',
				'units'  => 'px'
			),
			'required' => array(
				'show-top-header',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'language-switch',
			'type'     => 'switch',
			'title'    => esc_html__( 'Language switch', THEME_NAME ),
			'subtitle' => esc_html__( 'This option reveals or hides the language switcher menu. This menu will only work if you have previously installed the WPML plugin.', THEME_NAME ),
			'default'  => false,
			'required' => array(
				'show-top-header',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'language-switch-position',
			'type'     => 'select',
			'title'    => esc_html__( 'Language Switcher Position', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'options'  => array(
				'left'  => 'Left',
				'right' => 'Right'
			),
			'default'  => 'left',
			'required' => array(
				'language-switch',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'top-header-bg-color',
			'type'     => 'color',
			'title'    => esc_html__( 'Header Top Background Color', THEME_NAME ),
			'subtitle' => esc_html__( 'This option allows you to set the background color of the top bar.', THEME_NAME ),
			'compiler' => array(
				'background-color' => '#top-bar.navbar, #top-bar .dropdown-menu'
			),
			'default'  => '#2e3841',
			'validate' => 'color',
			'required' => array(
				'show-top-header',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'top-header-border-color',
			'type'     => 'color',
			'title'    => esc_html__( 'Header Bar divider color', THEME_NAME ),
			'subtitle' => esc_html__( 'This option enables you to set the dividers’ color from the top bar.', THEME_NAME ),
			'compiler' => array(
				'border-color' => '#top-bar, #top-bar .navbar-default .navbar-collapse, #top-bar .navbar-nav, .top-actual-menu .dropdown-menu, .top-actual-menu .dropdown-menu > li > a, #top-bar .pull-right .nav:last-child'
			),
			'default'  => 'transparent',
			'validate' => 'color',
			'required' => array(
				'show-top-header',
				'equals',
				'1'
			)
		),
		array(
			'id'          => 'top-menu-font-family',
			'type'        => 'typography',
			'title'       => esc_html__( 'Choose font', THEME_NAME ),
			'subtitle'    => esc_html__( 'Here you can set the font, size and color of the elements in the top bar.', THEME_NAME ),
			'compiler'    => array(
				'.navbar, #top-bar .nav > li > a, #top-bar .nav > li > span'
			),
			'line-height' => false,
			'text-align'  => false,
			'subsets'     => false,
			'google'      => true,
			'default'     => array(
				'color'       => '#a1b1bc',
				'font-size'   => '14px',
				'font-weight' => '400',
				'font-family' => 'Lato',
				'google'      => true
			),
			'required'    => array(
				'show-top-header',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'top-header-link-color',
			'type'     => 'color',
			'title'    => esc_html__( 'Link hover color', THEME_NAME ),
			'subtitle' => esc_html__( 'This option allows you to set the link color for hover effects.', THEME_NAME ),
			'compiler' => array(
				'#top-bar .navbar-nav > li > a:hover, #top-bar .navbar-nav > li > a:focus'
			),
			'default'  => '#ffffff',
			'validate' => 'color',
			'required' => array(
				'show-top-header',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'top-header-left-cont',
			'type'     => 'select',
			'title'    => esc_html__( 'Header Top Left Content', THEME_NAME ),
			'subtitle' => esc_html__( 'Here you can set what you want to appear in the left side of the top bar. Usually it contains contact information, social icons, etc.', THEME_NAME ),
			'options'  => array(
				'contact-info'   => 'Contact info',
				'social-icons'   => 'Social icons',
				'navigation'     => 'Navigation',
				'custom-content' => 'Custom content',
				'leave-empty'    => 'Leave empty'
			),
			'default'  => 'contact-info',
			'required' => array(
				'show-top-header',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'top-header-right-cont',
			'type'     => 'select',
			'title'    => esc_html__( 'Header Top Right Content', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'Here you can set what you want to appear in the right side of the top bar. Usually it contains contact information, social icons, etc.', THEME_NAME ),
			'options'  => array(
				'contact-info'   => 'Contact info',
				'social-icons'   => 'Social icons',
				'navigation'     => 'Navigation',
				'custom-content' => 'Custom content',
				'leave-empty'    => 'Leave empty'
			),
			'default'  => 'social-icons',
			'required' => array(
				'show-top-header',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'top-header-custom-content',
			'type'     => 'editor',
			'title'    => esc_html__( 'Custom content', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'If you have selected the Custom Content option from the Header top left/right content, we advise you to place the custom content here.', THEME_NAME ),
			'args'     => array(
				'textarea_rows' => 5
			),
			'default'  => '',
			'required' => array(
				'show-top-header',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'socials-icons-color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Social media icons color', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'This option allows you to set the color for the social media icons, as well as the color when hovering.', THEME_NAME ),
			'visited'  => false,
			'active'   => false,
			'default'  => array(
				'regular' => '#b2b2b2',
				'hover'   => '#f7c51e'
			),
			'compiler' => array( '#top-bar .nav.social-btns > li > a' ),
			'required' => array(
				'show-top-header',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'telephone',
			'type'     => 'text',
			'title'    => esc_html__( 'Header Phone Number', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'subtitle' => esc_html__( 'If you have selected the Contact info option from the Header top left/right content, we advise you to fill up the phone number so it will be displayed on the website. In case you do not wish to make your phone number public, please leave this section un filled.', THEME_NAME ),
			'required' => array(
				'show-top-header',
				'equals',
				'1'
			),
			'default'  => '020 1234 5678'
		),
		array(
			'id'       => 'email',
			'type'     => 'text',
			'title'    => esc_html__( 'Header Email Address', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'subtitle' => esc_html__( 'If you have selected the Contact info option from the Header top left/right content, we advise you to fill up the e-mail address so it will be displayed on the website. In case you do not wish to make your e-mail address public, please leave this section un filled.', THEME_NAME ),
			'required' => array(
				'show-top-header',
				'equals',
				'1'
			),
			'default'  => 'john.doe@example.com'
		),
		array(
			'id'     => 'top-header-section-end',
			'type'   => 'section',
			'indent' => false
		)
	)
) );
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Sticky header', THEME_NAME ),
	'subtitle'   => esc_html__( '', THEME_NAME ),
	'icon'       => 'fa fa-cloud',
	'subsection' => true,
	'fields'     => array(
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
			'title'          => esc_html__( 'Select Sticky Menu Font attributes', THEME_NAME ),
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
				'line-height'    => '80px',
				'text-transform' => 'uppercase'
			),
			'required'       => array(
				'sticky-header',
				'equals',
				'1'
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
			),
			'required'       => array(
				'sticky-header',
				'equals',
				'1'
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
			'mode'     => 'background-color',
			'required' => array(
				'sticky-header',
				'equals',
				'1'
			)
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
			'compiler' => true,
			'required' => array(
				'sticky-header',
				'equals',
				'1'
			)
		),
			array(
					'id'       => 'sticky-header-full-width',
					'type'     => 'switch',
					'title'    => esc_html__( 'Enable Sticky Header Full Width', THEME_NAME ),
					'subtitle' => esc_html__( 'This option enables the website’s sticky menu to be full width.', THEME_NAME ),
					'default'  => true,
					'compiler' => true,
					'required' => array(
							'sticky-header',
							'equals',
							'1'
					)
			),
	)
) );
?>