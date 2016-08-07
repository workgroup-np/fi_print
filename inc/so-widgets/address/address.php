<?php



class Fi_Print_Address_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(

			'fi-print-address',

			__( 'Fi_Print: Address', 'fi-print' ),

			array(

				'description' => __('Displays an contact address details', 'fi-print' ),



				),

			array(),

			array(



				'title' => array(

					'type' => 'text',

					'label' => __('Tilte', 'fi-print'),

				),



				'sub_title' => array(

					'type' => 'text',

					'label' => __( 'Sub Title', 'fi-print' ),

				),



				'address_repeater' => array(

					'type'  => 'repeater',

					'label' => __('Enter Contact Details.', 'fi-print'),

					'fields' => array(

						'icon' => array(

							'type'  => 'icon',

							'label' => __( 'Select Icon', 'fi-print' )

						),

						'contact' => array(

							'type'  => 'text',

							'label' => __( 'Enter Address Details like Phone Number / Address / Location', 'fi-print' )

						),

					),

				),



			)

		);

	}

	

	function get_template_name($instance){

		return 'default';

	}



}

siteorigin_widget_register('fi-print-address', __FILE__,'Fi_Print_Address_Widget');

