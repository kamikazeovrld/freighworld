<?php
/**
 * Plugin Name: WeBuild Posts
 * Description: Custom posts type made by WeBuild Team.
 * Version: 1.0
 * Author: WeBuild
 * Author URI: http://proadvertise.co.uk
 */

// Metaboxes Functions
//include_once get_template_directory() . '/pro-framework/page-options/class-apro-metaboxes.php' ;
//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_topics_hierarchical_taxonomy', 0 );
//create a custom taxonomy name it topics for your posts
function create_topics_hierarchical_taxonomy() {
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
	$labels1 = array(
		'name'          => esc_html__( 'Groups', THEME_NAME ),
		'singular_name' => esc_html__( 'Group', THEME_NAME ),
		'all_items'     => esc_html__( 'All Groups', THEME_NAME ),
		'edit_item'     => esc_html__( 'Edit Group', THEME_NAME ),
		'update_item'   => esc_html__( 'Update Group', THEME_NAME ),
		'add_new_item'  => esc_html__( 'Add New Group', THEME_NAME ),
		'new_item_name' => esc_html__( 'New Group Name', THEME_NAME ),
		'menu_name'     => esc_html__( 'Staff Groups', THEME_NAME ),
	);
	$labels2 = array(
		'name'          => esc_html__( 'Staff Categories', THEME_NAME ),
		'singular_name' => esc_html__( 'Staff Category', THEME_NAME ),
		'all_items'     => esc_html__( 'All Categories', THEME_NAME ),
		'edit_item'     => esc_html__( 'Edit Category', THEME_NAME ),
		'update_item'   => esc_html__( 'Update Category', THEME_NAME ),
		'add_new_item'  => esc_html__( 'Add New Category', THEME_NAME ),
		'new_item_name' => esc_html__( 'New Category Name', THEME_NAME ),
		'menu_name'     => esc_html__( 'Staff Categories', THEME_NAME ),
	);
	$labels3 = array(
		'name'          => esc_html__( 'Testiomonials Categories', THEME_NAME ),
		'singular_name' => esc_html__( 'Testiomonials Category', THEME_NAME ),
		'all_items'     => esc_html__( 'All Testimonials Categories', THEME_NAME ),
		'edit_item'     => esc_html__( 'Edit Category', THEME_NAME ),
		'update_item'   => esc_html__( 'Update Category', THEME_NAME ),
		'add_new_item'  => esc_html__( 'Add New Category', THEME_NAME ),
		'new_item_name' => esc_html__( 'New Category Name', THEME_NAME ),
		'menu_name'     => esc_html__( 'Testimonials Categories', THEME_NAME ),
	);
	$labels4 = array(
		'name'          => esc_html__( 'Clients Categories', THEME_NAME ),
		'singular_name' => esc_html__( 'Clients Category', THEME_NAME ),
		'all_items'     => esc_html__( 'All Clients Categories', THEME_NAME ),
		'edit_item'     => esc_html__( 'Edit Category', THEME_NAME ),
		'update_item'   => esc_html__( 'Update Category', THEME_NAME ),
		'add_new_item'  => esc_html__( 'Add New Category', THEME_NAME ),
		'new_item_name' => esc_html__( 'New Category Name', THEME_NAME ),
		'menu_name'     => esc_html__( 'Clients Categories', THEME_NAME ),
	);
// Now register the taxonomy
	register_taxonomy( 'groups', array( 'pro_staff' ), array(
		'hierarchical'      => true,
		'labels'            => $labels1,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true
	) );
	register_taxonomy( 'staff-categories', array( 'pro_staff' ), array(
		'hierarchical'      => true,
		'labels'            => $labels2,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true
	) );
	register_taxonomy( 'testimonials-categories', array( 'pro_testimonials' ), array(
		'hierarchical'      => true,
		'labels'            => $labels3,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true
	) );
	register_taxonomy( 'clients-categories', array( 'pro_clients' ), array(
		'hierarchical'      => true,
		'labels'            => $labels4,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true
	) );
}


function create_staff() {
	register_post_type( 'pro_staff',
		array(
			'labels'        => array(
				'name'          => esc_html__( 'Staff members', THEME_NAME ),
				'singular_name' => esc_html__( 'Staff member', THEME_NAME )
			),
			'public'        => true,
			'menu_position' => 5,
			'taxonomies'    => array( 'groups', 'staff-categories' ),
			'rewrite'       => array( 'slug' => 'staff' ),
			'supports'      => array( 'title', 'thumbnail', 'editor' )
		)
	);
}

