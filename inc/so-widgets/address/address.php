<?php

class Fi_Print_Address_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-address',
			__( 'Fi_Print: Address', 'siteorigin-widgets' ),
			array(
				'description' => __('Displays an contact address details', 'siteorigin-widgets' ),

				),
			array(),
			array(

				'title' => array(
					'type' => 'text',
					'label' => __('Tilte', 'siteorigin-widgets'),
				),

				'sub_title' => array(
					'type' => 'text',
					'label' => __( 'Sub Title', 'fi_print' ),
				),

				'address_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Enter Contact Details.', 'fi_print'),
					'fields' => array(
						'icon' => array(
							'type'  => 'icon',
							'label' => __( 'Select Icon', 'fi_print' )
						),
						'contact' => array(
							'type'  => 'text',
							'label' => __( 'Enter Address Details like Phone Number / Address / Location', 'fi_print' )
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
siteorigin_widget_register('fi_print-address', __FILE__,'Fi_Print_Address_Widget');
