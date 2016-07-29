<?php

class Fi_Print_Testimonial_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'fi-print-testimonial',
			__( 'Fi Print: Simple Sliding Testimonial', 'fi-print' ),
			array(
				'description' => __('Fi Print Testimonial', 'fi-print' ),

				),
			array(),
			array(
				'title' => array(
					'type'  => 'text',
					'label' => __( 'widget Title', 'fi-print' )
				),
				'sub_title' => array(
					'type'  => 'text',
					'label' => __( 'Widget Subtitle', 'fi-print' )
				),
				
				'testimonial_repeater' => array(
					'type'  => 'repeater',
					'label' => __('Testimonial Details.', 'fi-print'),
					'fields' => array(

						'testimonial_client_name'=>  array(
							'type'  => 'text',
							'label' => __( 'Client Name', 'fi-print' )
						),

						'testimonial_client_image'=>  array(
							'type'  => 'media',
							'label' => __( 'Client Image', 'fi-print' )

						),
						'testimonial_client_url' => array(
						   'type'     => 'link',
						   'label'    => __('Client URL', 'fi-print'),
						),
						'testimonial_client_site'=>  array(
							'type'  => 'text',
							'label' => __( 'Testimonial Content', 'fi-print' )

						),
					
						
					),
				),
				'testimonial_style' => array(
						'type'     => 'select',
						'label'    => __( 'testimonials Style', 'fi-print' ),
						'default'  => 'one',
						'options'  => array(
							'one' => __( 'Style One', 'fi-print' ),
							'two'  => __( 'Style Two', 'fi-print' ),
						),
				),

			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register('fi-print-testimonial', __FILE__,'Fi_Print_Testimonial_Widget');
