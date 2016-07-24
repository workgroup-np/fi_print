<?php

class Fi_Print_Services_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-services',
			__( 'Fi Print: Services', 'fi_print' ),
			array(
				'description' => __('Fi Print Services', 'fi_print' ),

				),
			array(),
			array(

				'services_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Services Details.', 'fi_print'),
					'fields' => array(
						'image' => array(
							'type'  => 'media',
							'label' => __( 'Select Services Image', 'fi_print' )
						),
						'title' => array(
							'type'  => 'text',
							'label' => __( 'Services Title', 'fi_print' )
						),
						'sub_title' => array(
							'type'  => 'text',
							'label' => __( 'Services Subtitle', 'fi_print' )
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
siteorigin_widget_register('fi_print-services', __FILE__,'Fi_Print_Services_Widget');
