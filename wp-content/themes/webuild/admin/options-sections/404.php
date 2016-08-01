<?php
//BLOG
Redux::setSection( $opt_name, array(
	'title'  => 'Page 404 options',
	'icon'   => 'fa fa-close',
	'fields' => array(
		array(
			'id'       => 'blog-section-start',
			'type'     => 'section',
			'subtitle' => esc_html__( 'From this section you can manage the 404 page', THEME_NAME ),
			'indent'   => true
		),
		array(
			'id'       => 'page-404-title',
			'type'     => 'text',
			'title'    => esc_html__( 'Page 404 Title', THEME_NAME ),
			'desc'     => esc_html__( '', THEME_NAME ),
			'validate' => 'number',
			'subtitle' => esc_html__( 'Insert the 404 page Title', THEME_NAME ),
			'default'  => '404',
		),
		array(
			'id'       => 'page-404-error-text',
			'type'     => 'editor',
			'title'    => esc_html__( 'Page 404 Error Text', THEME_NAME ),
			'desc'     => esc_html__( '', THEME_NAME ),
			'validate' => 'number',
			'subtitle' => esc_html__( 'Insert the Error text to show', THEME_NAME ),
			'default'  => 'NOT FOUND!',
		),
		array(
			'id'       => 'page-404-sub-text',
			'type'     => 'editor',
			'title'    => esc_html__( 'Page 404 Error Sub-Text', THEME_NAME ),
			'desc'     => esc_html__( '', THEME_NAME ),
			'validate' => 'number',
			'subtitle' => esc_html__( 'Insert the second Error text to show', THEME_NAME ),
			'default'  => 'It looks like nothing was found at this location. Maybe try a search?',
		),
		array(
			'id'       => 'page-404-image',
			'type'     => 'media',
			'title'    => esc_html__( 'Page 404 image', THEME_NAME ),
			'subtitle' => esc_html__( 'Upload a image to replace the title', THEME_NAME ),
			'default'  => '//webuild.netbee.co/demo-data/wp-content/uploads/2015/07/404_default.png',
		),
	)
) );
?>