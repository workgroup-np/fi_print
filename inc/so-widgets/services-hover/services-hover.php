<?php

class Fi_Print_Services_Hover_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-services_hover',
			__( 'Fi Print: Services Hover', 'fi_print' ),
			array(
				'description' => __('Fi Print Hover style Services', 'fi_print' ),

				),
			array(),
			array(

				'number' => array(
					'type'  => 'number',
					'label' => __( 'Number of services to display', 'fi_print' ),

				),

			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register('fi_print-services_hover', __FILE__,'Fi_Print_services_hover_Widget');
