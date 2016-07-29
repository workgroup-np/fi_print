<?php

class Fi_Print_Services_Hover_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-services_hover',
			__( 'Fi Print: Services Hover', 'fi-print' ),
			array(
				'description' => __('Fi Print Hover style Services', 'fi-print' ),

				),
			array(),
			array(

				'number' => array(
					'type'  => 'number',
					'label' => __( 'Number of services to display', 'fi-print' ),

				),

			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register('fi-print-services_hover', __FILE__,'Fi_Print_services_hover_Widget');
