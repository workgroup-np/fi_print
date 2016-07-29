<?php

class Fi_Print_Contact_Ways_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-contact-ways',
			__( 'Fi_Print: Contact Ways', 'fi-print' ),
			array(
				'description' => __('Contact Ways for your company', 'fi-print' ),

				),
			array(),
			array(

				'contact_ways_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Enter Contact Details.', 'fi-print'),
					'fields' => array(
						'title' => array(
							'type'  => 'text',
							'label' => __( 'Title', 'fi-print' )
						),
						'content' => array(
							'type'  => 'text',
							'label' => __( 'Content', 'fi-print' )
						),
					),
				),
				'get_quote_text'=>  array(
					'type'  => 'text',
					'label' => __( 'Get a quote TEXT', 'fi-print' ),
				),
				'get_quote_link'=>  array(
					'type'  => 'link',
					'label' => __( 'Get a quote Link', 'fi-print' ),
				),


			)
		);
	}
	
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register('fi-print-contact-ways', __FILE__,'Fi_Print_Contact_Ways_Widget');
