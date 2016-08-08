<?php

class Fi_Print_Contact_Details_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-contact_details',
			__( 'Fi Print: Contact_Details', 'fi-print' ),
			array(
				'description' => __('Fi Print contact_details', 'fi-print' ),

				),
			array(),
			array(

				'title' => array(
					'type'  => 'text',
					'label' => __( 'Title', 'fi-print' )
				),'address' => array(
					'type'  => 'textarea',
					'label' => __( 'Enter your Address', 'fi-print' )
				),
				'phone' => array(
					'type'  => 'textarea',
					'label' => __( 'Enter Phone Number(s)', 'fi-print' )
				),
				
				'email' => array(
					'type'  => 'textarea',
					'label' => __( 'Enter your Email', 'fi-print' )
				),	
				
				

			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register('fi-print-contact_details', __FILE__,'Fi_Print_contact_details_Widget');
