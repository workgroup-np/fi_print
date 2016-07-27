<?php

class Fi_Print_Sliding_Services_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi_print-sliding-services',
			__( 'Fi Print: Sliding Services', 'fi_print' ),
			array(
				'description' => __('Fi Print Sliding Services', 'fi_print' ),

				),
			array(),
			array(
				'primary_title' => array(
					'type'  => 'text',
					'label' => __( 'Widget Title', 'fi_print' ),
				),

				'title_content' => array(
					'type'  => 'text',
					'label' => __( 'Widget Sub Title', 'fi_print' ),
				),
				'sliding-services_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Sliding Services Details.', 'fi_print'),
					'fields' => array(
						'image' => array(
							'type'  => 'media',
							'label' => __( 'Select Sliding Services Image', 'fi_print' )
						),
						'title' => array(
							'type'  => 'text',
							'label' => __( 'Sliding Services Title', 'fi_print' )
						),
						'sub_title' => array(
							'type'  => 'text',
							'label' => __( 'Sliding Services Subtitle', 'fi_print' )
						),
						'read_more_text' => array(
							'type'  => 'text',
							'label' => __( 'Read More Text', 'fi_print' )
						),
						'read_more_link' => array(
							'type'  => 'text',
							'label' => __( 'Read More Link', 'fi_print' )
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
siteorigin_widget_register('fi_print-sliding-services', __FILE__,'Fi_Print_Sliding_Services_Widget');
