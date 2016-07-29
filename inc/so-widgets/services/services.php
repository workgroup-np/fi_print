<?php

class Fi_Print_Services_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-services',
			__( 'Fi Print: Services', 'fi-print' ),
			array(
				'description' => __('Fi Print Services', 'fi-print' ),

				),
			array(),
			array(

				'services_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Services Details.', 'fi-print'),
					'fields' => array(
						'image' => array(
							'type'  => 'media',
							'label' => __( 'Select Services Image', 'fi-print' )
						),
						'title' => array(
							'type'  => 'text',
							'label' => __( 'Services Title', 'fi-print' )
						),
						'sub_title' => array(
							'type'  => 'text',
							'label' => __( 'Services Subtitle', 'fi-print' )
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
siteorigin_widget_register('fi-print-services', __FILE__,'Fi_Print_Services_Widget');