function create_clients() {
	register_post_type( 'pro_clients',
		array(
			'labels'        => array(
				"name"          => esc_html__( 'Clients', THEME_NAME ),
				"singular_name" => esc_html__( 'Client', THEME_NAME )
			),
			"public"        => true,
			'menu_position' => 5,
			'taxonomies'    => array( 'clients-categories' ),
			"rewrite"       => array( 'slug' => 'pro_clients' ),
			"supports"      => array( 'title', 'thumbnail' )
		)
	);
}

function webuild_create_testimonials() {
	register_post_type( 'pro_testimonials',
		array(
			'labels'        => array(
				"name"          => esc_html__( 'Testimonials', THEME_NAME ),
				"singular_name" => esc_html__( 'Testimonial', THEME_NAME )
			),
			"public"        => true,
			'menu_position' => 5,
			'taxonomies'    => array( 'testimonials-categories' ),
			"rewrite"       => array( 'slug' => 'pro_testimonials' ),
			"supports"      => array( 'title', 'thumbnail', 'editor' )
		)
	);
}

function custom_post_type_meta_filter( $metaboxes ) {
	$clients_fields   = array();
	$clients_fields[] = array(
		'title'    => esc_html__( 'Client', THEME_NAME ),
		'subtitle' => esc_html__( '', THEME_NAME ),
		'fields'   => array(
			array(
				'id'    => 'client_link',
				'type'  => 'text',
				'title' => esc_html__( 'Client Link', THEME_NAME )
			)
		)
	);

	$metaboxes[] = array(
		'id'         => 'webuild-client-meta',
		'title'      => esc_html__( 'Client info', THEME_NAME ),
		'post_types' => array(
			'pro_clients'
		),
		'position'   => 'normal', // normal, advanced, side
		'priority'   => 'high', // high, core, default, low
		'sidebar'    => false, // enable/disable the sidebar in the normal/advanced positions
		'sections'   => $clients_fields
	);


	$staff_fields   = array();
	$staff_fields[] = array(
		'title'    => esc_html__( 'Staff', THEME_NAME ),
		'subtitle' => esc_html__( '', THEME_NAME ),
		'fields'   => array(
			array(
				'id'          => 'staff_member_description',
				'type'        => 'textarea',
				'title'       => esc_html__( 'Staff Member Description ( this is the text that will show up in the auto generated section and in shortcodes )', THEME_NAME ),
				'placeholder' => 'Description here'
			),
			array(
				'id'          => 'staff_member_website_url',
				'type'        => 'text',
				'title'       => esc_html__( 'Staff Member website url ( use http:// )', THEME_NAME ),
				'placeholder' => ''
			),
			array(
				'id'          => 'staff_member_email_adress',
				'type'        => 'text',
				'title'       => esc_html__( 'Staff Member email adress', THEME_NAME ),
				'placeholder' => '',
				'validate'    => 'email',
			),
			array(
				'id'          => 'staff_member_facebook_link',
				'type'        => 'text',
				'title'       => esc_html__( 'Staff Member Facebook link', THEME_NAME ),
				'placeholder' => '',
			),
			array(
				'id'          => 'staff_member_twitter_link',
				'type'        => 'text',
				'title'       => esc_html__( 'Staff Member Twitter link', THEME_NAME ),
				'placeholder' => '',
			),
			array(
				'id'          => 'staff_member_linkedin_link',
				'type'        => 'text',
				'title'       => esc_html__( 'Staff Member Linkedin link', THEME_NAME ),
				'placeholder' => '',
			),
			array(
				'id'          => 'staff_member_skype_link',
				'type'        => 'text',
				'title'       => esc_html__( 'Staff Member Skype link', THEME_NAME ),
				'placeholder' => '',
			),
			array(
				'id'          => 'staff_member_blogger_link',
				'type'        => 'text',
				'title'       => esc_html__( 'Staff Member Blogger link', THEME_NAME ),
				'placeholder' => '',
			),
			array(
				'id'          => 'staff_member_vimeo_link',
				'type'        => 'text',
				'title'       => esc_html__( 'Staff Member Vimeo link', THEME_NAME ),
				'placeholder' => '',
			),
			array(
				'id'          => 'staff_member_youtube_link',
				'type'        => 'text',
				'title'       => esc_html__( 'Staff Member Youtube link', THEME_NAME ),
				'placeholder' => '',
			),
			array(
				'id'          => 'staff_member_dribbble_link',
				'type'        => 'text',
				'title'       => esc_html__( 'Staff Member Dribbble link', THEME_NAME ),
				'placeholder' => '',
			),
			array(
				'id'          => 'staff_member_deviantart_link',
				'type'        => 'text',
				'title'       => esc_html__( 'Staff Member Deviantart link', THEME_NAME ),
				'placeholder' => '',
			),
			array(
				'id'          => 'staff_member_reddit_link',
				'type'        => 'text',
				'title'       => esc_html__( 'Staff Member Reddit link', THEME_NAME ),
				'placeholder' => '',
			),
			array(
				'id'          => 'staff_member_behance_link',
				'type'        => 'text',
				'title'       => esc_html__( 'Staff Member Behance link', THEME_NAME ),
				'placeholder' => '',
			),
			array(
				'id'          => 'staff_member_digg_link',
				'type'        => 'text',
				'title'       => esc_html__( 'Staff Member Digg link', THEME_NAME ),
				'placeholder' => '',
			),
			array(
				'id'          => 'staff_member_flickr_link',
				'type'        => 'text',
				'title'       => esc_html__( 'Staff Member Flickr link', THEME_NAME ),
				'placeholder' => '',
			),
			array(
				'id'          => 'staff_member_instagram_link',
				'type'        => 'text',
				'title'       => esc_html__( 'Staff Member Instagram link', THEME_NAME ),
				'placeholder' => '',
			),
			array(
				'id'          => 'staff_member_google_plus_link',
				'type'        => 'text',
				'title'       => esc_html__( 'Staff Member Google Plus link', THEME_NAME ),
				'placeholder' => '',
			),
		)
	);

	$metaboxes[] = array(
		'id'         => 'webuild-staff-meta',
		'title'      => esc_html__( 'Staff info', THEME_NAME ),
		'post_types' => array(
			'pro_staff'
		),
		'position'   => 'normal', // normal, advanced, side
		'priority'   => 'high', // high, core, default, low
		'sidebar'    => false, // enable/disable the sidebar in the normal/advanced positions
		'sections'   => $staff_fields
	);


	$testimonials_fields   = array();
	$testimonials_fields[] = array(
		'title'    => esc_html__( 'Testimonials', THEME_NAME ),
		'subtitle' => esc_html__( '', THEME_NAME ),
		'fields'   => array(
			array(
				'id'      => 'job_reference',
				'type'    => 'text',
				'title'   => esc_html__( 'Job reference', THEME_NAME ),
				'default' => esc_html__( 'Job reference', THEME_NAME )
			),
			array(
				'id'    => 'external_link',
				'type'  => 'text',
				'title' => esc_html__( 'External link', THEME_NAME )
			)
		)
	);

	$metaboxes[] = array(
		'id'         => 'webuild-testimonial-meta',
		'title'      => esc_html__( 'Testimonial info', THEME_NAME ),
		'post_types' => array(
			'pro_testimonials'
		),
		'position'   => 'normal', // normal, advanced, side
		'priority'   => 'high', // high, core, default, low
		'sidebar'    => false, // enable/disable the sidebar in the normal/advanced positions
		'sections'   => $testimonials_fields
	);

	return $metaboxes;
}

