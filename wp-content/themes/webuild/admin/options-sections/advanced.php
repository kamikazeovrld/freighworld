<?php
//ADVANCED
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Advanced', THEME_NAME ),
	'desc'   => esc_html__( '', THEME_NAME ),
	'icon'   => 'el-icon-cogs',
	'fields' => array(
		array(
			'id'       => 'allow-comments',
			'type'     => 'switch',
			'title'    => esc_html__( 'Allow Comments/Reviews', THEME_NAME ),
			'subtitle' => esc_html__( 'This option will allow you to enable or disable the comments or reviews option on the products page.', THEME_NAME ),
			'default'  => true
		),
	)
) );
?>