<?php
//SOCIAL MEDIA
global $allowed_html;
Redux::setSection( $opt_name, array(
	'title'    => esc_html__( 'Social', THEME_NAME ),
	'subtitle' => esc_html__( '', THEME_NAME ),
	'icon'     => 'fa fa-share-alt',
	'fields'   => array(
		array(
			'id'       => 'social-media-section-start',
			'type'     => 'section',
			'subtitle' => esc_html__( 'This is where you can select how the social media pages of your business will be displayed. One you have inserted the page link, they will be displayed in the top bar section or the copyright bar section.', THEME_NAME ),
			'indent'   => true
		),
		array(
			'id'       => 'open-social-icons-window',
			'type'     => 'switch',
			'title'    => esc_html__( 'Open Social Icons in a New Window', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( 'When this option is turned ON, it will open all the social media pages you have in a new window of the browser.', THEME_NAME ),
			'default'  => true
		),
		array(
			'id'       => 'fa-facebook',
			'type'     => 'text',
			'title'    => esc_html__( 'Facebook', THEME_NAME ),
			'default'  => '#',
			'subtitle' => esc_html__( 'Please enter in your Facebook URL', THEME_NAME )
		),
		array(
			'id'       => 'fa-flickr',
			'type'     => 'text',
			'title'    => esc_html__( 'Flickr', THEME_NAME ),
			'subtitle' => esc_html__( 'Please enter in your Flickr URL', THEME_NAME ),
			'default'  => ''
		),
		array(
			'id'       => 'fa-rss',
			'type'     => 'text',
			'title'    => esc_html__( 'RSS', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'subtitle' => esc_html__( 'Please enter in your RSS URL', THEME_NAME ),
			'default'  => ''
		),
		array(
			'id'       => 'fa-twitter',
			'type'     => 'text',
			'title'    => esc_html__( 'Twitter', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'default'  => '',
			'subtitle' => esc_html__( 'Please enter in your Twitter URL', THEME_NAME ),
			'default'  => ''
		),
		array(
			'id'       => 'fa-vimeo',
			'type'     => 'text',
			'title'    => esc_html__( 'Vimeo', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'subtitle' => esc_html__( 'Please enter in your Vimeo URL ', THEME_NAME ),
			'default'  => '#',
		),
		array(
			'id'       => 'fa-youtube',
			'type'     => 'text',
			'title'    => esc_html__( 'Youtube', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'default'  => '#',
			'subtitle' => esc_html__( 'Please enter in your Youtube URL ', THEME_NAME )
		),
		array(
			'id'       => 'fa-instagram',
			'type'     => 'text',
			'title'    => esc_html__( 'Instagram', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'subtitle' => esc_html__( 'Please enter in your Instagram URL ', THEME_NAME ),
			'default'  => ''
		),
		array(
			'id'       => 'fa-pinterest',
			'type'     => 'text',
			'title'    => esc_html__( 'Pinterest', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'subtitle' => esc_html__( 'Please enter in your Pinterest URL ', THEME_NAME ),
			'default'  => ''
		),
		array(
			'id'       => 'fa-tumblr',
			'type'     => 'text',
			'title'    => esc_html__( 'Tumblr', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'subtitle' => esc_html__( 'Please enter in your Tumblr URL ', THEME_NAME ),
			'default'  => ''
		),
		array(
			'id'       => 'fa-google-plus',
			'type'     => 'text',
			'title'    => esc_html__( 'Google+', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'default'  => '#',
			'subtitle' => esc_html__( 'Please enter in your Google+ URL ', THEME_NAME )
		),
		array(
			'id'       => 'fa-dribbble',
			'type'     => 'text',
			'title'    => esc_html__( 'Dribbble', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'subtitle' => esc_html__( 'Please enter in your Dribbble URL ', THEME_NAME ),
			'default'  => ''
		),
		array(
			'id'       => 'fa-digg',
			'type'     => 'text',
			'title'    => esc_html__( 'Digg', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'subtitle' => esc_html__( 'Please enter in your Digg URL ', THEME_NAME ),
			'default'  => ''
		),
		array(
			'id'       => 'fa-linkedin',
			'type'     => 'text',
			'title'    => esc_html__( 'LinkedIn', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'subtitle' => esc_html__( 'Please enter in your LinkedIn URL ', THEME_NAME ),
			'default'  => ''
		),
		array(
			'id'       => 'fa-skype',
			'type'     => 'text',
			'title'    => esc_html__( 'Skype', THEME_NAME ),
			'default'  => 'skype:your.id',
			'subtitle' => esc_html__( 'In order to add skype on your website, enter “skype:” followed by your Skype id. eg: skype:your.id', THEME_NAME )
		),
		array(
			'id'       => 'myspace-social',
			'type'     => 'text',
			'title'    => esc_html__( 'Myspace', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'subtitle' => esc_html__( 'Please enter in your Myspace URL ', THEME_NAME ),
			'default'  => ''
		),
		array(
			'id'       => 'fa-deviantart',
			'type'     => 'text',
			'title'    => esc_html__( 'Deviantart', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'subtitle' => esc_html__( 'Please enter in your Deviantart URL ', THEME_NAME ),
			'default'  => ''
		),
		array(
			'id'       => 'fa-yahoo',
			'type'     => 'text',
			'title'    => esc_html__( 'Yahoo', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'subtitle' => esc_html__( 'Please enter in your Yahoo URL ', THEME_NAME ),
			'default'  => ''
		),
		array(
			'id'       => 'fa-reddit',
			'type'     => 'text',
			'title'    => esc_html__( 'Reddit', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'subtitle' => esc_html__( 'Please enter in your Reddit URL ', THEME_NAME ),
			'default'  => ''
		),
		array(
			'id'       => 'fa-paypal',
			'type'     => 'text',
			'title'    => esc_html__( 'Paypal', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'subtitle' => esc_html__( 'Please enter in your Paypal URL ', THEME_NAME ),
			'default'  => ''
		),
		array(
			'id'       => 'fa-dropbox',
			'type'     => 'text',
			'title'    => esc_html__( 'Dropbox', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'subtitle' => esc_html__( 'Please enter in your Dropbox URL ', THEME_NAME ),
			'default'  => ''
		),
		array(
			'id'       => 'soundclound-social',
			'type'     => 'text',
			'title'    => esc_html__( 'Soundcloud', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'subtitle' => esc_html__( 'Please enter in your Soundcloud URL ', THEME_NAME ),
			'default'  => ''
		),
		array(
			'id'       => 'fa-envelope-o',
			'type'     => 'text',
			'title'    => esc_html__( 'Email address', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'default'  => 'mailto:you@yourwebsite.com',
			'subtitle' => esc_html__( 'Please enter “mailto:” followed by your email address. eg. mailto:contact@yourwebsite.com 
				This way it will open the default mail from your computer when you click on the link.', THEME_NAME )
		),
		array(
			'id'     => 'social-media-section-end',
			'type'   => 'section',
			'indent' => false
		),
	)
) );
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Social Sharing', THEME_NAME ),
	'subtitle'   => esc_html__( '', THEME_NAME ),
	'icon'       => 'fa fa-cloud-download',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'enable-share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable share', THEME_NAME ),
			'subtitle' => esc_html__( '', THEME_NAME ),
			'subtitle' => esc_html__( ' ', THEME_NAME ),
			'default'  => false
		),
		array(
			'id'       => 'addthis-id',
			'type'     => 'text',
			'subtitle' => wp_kses(__( 'You can find a list of your profile IDs at <a href="http://www.addthis.com/settings/publisher">here</a>', THEME_NAME ),$allowed_html),
			'title'    => esc_html__( 'Add This user id', THEME_NAME ),
			'required' => array(
				'enable-share',
				'equals',
				'1'
			),
			'default'  => ''
		),
		array(
			'id'       => 'addthis-html',
			'type'     => 'ace_editor',
			'title'    => esc_html__( 'Add This mark-up', THEME_NAME ),
			'subtitle' => esc_html__( 'Paste the html received in step 2.', THEME_NAME ),
			'mode'     => 'html',
			'theme'    => 'chrome',
			'required' => array(
				'enable-share',
				'equals',
				'1'
			),
			'default'  => '<!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_sharing_toolbox"></div>'
		)
	)
) );
?>