add_action( 'init', 'webuild_create_testimonials' );
add_action( 'init', 'create_staff' );
add_action( 'init', 'create_clients' );
add_filter( 'custom_post_type_meta_filter', 'custom_post_type_meta_filter', 10, 1 );

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'advanced-custom-fields/acf.php' ) ) {

	include_once(WP_PLUGIN_DIR . '/advanced-custom-fields/acf.php');

	define( 'ACF_LITE', true );
	if ( function_exists( "register_field_group" ) ) {
		/*register_field_group( array(
			'id'         => 'acf_clients',
			'title'      => 'Clients',
			'fields'     => array(
				array(
					'key'           => 'field_55afbd6c2fc96',
					'label'         => 'Client Link',
					'name'          => 'client_link',
					'type'          => 'text',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
			),
			'location'   => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'pro_clients',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options'    => array(
				'position'       => 'normal',
				'layout'         => 'no_box',
				'hide_on_screen' => array(),
			),
			'menu_order' => 0,
		) );*/
		register_field_group( array(
			'id'         => 'acf_staff',
			'title'      => 'Staff',
			'fields'     => array(
				array(
					'key'           => 'field_559d3ac3d0592',
					'label'         => 'Staff Member Description ( this is the text that will show up in the auto generated section and in shortcodes )',
					'name'          => 'staff_member_description',
					'type'          => 'textarea',
					'default_value' => '',
					'placeholder'   => 'Description here',
					'maxlength'     => '',
					'rows'          => '',
					'formatting'    => 'br',
				),
				array(
					'key'           => 'field_559d425007b30',
					'label'         => 'Staff Member website url ( use http:// )',
					'name'          => 'staff_member_website_url',
					'type'          => 'text',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
				array(
					'key'           => 'field_559d428221a98',
					'label'         => 'Staff Member email adress',
					'name'          => 'staff_member_email_adress',
					'type'          => 'email',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
				),
				array(
					'key'           => 'field_559d4364f975a',
					'label'         => 'Staff Member Facebook link',
					'name'          => 'staff_member_facebook_link',
					'type'          => 'text',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
				array(
					'key'           => 'field_559d43c11c01f',
					'label'         => 'Staff Member Twitter link',
					'name'          => 'staff_member_twitter_link',
					'type'          => 'text',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
				array(
					'key'           => 'field_559d45da4366b',
					'label'         => 'Staff Member Linkedin link',
					'name'          => 'staff_member_linkedin_link',
					'type'          => 'text',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
				array(
					'key'           => 'field_559d46978660b',
					'label'         => 'Staff Member Skype link',
					'name'          => 'staff_member_skype_link',
					'type'          => 'text',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
				array(
					'key'           => 'field_559d46ae8660c',
					'label'         => 'Staff Member Blogger link',
					'name'          => 'staff_member_blogger_link',
					'type'          => 'text',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
				array(
					'key'           => 'field_559d46b88660d',
					'label'         => 'Staff Member Vimeo link',
					'name'          => 'staff_member_vimeo_link',
					'type'          => 'text',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
				array(
					'key'           => 'field_559d46c28660e',
					'label'         => 'Staff Member Youtube link',
					'name'          => 'staff_member_youtube_link',
					'type'          => 'text',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
				array(
					'key'           => 'field_559d46cc8660f',
					'label'         => 'Staff Member Dribbble link',
					'name'          => 'staff_member_dribbble_link',
					'type'          => 'text',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
				array(
					'key'           => 'field_559d46d486610',
					'label'         => 'Staff Member Deviantart link',
					'name'          => 'staff_member_deviantart_link',
					'type'          => 'text',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
				array(
					'key'           => 'field_559d46e286611',
					'label'         => 'Staff Member Reddit link',
					'name'          => 'staff_member_reddit_link',
					'type'          => 'text',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
				array(
					'key'           => 'field_559d46eb86612',
					'label'         => 'Staff Member Behance link',
					'name'          => 'staff_member_behance_link',
					'type'          => 'text',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
				array(
					'key'           => 'field_559d46f886613',
					'label'         => 'Staff Member Digg link',
					'name'          => 'staff_member_digg_link',
					'type'          => 'text',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
				array(
					'key'           => 'field_559d470186614',
					'label'         => 'Staff Member Flickr link',
					'name'          => 'staff_member_flickr_link',
					'type'          => 'text',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
				array(
					'key'           => 'field_559d470e86615',
					'label'         => 'Staff Member Instagram link',
					'name'          => 'staff_member_instagram_link',
					'type'          => 'text',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
				array(
					'key'           => 'field_559d471886616',
					'label'         => 'Staff Member Google Plus link',
					'name'          => 'staff_member_google_plus_link',
					'type'          => 'text',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
			),
			'location'   => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'pro_staff',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options'    => array(
				'position'       => 'normal',
				'layout'         => 'no_box',
				'hide_on_screen' => array(),
			),
			'menu_order' => 0,
		) );
		register_field_group( array(
			'id'         => 'acf_testimonials',
			'title'      => 'Testimonials',
			'fields'     => array(
				array(
					'key'           => 'field_55af5f4b71e39',
					'label'         => 'Job reference',
					'name'          => 'job_reference',
					'type'          => 'text',
					'required'      => 1,
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
				array(
					'key'           => 'field_55af5f7f71e3a',
					'label'         => 'External link',
					'name'          => 'external_link',
					'type'          => 'text',
					'default_value' => '',
					'placeholder'   => '',
					'prepend'       => '',
					'append'        => '',
					'formatting'    => 'html',
					'maxlength'     => '',
				),
			),
			'location'   => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'pro_testimonials',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options'    => array(
				'position'       => 'normal',
				'layout'         => 'no_box',
				'hide_on_screen' => array(),
			),
			'menu_order' => 0,
		) );
	}
}
?>