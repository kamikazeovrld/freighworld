<?php
//GENERAL
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'General', THEME_NAME ),
	'desc'   => esc_html__( '', THEME_NAME ),
	'icon'   => 'fa fa-cog',
	'fields' => array(
		array(
			'id'       => 'general-section-start',
			'type'     => 'section',
			'subtitle' => esc_html__( 'The following options enable you to import demo contents, add tracking codes to your website and choose from various responsiveness options.', THEME_NAME ),
			'indent'   => true
		),
		array(
			'id'       => 'space-before-head',
			'type'     => 'ace_editor',
			'title'    => esc_html__( 'Space before closing head tag', THEME_NAME ),
			'subtitle' => esc_html__( 'Add in a code line before </head>', THEME_NAME ),
			'mode'     => 'plain_text',
			'theme'    => 'monokai',
			'default'  => ''
		),
		array(
			'id'       => 'space-before-body',
			'type'     => 'ace_editor',
			'title'    => esc_html__( 'Space before closing body tag', THEME_NAME ),
			'subtitle' => esc_html__( 'Add in a code line before  </body>', THEME_NAME ),
			'mode'     => 'plain_text',
			'theme'    => 'monokai',
			'default'  => ''
		),
	),
	array(
		'id'     => 'general-section-end',
		'type'   => 'section',
		'indent' => false,
	),
) );
//GENERAL >> IMPORT / EXPORT
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Import Export', THEME_NAME ),
	'desc'       => esc_html__( 'Import and Export your theme settings from file, text or URL.', THEME_NAME ),
	'icon'       => 'fa fa-cloud-download',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'         => 'opt-import-export',
			'type'       => 'import_export',
			'title'      => 'Import Export',
			'subtitle'   => 'Save and restore your theme options',
			'full_width' => false
		)
	)
) );
?>