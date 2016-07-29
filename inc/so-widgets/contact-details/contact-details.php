<?php

class Fi_Print_Contact_Details_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-contact_details',
			__( 'Fi Print: Contact_Details', 'fi_print' ),
			array(
				'description' => __('Fi Print contact_details', 'fi_print' ),

				),
			array(),
			array(

				'address' => array(
					'type'  => 'textarea',
					'label' => __( 'Enter your Address', 'fi_print' )
				),
				'phone' => array(
					'type'  => 'textarea',
					'label' => __( 'Enter Phone Number(s)', 'fi_print' )
				),
				
				'email' => array(
					'type'  => 'textarea',
					'label' => __( 'Enter your Email', 'fi_print' )
				),	
				
				

			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register('fi_print-contact_details', __FILE__,'Fi_Print_contact_details_Widget');
