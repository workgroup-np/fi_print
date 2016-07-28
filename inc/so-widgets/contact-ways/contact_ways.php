<?php

class Fi_Print_Contact_Ways_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-contact-ways',
			__( 'Fi_Print: Contact Ways', 'fi_print' ),
			array(
				'description' => __('Contact Ways for your company', 'fi_print' ),

				),
			array(),
			array(

				'contact_ways_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Enter Contact Details.', 'fi_print'),
					'fields' => array(
						'title' => array(
							'type'  => 'text',
							'label' => __( 'Title', 'fi_print' )
						),
						'content' => array(
							'type'  => 'text',
							'label' => __( 'Content', 'fi_print' )
						),
					),
				),
				'get_quote_text'=>  array(
					'type'  => 'text',
					'label' => __( 'Get a quote TEXT', 'fi_print' ),
				),
				'get_quote_link'=>  array(
					'type'  => 'link',
					'label' => __( 'Get a quote Link', 'fi_print' ),
				),


			)
		);
	}
	
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register('fi_print-contact-ways', __FILE__,'Fi_Print_Contact_Ways_Widget');
