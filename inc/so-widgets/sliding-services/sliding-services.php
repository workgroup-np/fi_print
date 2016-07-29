<?php

class Fi_Print_Sliding_Services_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-sliding-services',
			__( 'Fi Print: Sliding Services', 'fi-print' ),
			array(
				'description' => __('Fi Print Sliding Services', 'fi-print' ),

				),
			array(),
			array(
				'primary_title' => array(
					'type'  => 'text',
					'label' => __( 'Widget Title', 'fi-print' ),
				),

				'title_content' => array(
					'type'  => 'text',
					'label' => __( 'Widget Sub Title', 'fi-print' ),
				),
				'sliding-services_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Sliding Services Details.', 'fi-print'),
					'fields' => array(
						'image' => array(
							'type'  => 'media',
							'label' => __( 'Select Sliding Services Image', 'fi-print' )
						),
						'title' => array(
							'type'  => 'text',
							'label' => __( 'Sliding Services Title', 'fi-print' )
						),
						'sub_title' => array(
							'type'  => 'text',
							'label' => __( 'Sliding Services Subtitle', 'fi-print' )
						),
						'read_more_text' => array(
							'type'  => 'text',
							'label' => __( 'Read More Text', 'fi-print' )
						),
						'read_more_link' => array(
							'type'  => 'text',
							'label' => __( 'Read More Link', 'fi-print' )
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
siteorigin_widget_register('fi-print-sliding-services', __FILE__,'Fi_Print_Sliding_Services_Widget');
