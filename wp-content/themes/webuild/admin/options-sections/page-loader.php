<?php
//BLOG
Redux::setSection( $opt_name, array(
	'title'  => 'Page Loader',
	'icon'   => 'fa fa-dot-circle-o',
	'fields' => array(
		array(
			'id'       => 'page-loader-section-start',
			'type'     => 'section',
			'subtitle' => esc_html__( 'If the website loader is on, it will show a loading page and the whole website will be loading in the background. When all the elements of the page are loaded, the loader dissappears and the website will be shown.<br>In this area you can set the website loader on either ON or OFF and customize it to your needs.', THEME_NAME ),
			'indent'   => true
		),
		array(
			'id'       => 'loader',
			'type'     => 'switch',
			'title'    => esc_html__( 'Use Page-Loader?', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'If you want to use a pre-loader for the pages select On.', THEME_NAME ),
			'default'  => false
		),
		array(
			'id'            => 'load-bg',
			'type'          => 'background',
			'title'         => esc_html__( 'Loader background', THEME_NAME ),
			'subtitle'      => esc_html__( 'Here you can set the loader’s background color or you can upload an image.', THEME_NAME ),
			'preview_media' => true,
			'preview'       => false,
			'default'       => array(
				'background-color' => '#1a1c27',
			),
			'required'      => array(
				'loader',
				'equals',
				'1'
			)
		),
		array(
			'id'            => 'loader-circle',
			'type'          => 'background',
			'title'         => esc_html__( 'Loader circle', THEME_NAME ),
			'subtitle'      => esc_html__( 'Here you can upload the logo you want to be shown during your website’s loading time. You can also set the background’s color behind the logo.', THEME_NAME ),
			'subtitle'      => esc_html__( '', THEME_NAME ),
			'preview_media' => true,
			'preview'       => false,
			'default'       => array(
				'background-color' => '#222533',
				'background-image' => '//webuild.netbee.co/demo-data/wp-content/uploads/2015/07/Logo-loader-we-build.png'
			),
			'required'      => array(
				'loader',
				'equals',
				'1'
			)
		),
		array(
			'id'       => 'loader-border',
			'type'     => 'color',
			'title'    => esc_html__( 'Loader border', THEME_NAME ),
			'default'  => '#f7c51e',
			'subtitle' => esc_html__( 'Here you can set the color of the animation element (Loading Line)', THEME_NAME ),
			'validate' => 'color',
			'required' => array(
				'loader',
				'equals',
				'1'
			),
			'compiler' => true
		),
	)
) );
?>