<?php
//TYPOGRAPHY
Redux::setSection( $opt_name, array(
	'title'    => esc_html__( 'Typography ', THEME_NAME ),
	'subtitle' => esc_html__( '', THEME_NAME ),
	'icon'     => 'fa fa-font',
	'fields'   => array(
		array(
			'id'       => 'typography-section-start',
			'type'     => 'section',
			'subtitle' => 'This option allows you to set typography settings for regular website fonts and headers (H1-H6 tags). Please take under consideration that any setting you do on this page will influence different elements on your website.',
			'indent'   => true
		),
		array(
			'id'           => 'select-body-font-family',
			'type'         => 'typography',
			'title'        => esc_html__( 'Body Font attributes', THEME_NAME ),
			'output'       => array(
				'body'
			),
			'force_output' => true,
			'subtitle'     => esc_html__( ' ', THEME_NAME ),
			'google'       => true,
			'all_styles'   => true,
			'default'      => array(
				'font-family' => 'Raleway',
				'color'       => '#647886',
				'font-size'   => '13px',
				'line-height' => '27px'
			)
		),
		array(
			'id'       => 'headings-fonts-switch',
			'type'     => 'switch',
			'title'    => esc_html__( 'Use Custom fonts for Headings?', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'Turn on to use custom fonts for the theme Headings.', THEME_NAME ),
			'default'  => false
		),
		array(
			'id'             => 'h1-font-atributes',
			'type'           => 'typography',
			'title'          => esc_html__( 'H1 Heading Font attributes', THEME_NAME ),
			'subtitle'       => esc_html__( ' ', THEME_NAME ),
			'google'         => true,
			'letter-spacing' => true,
			'force_output'   => true,
			'default'        => array(
				'color'       => '#2c3e50',
				'font-size'   => '34px',
				'font-weight' => '700',
				'font-family' => 'Lato',
				'line-height' => '42px'
			),
			'compiler'       => array(
				'h1'
			),
			'required'       => array(
				'headings-fonts-switch',
				'equals',
				'1'
			)
		),
		array(
			'id'             => 'h2-font-atributes',
			'type'           => 'typography',
			'title'          => esc_html__( 'H2 Heading Font attributes', THEME_NAME ),
			'subtitle'       => esc_html__( ' ', THEME_NAME ),
			'google'         => true,
			'letter-spacing' => true,
			'force_output'   => true,
			'default'        => array(
				'color'       => '#2c3e50',
				'font-size'   => '24px',
				'font-weight' => '700',
				'font-family' => 'Lato',
				'line-height' => '36px'
			),
			'compiler'       => array(
				'h2'
			),
			'required'       => array(
				'headings-fonts-switch',
				'equals',
				'1'
			)
		),
		array(
			'id'             => 'h3-font-atributes',
			'type'           => 'typography',
			'title'          => esc_html__( 'H3 Heading Font attributes', THEME_NAME ),
			'subtitle'       => esc_html__( ' ', THEME_NAME ),
			'google'         => true,
			'letter-spacing' => true,
			'force_output'   => true,
			'default'        => array(
				'color'       => '#2c3e50',
				'font-size'   => '20px',
				'font-family' => 'Lato',
				'font-weight' => '700',
				'line-height' => '24px'
			),
			'compiler'       => array(
				'h3'
			),
			'required'       => array(
				'headings-fonts-switch',
				'equals',
				'1'
			)
		),
		array(
			'id'             => 'h4-font-atributes',
			'type'           => 'typography',
			'title'          => esc_html__( 'H4 Heading Font attributes', THEME_NAME ),
			'subtitle'       => esc_html__( ' ', THEME_NAME ),
			'google'         => true,
			'letter-spacing' => true,
			'force_output'   => true,
			'default'        => array(
				'color'       => '#2c3e50',
				'font-size'   => '18px',
				'font-family' => 'Lato',
				'font-weight' => '700',
				'line-height' => '24px'
			),
			'compiler'       => array(
				'h4'
			),
			'required'       => array(
				'headings-fonts-switch',
				'equals',
				'1'
			)
		),
		array(
			'id'             => 'h5-font-atributes',
			'type'           => 'typography',
			'title'          => esc_html__( 'H5 Heading Font attributes', THEME_NAME ),
			'subtitle'       => esc_html__( ' ', THEME_NAME ),
			'google'         => true,
			'letter-spacing' => true,
			'force_output'   => true,
			'default'        => array(
				'color'       => '#2c3e50',
				'font-size'   => '16px',
				'font-family' => 'Lato',
				'font-weight' => '400',
				'line-height' => '24px'
			),
			'compiler'       => array(
				'h5'
			),
			'required'       => array(
				'headings-fonts-switch',
				'equals',
				'1'
			)
		),
		array(
			'id'             => 'h6-font-atributes',
			'type'           => 'typography',
			'title'          => esc_html__( 'H6 Heading Font attributes', THEME_NAME ),
			'subtitle'       => esc_html__( ' ', THEME_NAME ),
			'google'         => true,
			'letter-spacing' => true,
			'force_output'   => true,
			'default'        => array(
				'color'       => '#2c3e50',
				'font-size'   => '14px',
				'font-weight' => '300',
				'font-family' => 'Lato',
				'line-height' => '24px'
			),
			'compiler'       => array(
				'h6'
			),
			'required'       => array(
				'headings-fonts-switch',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'paragraph-fonts-switch',
			'type'     => 'switch',
			'title'    => esc_html__( 'Use Custom fonts for Paragraph?', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'Turn on to use custom fonts for the paragraph sections.', THEME_NAME ),
			'default'  => false
		),
		array(
			'id'             => 'p-font-atributes',
			'type'           => 'typography',
			'title'          => esc_html__( 'Paragraph Font attributes', THEME_NAME ),
			'subtitle'       => esc_html__( ' ', THEME_NAME ),
			'google'         => true,
			'letter-spacing' => true,
			'force_output'   => true,
			'default'        => array(
				'color'       => '#8b9ba6',
				'font-size'   => '14px',
				'font-weight' => '400',
				'font-family' => 'Lato',
				'line-height' => '27px'
			),
			'compiler'       => array(
				'p'
			),
			'required'       => array(
				'paragraph-fonts-switch',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'pagination-fonts-switch',
			'type'     => 'switch',
			'title'    => esc_html__( 'Use Custom fonts for Pagination?', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'Turn on to use custom fonts for the pagination.', THEME_NAME ),
			'default'  => false
		),
		array(
			'id'           => 'pagination-font-atributes',
			'type'         => 'typography',
			'title'        => esc_html__( 'Pagination Font attributes', THEME_NAME ),
			'subtitle'     => esc_html__( 'From here you can make changes to the font and various setting for the paginations used on blogs, portfolios, etc.', THEME_NAME ),
			'google'       => true,
			'force_output' => true,
			'default'      => array(
				'color'       => '#262626',
				'font-size'   => '12px',
				'font-weight' => '400',
				'font-family' => 'lato',
				'line-height' => '13px',
				'subsets'     => 'latin'
			),
			'compiler'     => array(
				'.ajax-load-more, .ajax-load-more:hover, .page-pagination a, .page-pagination span, .page-pagination a:hover, .page-pagination .current'
			),
			'required'     => array(
				'pagination-fonts-switch',
				'equals',
				'1'
			)
		),
		array(
			'id'     => 'typography-section-end',
			'type'   => 'section',
			'indent' => false,
		),
	)
) );
?>