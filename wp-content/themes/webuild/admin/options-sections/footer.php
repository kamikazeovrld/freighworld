<?php
//FOOTER
Redux::setSection( $opt_name, array(
	'title'    => esc_html__( 'Footer', THEME_NAME ),
	'subtitle' => esc_html__( '', THEME_NAME ),
	'icon'     => 'fa fa-hand-o-down',
	'fields'   => array(
		array(
			'id'       => 'footer-section-start',
			'type'     => 'section',
			'subtitle' => 'This option will show the footer from the page',
			'indent'   => true
		),
		array(
			'id'       => 'show-footer',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show footer', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'This option will show the footer from the page', THEME_NAME ),
			'default'  => true
		),
		array(
			'id'       => 'footer-widgets',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Footer widgets', THEME_NAME ),
			'subtitle' => esc_html__( 'This allows you to select the number of widgets that you want included in the footer. To add the widgets, please go to Appearance - > Widgets', THEME_NAME ),
			'options'  => array(
				'1'  => array(
					'alt' => '',
					'img' => FRAMEWORK_URI . '/config/widgets/model1.png'
				),
				'2'  => array(
					'alt' => '',
					'img' => FRAMEWORK_URI . '/config/widgets/model2.png'
				),
				'3'  => array(
					'alt' => '',
					'img' => FRAMEWORK_URI . '/config/widgets/model3.png'
				),
				'4'  => array(
					'alt' => '',
					'img' => FRAMEWORK_URI . '/config/widgets/model4.png'
				),
				'5'  => array(
					'alt' => '',
					'img' => FRAMEWORK_URI . '/config/widgets/model5.png'
				),
				'6'  => array(
					'alt' => '',
					'img' => FRAMEWORK_URI . '/config/widgets/model6.png'
				),
				'7'  => array(
					'alt' => '',
					'img' => FRAMEWORK_URI . '/config/widgets/model7.png'
				),
				'8'  => array(
					'alt' => '',
					'img' => FRAMEWORK_URI . '/config/widgets/model8.png'
				),
				'9'  => array(
					'alt' => '',
					'img' => FRAMEWORK_URI . '/config/widgets/model9.png'
				),
				'10' => array(
					'alt' => '',
					'img' => FRAMEWORK_URI . '/config/widgets/model10.png'
				)
			),
			'default'  => 4,
			'required' => array(
				'show-footer',
				'equals',
				'1'
			)
		),
		array(
			'id'                    => 'background-image-footer-area',
			'type'                  => 'background',
			'title'                 => esc_html__( 'Background Image', THEME_NAME ),
			'subtitle'              => esc_html__( 'This option enables you to change the background color in the footer or add an image.', THEME_NAME ),
			'subtitle'              => esc_html__( '', THEME_NAME ),
			'preview_media'         => true,
			'background-attachment' => false,
			'preview'               => false,
			'default'               => array(
				'background-color'    => '#222533',
				'background-repeat'   => 'repeat',
				'background-position' => 'center center'
			),
			'compiler'              => true,
			'required'              => array(
				'show-footer',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'footer-background-parallax',
			'type'     => 'switch',
			'title'    => esc_html__( 'Parallax', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'This option allows you to add a parallax effect for the image in the footer', THEME_NAME ),
			'default'  => true,
			'required' => array(
				'show-footer',
				'equals',
				'1'
			)
		),
		array(
			'id'            => 'footer-padding',
			'type'          => 'spacing',
			'title'         => esc_html__( 'Footer Padding', THEME_NAME ),
			'subtitle'      => esc_html__( '', THEME_NAME ),
			'subtitle'      => esc_html__( 'This option allows you to set the distance before and after the footer. The default value is 60px', THEME_NAME ),
			'units'         => 'px',
			'display_units' => false,
			'left'          => false,
			'right'         => false,
			'compiler'      => array(
				'footer .widgets'
			),
			'default'       => array(
				'padding-top'    => '90px',
				'padding-bottom' => '70px',
				'units'          => 'px'
			),
			'required'      => array(
				'show-footer',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'footer-fixed-effect',
			'type'     => 'switch',
			'title'    => esc_html__( 'Add footer fixed effect', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'You can add up a fixed footer effect from here. For this effect to work, the footer should be ON and the footer form should be OFF.', THEME_NAME ),
			'default'  => false,
			'required' => array(
				'show-footer',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'select-footer-font-family',
			'type'     => 'typography',
			'title'    => esc_html__( 'Select Footer Headings Font attributes', THEME_NAME ),
			'subtitle' => esc_html__( 'This option allows you to format the Headings in the footer widgets.', THEME_NAME ),
			'google'   => true,
			'default'  => array(
				'color'          => '#ffffff',
				'font-size'      => '22px',
				'font-family'    => 'Lato',
				'font-weight'    => '100',
				'subsets'        => 'latin',
				'line-height'    => '30px',
				'text-transform' => 'uppercase',
				'text-align'     => 'center'
			),
			'compiler' => array(
				'.footer-form h2'
			),
			'required' => array(
				'show-footer',
				'equals',
				'1'
			)
		),
		array(
			'id'     => 'footer-section-end',
			'type'   => 'section',
			'indent' => false,
		),
	)
) );
//FOOTER >> Footer form
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Footer form', THEME_NAME ),
	'subtitle'   => esc_html__( ' ', THEME_NAME ),
	'icon'       => 'fa fa-file-text-o',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'     => 'footer-form-section-start',
			'type'   => 'section',
			'indent' => true
		),
		array(
			'id'       => 'show-footer-form',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Footer Contact Form?', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'This option will show the contact form before the footer.', THEME_NAME ),
			'default'  => false
		),
		array(
			'id'       => 'footer-form-shortcode',
			'type'     => 'text',
			'title'    => esc_html__( 'Footer Contact Form Shortcode', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'To use this option, please select the shortcode from “Contact form 7”.', THEME_NAME ),
			'required' => array(
				'show-footer-form',
				'equals',
				'1'
			),
			'default'  => '[contact-form-7 id="1352" title="Contact form Footer"]'
		),
		array(
			'id'       => 'before-footer-form',
			'type'     => 'editor',
			'title'    => esc_html__( 'Before form', THEME_NAME ),
			'subtitle' => esc_html__( 'This is the top section of the contact form: Eg: “Let’s Talk!”', THEME_NAME ),
			'default'  => '<h1 style="text-align: center; color: #fff; font-weight: 900;">LETS TALK</h1><h3 style="text-align: center; margin-bottom: 35px;"><span style="color: #fff; font-weight: 300; letter-spacing: 4px; font-size: 16px; line-height: 54px;">TELL US ABOUT YOUR PROJECT IDEAS OR JUST SAY HELLO.</span></h3>',
			'args'     => array(
				'teeny'         => false,
				'textarea_rows' => 10
			)
		),
		array(
			'id'       => 'show-footer-contact-details',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display footer contact details', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'From here, you can show/hide the contact details form the footer form.', THEME_NAME ),
			'default'  => true
		),
		array(
			'id'          => 'contact-details',
			'type'        => 'slides',
			'title'       => esc_html__( 'Contact details', THEME_NAME ),
			'subtitle'    => esc_html__( 'This allows you to add up to 6 informational columns.', THEME_NAME ),
			'placeholder' => array(
				'title'           => esc_html__( 'This is a title', THEME_NAME ),
				'subtitleription' => esc_html__( 'subtitleription Here', THEME_NAME ),
				'url'             => esc_html__( 'Give us a link!', THEME_NAME )
			),
			'required'    => array(
				'show-footer-contact-details',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'contact-details-color',
			'type'     => 'color',
			'title'    => esc_html__( 'Contact Details Color', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'default'  => '#ffffff',
			'validate' => 'color',
			'compiler' => array(
				'.footer-form .footer-contact-details .widget *'
			)
		),
		array(
			'id'            => 'footer-form-padding',
			'type'          => 'spacing',
			'title'         => esc_html__( 'Footer Padding', THEME_NAME ),
			'subtitle'      => esc_html__( 'This option enables you to set the distance before and after the footer. The default value is 100px', THEME_NAME ),
			'units'         => 'px',
			'display_units' => false,
			'left'          => false,
			'right'         => false,
			'compiler'      => array(
				'.top-footer'
			),
			'default'       => array(
				'padding-top'    => '100px',
				'padding-bottom' => '80px',
				'units'          => 'px'
			)
		),
		array(
			'id'                    => 'background-image-form-area',
			'type'                  => 'background',
			'title'                 => esc_html__( 'Background Image', THEME_NAME ),
			'subtitle'              => esc_html__( 'This option allows you to change the background color in the footer or add an image.', THEME_NAME ),
			'subtitle'              => esc_html__( '', THEME_NAME ),
			'preview_media'         => true,
			'background-attachment' => false,
			'preview'               => false,
			'default'               => array(
				'background-color'    => '#000000',
				'background-repeat'   => 'no-repeat',
				'background-position' => 'center center',
				'background-image'    => '//webuild.netbee.co/demo-data/wp-content/uploads/2015/07/footer-form-we-build.jpg'
			),
			'compiler'              => true
		),
		array(
			'id'       => 'footer-form-background-parallax',
			'type'     => 'switch',
			'title'    => esc_html__( 'Parallax', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'This option allows you to add a parallax effect for the image in the footer form.', THEME_NAME ),
			'default'  => true
		),
		array(
			'id'     => 'footer-form-section-end',
			'type'   => 'section',
			'indent' => false,
		),
	)
) );
//FOOTER >> Copyright Bar
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Copyright Bar', THEME_NAME ),
	'subtitle'   => esc_html__( ' ', THEME_NAME ),
	'icon'       => 'fa fa-copyright',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'     => 'copyright-section-start',
			'type'   => 'section',
			'indent' => true
		),
		array(
			'id'       => 'copyright-bar',
			'type'     => 'switch',
			'title'    => esc_html__( 'Copyright Bar', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'subtitle' => esc_html__( 'This option will show/hide the Copyright bar.', THEME_NAME ),
			'default'  => true
		),
		array(
			'id'       => 'copyright-text',
			'type'     => 'editor',
			'title'    => esc_html__( 'Copyright text', THEME_NAME ),
			'subtitle' => esc_html__( 'Write your copyright information or anything you would like.', THEME_NAME ),
			'default'  => 'Copyright © 2015 We Build. Theme designed with <i class="fa fa-heart-o" style="color: #e74c3c;"></i> by <a href="http://www.proadvertise.co.uk" target="_blank">PRO Advertise</a>',
			'required' => array(
				'copyright-bar',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'footer-right-content',
			'type'     => 'select',
			'title'    => esc_html__( 'Footer Right Content', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'This option enables you to select the content from the right side of the Copyright bar.', THEME_NAME ),
			'options'  => array(
				'contact-info'   => 'Contact info',
				'navigation'     => 'Navigation',
				'custom-content' => 'Custom content',
				'social-icons'   => 'Social icons',
				'leave-empty'    => 'Leave empty'
			),
			'default'  => 'social-icons',
			'required' => array(
				'copyright-bar',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'copyright-custom-content',
			'type'     => 'editor',
			'title'    => esc_html__( 'Custom content', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'In case you have the selected “Custom content” in the “Footer Right Content”, you can introduce your content here', THEME_NAME ),
			'args'     => array(
				'textarea_rows' => 5
			),
			'default'  => '',
			'required' => array(
				'copyright-bar',
				'equals',
				'1'
			)
		),
		array(
			'id'          => 'footer-socials-style',
			'type'        => 'typography',
			'title'       => esc_html__( 'Footer socials', THEME_NAME ),
			'subtitle'    => esc_html__( 'From here you can alter the size in px of the social icons in the Copyright bar.', THEME_NAME ),
			'google'      => true,
			'subsets'     => false,
			'font-family' => false,
			'font-weight' => false,
			'font-style'  => false,
			'line-height' => false,
			'text-align'  => false,
			'color'       => false,
			'default'     => array(
				'font-size' => '18px'
			),
			'compiler'    => array(
				'footer ul.footer-socials li a'
			),
			'required'    => array(
				'footer-right-content',
				'equals',
				'social-icons'
			),
			'required'    => array(
				'copyright-bar',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'footer-socials-color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Footer Social Icons Custom Color', THEME_NAME ),
			'subtitle' => esc_html__( 'From here you can choose the color of the social icons in the Copyright bar, as well as their hovering color.', THEME_NAME ),
			'default'  => array(
				'regular' => '#48555e',
				'hover'   => '#fecb16'
			),
			'visited'  => false,
			'active'   => false,
			'compiler' => array(
				'footer ul.footer-socials li a'
			),
			'required' => array(
				'footer-right-content',
				'equals',
				'social-icons'
			),
			'required' => array(
				'copyright-bar',
				'equals',
				'1'
			)
		),
		array(
			'id'            => 'copyright-padding',
			'type'          => 'spacing',
			'title'         => esc_html__( 'Copyright Padding', THEME_NAME ),
			'subtitle'      => esc_html__( '', THEME_NAME ),
			'subtitle'      => esc_html__( 'This option allows you to set the padding for the Copyright bar. The default value is 10px.', THEME_NAME ),
			'units'         => 'px',
			'display_units' => false,
			'left'          => false,
			'right'         => false,
			'compiler'      => array(
				'.bott-footer'
			),
			'default'       => array(
				'padding-top'    => '30px',
				'padding-bottom' => '30px',
				'units'          => 'px'
			),
			'required'      => array(
				'copyright-bar',
				'equals',
				'1'
			),
			'required'      => array(
				'copyright-bar',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'copyright-bg-color',
			'type'     => 'color',
			'title'    => esc_html__( 'Copyright Background Color', THEME_NAME ),
			'subtitle' => esc_html__( 'This enables you to select the background color of the Copyright bar, as well as set the transparency levels.', THEME_NAME ),
			'default'  => '#1a1c27',
			'validate' => 'color',
			'compiler' => array(
				'background-color' => '.copyright'
			),
			'required' => array(
				'copyright-bar',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'copyright-border-color',
			'type'     => 'color',
			'title'    => esc_html__( 'Copyright Border Color', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'This option allows you to select the color for the top border of the Copyright bar or set it’s transparency levels if you want it hidden.', THEME_NAME ),
			'default'  => '#292d3e',
			'compiler' => array(
				'border-color' => 'footer .bott-footer'
			),
			'required' => array(
				'copyright-bar',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'copyright-font-atributes',
			'type'     => 'typography',
			'title'    => esc_html__( 'Copyright Font attributes', THEME_NAME ),
			'subtitle' => esc_html__( 'This option enables you to format the text within the Copyright bar.', THEME_NAME ),
			'google'   => true,
			'default'  => array(
				'font-size'   => '13px',
				'line-height' => '40px',
				'font-family' => 'Lato',
				'font-weight' => '400',
				'color'       => '#48555e'
			),
			'compiler' => array(
				'.copyright .copyright-text, .copyright .copyright-text span, .copyright .copyright-text p, .copyright .copyright-text a, .copyright .footer-menu a'
			),
			'required' => array(
				'copyright-bar',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'copyright-font-atributes-a',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Copyright Link Font Color', THEME_NAME ),
			'subtitle' => esc_html__( 'This option enables you to set the color of the links within the Copyright bar, as well as the hover effect color.', THEME_NAME ),
			'active'   => false,
			'focus'    => false,
			'default'  => array(
				'regular' => '#69808e',
				'hover'   => '#fecb16'
			),
			'compiler' => array(
				'.copyright .footer-menu a, .copyright .copyright-text a'
			),
			'required' => array(
				'copyright-bar',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'enable-to-top-script',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable To Top Script', THEME_NAME ),
			'subtitle' => esc_html__( 'This option allows you to show or hide the “Back to top” button in the Copyright bar.', THEME_NAME ),
			'default'  => false,
			'required' => array(
				'copyright-bar',
				'equals',
				'1'
			)
		),
		array(
			'id'     => 'copyright-section-end',
			'type'   => 'section',
			'indent' => false,
		),
	)
) );
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Footer widgets', THEME_NAME ),
	'subtitle'   => esc_html__( ' ', THEME_NAME ),
	'subsection' => true,
	'icon'       => 'fa fa-th-large',
	'fields'     => array(
		array(
			'id'     => 'footer-widgets-section-start',
			'type'   => 'section',
			'indent' => true
		),
		array(
			'id'             => 'footer-widget-heading-atributes',
			'type'           => 'typography',
			'title'          => esc_html__( 'Footer Widget Heading attributes', THEME_NAME ),
			'subtitle'       => esc_html__( 'This option allows you to format the text in the heading of the footer widgets.', THEME_NAME ),
			'google'         => true,
			'text-transform' => true,
			'default'        => array(
				'color'          => '#ffffff',
				'font-size'      => '22px',
				'line-height'    => '20px',
				'font-family'    => 'Lato',
				'font-weight'    => '700',
				'text-transform' => 'uppercase'
			),
			'compiler'       => array(
				'footer .widget-title h4'
			)
		),
		array(
			'id'       => 'footer-widget-heading-border-color',
			'type'     => 'color',
			'title'    => esc_html__( 'Footer Widget Heading Line color', THEME_NAME ),
			'subtitle' => esc_html__( 'This option allows you to choose the line color for the heading from the footer widget, or make it transparent.', THEME_NAME ),
			'default'  => '#48555e',
			'validate' => 'color',
			'compiler' => true
		),
		array(
			'id'             => 'footer-widget-text-atributes',
			'type'           => 'typography',
			'title'          => esc_html__( 'Footer Widget Text attributes', THEME_NAME ),
			'subtitle'       => esc_html__( 'This option allows you to format the text in the content of the footer widgets.', THEME_NAME ),
			'google'         => true,
			'text-transform' => true,
			'default'        => array(
				'color'          => '#647886',
				'font-size'      => '13px',
				'line-height'    => '27px',
				'font-family'    => 'Lato',
				'font-weight'    => 'normal'
			),
			'compiler'       => array(
				'footer .webuild_widget .textwidget'
			)
		),
		array(
			'id'       => 'footer-widget-heading-border-height',
			'type'     => 'text',
			'title'    => esc_html__( 'Footer Widget Heading Line Height', THEME_NAME ),
			'subtitle' => esc_html__( 'From here you can set the height of the heading line of the footer widget. The default value is 1px.', THEME_NAME ),
			'validate' => 'number',
			'default'  => '2',
			'compiler' => true
		),
		array(
			'id'       => 'footer-widget-delimiter',
			'type'     => 'switch',
			'title'    => esc_html__( 'Widget delimiter', THEME_NAME ),
			'subtitle' => esc_html__( 'This option allows you to enable the element delimiters of the widgets.', THEME_NAME ),
			'default'  => true,
			'compiler' => true
		),
		array(
			'id'          => 'footer-widget-border-color',
			'type'        => 'color',
			'title'       => esc_html__( 'Color for the post delimiter', THEME_NAME ),
			'subtitle'    => esc_html__( 'This option allows you to set a color for the delimiter of the footer widget.', THEME_NAME ),
			'default'     => '#262837',
			'validate'    => 'color',
			'transparent' => false,
			'compiler'    => array(
				'border-color' => 'footer .webuild_widget ul li'
			),
			'required'    => array(
				'footer-widget-delimiter',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'footer-widgets-links',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Footer widgets linkss', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'This option allows you to change the link colors of the footer widgets.', THEME_NAME ),
			'active'   => false,
			'visited'  => false,
			'default'  => array(
				'regular' => '#b7cad7',
				'hover'   => '#fecb16'
			),
			'compiler' => array(
				'footer .webuild_widget ul li a'
			)
		),
		array(
			'id'     => 'footer-widgets-section-end',
			'type'   => 'section',
			'indent' => false
		),
	)
) );
?>