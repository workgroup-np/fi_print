<?php

class Fi_Print_Client_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-client',
			__( 'Fi Print: Client', 'fi_print' ),
			array(
				'description' => __('Display Client Logos', 'fi_print' ),

				),
			array(),
			array(

				'client_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Client Details.', 'fi_print'),
					'fields' => array(

						'client_title'=>  array(
							'type'  => 'media',
							'label' => __( 'Client Image', 'fi_print' )
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
siteorigin_widget_register('fi_print-client', __FILE__,'Fi_Print_Client_Widget');
