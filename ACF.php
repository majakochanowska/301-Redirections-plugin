<?php
/**
 * Register ACF options page and fields.
 *
 * @package redirections
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'acf/init', 'redirections_register_acf_options_page' );
add_action( 'acf/init', 'redirections_register_acf_fields' );

/**
 * Add options page at the end of admin menu, available for Editors and Administrators
 */
function redirections_register_acf_options_page() {

	if( function_exists( 'acf_add_options_page' ) ) {

		$option_page = acf_add_options_page(
			array (
				'page_title' => __( 'Redirections', 'redirections' ),
				'capability' => 'edit_pages',
			) 
		);
	}
}

/**
 * Add a form to set redirections
 */
function redirections_register_acf_fields() {

	acf_add_local_field_group(
		array(
			'key'                   => '301_redirections_group',
			'title'                 => __( '301 Redirections', 'redirections' ),
			'fields'                => array(
				array(
					'key'               => '301_redirections',
					'label'             => __( 'Redirections', 'redirections' ),
					'name'              => 'redirections',
					'type'              => 'repeater',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'collapsed'         => '',
					'min'               => 0,
					'max'               => 0,
					'layout'            => 'table',
					'button_label'      => __( 'Add redirection', 'redirections' ),
					'sub_fields'        => array(
						array(
							'key'               => '301_redirect_from',
							'label'             => __( 'Redirect from', 'redirections' ),
							'name'              => 'redirect_from',
							'type'              => 'text',
							'instructions'      => __( 'Url which has to be redirected, without domain, e.g. /test-page', 'redirections' ),
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'default_value'     => '',
							'placeholder'       => '',
							'prepend'           => '',
							'append'            => '',
							'maxlength'         => '',
						),
						array(
							'key'               => '301_redirect_to',
							'label'             => __( 'Redirect to', 'redirections' ),
							'name'              => 'redirect_to',
							'type'              => 'url',
							'instructions'      => __( 'Where url should be redirected. Full url, e.g. https://testwebsite.com/test-page-2', 'redirections' ),
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => array(
								'width' => '',
								'class' => '',
								'id'    => '',
							),
							'default_value'     => '',
							'placeholder'       => '',
						),
					),
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'acf-options-redirections',
					),
				),
			),
			'menu_order'            => 1,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
		)
	);
}
